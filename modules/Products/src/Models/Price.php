<?php

namespace Products\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Price
 *
 * @package Products\Models
 *
 * @property int $id
 * @property string $value
 * @property int $product_id
 */
class Price extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value',
        'product_id',
    ];

    protected $table = 'prices';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
