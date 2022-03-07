<?php


namespace Src\Gestion\Product\Infrastructure\Repositories\Eloquent;


use Src\Gestion\Product\Domain\Contracts\{iDestroyProductRepositoryContract,
    iGetActiveProductRepositoryContract,
    iGetProductRepositoryContract,
    iStoreProductRepositoryContract,
    iUpdateProductRepositoryContract};
use Src\Gestion\Shared\Domain\ValueObjects\{Id,
    Name,
    Iva,
    CreatedAt,
    UpdateAt};
use Src\Gestion\Product\Domain\ValueObjects\{Sku,
    Description,
    PathImage,
    Price,
    IsActive,
    Stock};
use Src\Gestion\Product\Domain\Model\Product;
use Src\Gestion\Shared\Infrastructure\Repositories\UploadFileRepository;
use Src\Resource\Constants\RepositoryType;

final class ProductRepository implements iGetActiveProductRepositoryContract,
    iStoreProductRepositoryContract,
    iGetProductRepositoryContract,
    iUpdateProductRepositoryContract,
    iDestroyProductRepositoryContract
{
    private $model;

    public function __construct(\App\Models\Product $model)
    {
        $this->model = $model;
    }

    public function getActiveProducts()
    {
        return $this->model->where('is_active', true)->get();
    }

    public function storeProduct(string $name,
                                 string $description,
                                 $image,
                                 float $price,
                                 bool $iva,
                                 bool $is_active,
                                 int $stock): Product
    {
        $setName = new Name($name);
        $setDescription = new Description($description);
        $setSku = new Sku($setName, $setDescription);
        $setPathImage = new PathImage(UploadFileRepository::uploadFile($image->getClientOriginalName(), $image));
        $setPrice = new Price($price);
        $setIva = new Iva($iva);
        $setIsActive = new IsActive($is_active);
        $setStock = new Stock($stock);

        $response = $this->model->create([
            'sku' => $setSku->value(),
            'name' => $setName->value(),
            'description' => $setDescription->value(),
            'path_image' => $setPathImage->value(),
            'price' => $setPrice->value(),
            'iva' => $setIva->value(),
            'is_active' => $setIsActive->value(),
            'stock' => $setStock->value()
        ]);

        return new Product(new Id($response->id), $setSku,
            $setName,
            $setDescription,
            $setPathImage,
            $setPrice,
            $setIva,
            $setIsActive,
            $setStock,
            new CreatedAt($response->created_at),
            new UpdateAt($response->updated_at),
            RepositoryType::ELOQUENT_TYPE);
    }

    public function getProduct(string $product): Product
    {
        $setId = new Id($product);
        $response = $this->model->findOrFail($setId->value());
        $setName = new Name($response->name);
        $setDescription = new Description($response->description);
       return new Product($setId,
            new Sku($setName, $setDescription,true, $response->sku),
            $setName,
            $setDescription,
            new PathImage($response->path_image),
            new Price($response->price),
            new Iva($response->iva),
            new IsActive($response->is_active),
            new Stock($response->stock),
            new CreatedAt($response->created_at),
            new UpdateAt($response->updated_at),
            RepositoryType::ELOQUENT_TYPE);
    }

    public function updateProduct(string $product,
                                  float $price,
                                  bool $iva,
                                  bool $is_active,
                                  int $stock): Product
    {
        $setId = new Id($product);
        $response = $this->model->findOrFail($setId->value());
        $setName = new Name($response->name);
        $setDescription = new Description($response->description);
        $setPrice = new Price($price);
        $setIva =  new Iva($iva);
        $setIsActive =  new IsActive($is_active);
        $setStock =  new Stock($stock);
        $response->update([
            'price' => $setPrice->value(),
            'iva' => $setIva->value(),
            'is_active' => $setIsActive->value(),
            'stock' => $setStock->value(),
        ]);
        return new Product($setId,
            new Sku($setName, $setDescription,true, $response->sku),
            $setName,
            $setDescription,
            new PathImage($response->path_image),
            $setPrice,
            $setIva,
            $setIsActive,
            $setStock,
            new CreatedAt($response->created_at),
            new UpdateAt($response->updated_at),
            RepositoryType::ELOQUENT_TYPE);
    }

    public function destroyProduct(string $product)
    {
       return $this->model->findOrFail((new Id($product))->value())->delete();
    }
}
