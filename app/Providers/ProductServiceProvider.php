<?php


namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Src\Gestion\Product\Application\{GetActiveProductCase,
    StoreProductCase,
    GetProductCase,
    UpdateProductCase,
    DestroyProductCase};
use Src\Gestion\Product\Domain\Contracts\{iGetActiveProductRepositoryContract,
    iStoreProductRepositoryContract,
    iGetProductRepositoryContract,
    iUpdateProductRepositoryContract,
    iDestroyProductRepositoryContract};
use Src\Gestion\Product\Infrastructure\Repositories\Eloquent\{ProductRepository};

final class ProductServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->when(GetActiveProductCase::class)
            ->needs(iGetActiveProductRepositoryContract::class)
            ->give(ProductRepository::class);

        $this->app->when(StoreProductCase::class)
            ->needs(iStoreProductRepositoryContract::class)
            ->give(ProductRepository::class);

        $this->app->when(GetProductCase::class)
            ->needs(iGetProductRepositoryContract::class)
            ->give(ProductRepository::class);

        $this->app->when(UpdateProductCase::class)
            ->needs(iUpdateProductRepositoryContract::class)
            ->give(ProductRepository::class);

        $this->app->when(DestroyProductCase::class)
            ->needs(iDestroyProductRepositoryContract::class)
            ->give(ProductRepository::class);
    }
}
