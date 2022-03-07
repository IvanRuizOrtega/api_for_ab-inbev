<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Src\Resource\Traits\UuidTrait;

final class Sale extends Model
{
    use UuidTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'customer_id',
        'sub_total',
        'iva',
        'total'
    ];

    /**
     * Relationships.
     *
     */

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('amount',
            'unit_value',
            'iva',
            'full_value')->withTimestamps();
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

}
