<?php


namespace Src\Gestion\Customer\Relationship\Sale\Infrastructure\Repositories\Eloquent;


use Illuminate\Support\Facades\DB;
use Src\Gestion\Customer\Relationship\Sale\Domain\Contracts\{iGetSaleRepositoryContract,
    iStoreSaleRepositoryContract};
use Src\Gestion\Customer\Relationship\Cart\Infrastructure\Response\CartResponse;
use Src\Gestion\Customer\Relationship\Sale\Domain\Model\Sale;
use Src\Resource\Constants\RepositoryType;
use Src\Gestion\Customer\Relationship\Sale\Domain\ValueObjects\{Iva,
    SubTotal,
    Total};
use Src\Gestion\Shared\Domain\ValueObjects\{CreatedAt,
    Id,
    UpdateAt};

final class SaleRepository implements iStoreSaleRepositoryContract,
    iGetSaleRepositoryContract
{
    private $model, $customer, $product;

    public function __construct(\App\Models\Sale $model,
                                \App\Models\Customer $customer,
                                \App\Models\Product $product)
    {
        $this->model = $model;
        $this->product = $product;
        $this->customer = $customer;
    }

    /**
     * @param string $customer
     * @return Sale | null
     */
    public function storeSale(string $customer): ?Sale
    {
        $this->customer->findOrFail($customer);
        $cart = CartResponse::cart($customer);
        if (is_array($cart)) {
            $sale = DB::transaction(function () use ($customer,$cart){
                $cart = CartResponse::cart($customer);
                $sale = $this->model->create([
                    'customer_id' => $customer,
                    'sub_total' => $cart['partial_sale']['sub_total'],
                    'iva' => $cart['partial_sale']['iva'],
                    'total' => $cart['partial_sale']['total'],
                ]);
                unset($cart['partial_sale']);
                foreach ($cart as $key => $product) {
                    $sale->products()->attach($key, [
                        'amount' => $product['amount'],
                        'unit_value' => $product['unit_value'],
                        'iva' => $product['iva'],
                        'full_value' => $product['full_value']
                    ]);
                    $model = $this->product->findOrFail($key);
                    $model->update(['is_active' => false]);
                    $stock = ($model->stock - $product['amount']);
                    $model->update([ 'stock' => $stock ]);
                    if($stock > 0) {
                        $model->update(['is_active' => true]);
                    }
                }
                return $sale;
            });
            return new Sale(new Id($sale->id),
                new Iva($sale->iva),
                new SubTotal($sale->sub_total),
                new Total($sale->total),
                new CreatedAt($sale->created_at),
                new UpdateAt($sale->updated_at),
                RepositoryType::ELOQUENT_TYPE);
        }
        return null;
    }

    public function getSales(string $customer)
    {
        return $this->model->where('customer_id', $customer)
            ->with('customer:id,name,phone,email',
                'products:id,name,path_image,price')->get();
    }
}
