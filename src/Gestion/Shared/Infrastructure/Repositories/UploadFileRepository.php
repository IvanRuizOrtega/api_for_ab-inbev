<?php


namespace Src\Gestion\Shared\Infrastructure\Repositories;


use Illuminate\Support\Facades\Storage;


final class UploadFileRepository
{
    public static function uploadFile(string $name,
                                      $file)
    {
        return Storage::disk('public')->putFileAs("product-image",
            $file,
            $name);
    }
}
