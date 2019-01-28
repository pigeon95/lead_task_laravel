<?php

namespace Products\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @package Products\Models
 *
 * @property int $id
 * @property string $name
 * @property string $description
 */
class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    protected $table = 'products';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}
