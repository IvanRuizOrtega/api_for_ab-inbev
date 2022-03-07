<?php


namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Src\Gestion\Customer\Application\{GetAllCustomerCase,
    StoreCustomerCase,
    UpdateCustomerCase};
use Src\Gestion\Customer\Domain\Contracts\{iGetAllCustomersRepositoryContract,
    iStoreCustomerRepositoryContract,
    iUpdateCustomerRepositoryContract};
use Src\Gestion\Customer\Infrastructure\Repositories\Eloquent\{CustomerRepository};
use Src\Gestion\Customer\Relationship\Cart\Application\{AddToCartCase,
    DestroyCartCase};
use Src\Gestion\Customer\Relationship\Cart\Domain\Contracts\{iAddToCartRepositoryContract,
    iDestroyCartRepositoryContract};
use Src\Gestion\Customer\Relationship\Cart\Infrastructure\Repositories\Sessions\{CartRepository};
use Src\Gestion\Customer\Relationship\Cart\Relationship\Product\Application\{DestroyProductToCartCase};
use Src\Gestion\Customer\Relationship\Cart\Relationship\Product\Domain\Contracts\{
    iDestroyProductToCartRepositoryContract};
use Src\Gestion\Customer\Relationship\Cart\Relationship\Product\Infrastructure\Repositories\Sessions\{
    ProductCartRepository};
use Src\Gestion\Customer\Relationship\Sale\Application\{StoreSaleCase,
    GetSaleCase};
use Src\Gestion\Customer\Relationship\Sale\Domain\Contracts\{iStoreSaleRepositoryContract,
    iGetSaleRepositoryContract};
use Src\Gestion\Customer\Relationship\Sale\Infrastructure\Repositories\Eloquent\{SaleRepository};

final class CustomerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->when(GetAllCustomerCase::class)
            ->needs(iGetAllCustomersRepositoryContract::class)
            ->give(CustomerRepository::class);

        $this->app->when(StoreCustomerCase::class)
            ->needs(iStoreCustomerRepositoryContract::class)
            ->give(CustomerRepository::class);

        $this->app->when(UpdateCustomerCase::class)
            ->needs(iUpdateCustomerRepositoryContract::class)
            ->give(CustomerRepository::class);

        // SALE

        $this->app->when(GetSaleCase::class)
            ->needs(iGetSaleRepositoryContract::class)
            ->give(SaleRepository::class);

        $this->app->when(StoreSaleCase::class)
            ->needs(iStoreSaleRepositoryContract::class)
            ->give(SaleRepository::class);

        // CART
        $this->app->when(AddToCartCase::class)
            ->needs(iAddToCartRepositoryContract::class)
            ->give(CartRepository::class);

        $this->app->when(DestroyCartCase::class)
            ->needs(iDestroyCartRepositoryContract::class)
            ->give(CartRepository::class);

        $this->app->when(DestroyProductToCartCase::class)
            ->needs(iDestroyProductToCartRepositoryContract::class)
            ->give(ProductCartRepository::class);
    }
}
