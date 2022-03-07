<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Resource\Traits\UuidTrait;

final class Product extends Model
{
    use UuidTrait, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'sku',
        'name',
        'description',
        'path_image',
        'price',
        'iva',
        'is_active',
        'stock'
    ];
}
