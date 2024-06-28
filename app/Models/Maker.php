<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $type
 * @property-read \App\Models\Product|null $product
 * @method static \Illuminate\Database\Eloquent\Builder|Maker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Maker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Maker query()
 * @method static \Illuminate\Database\Eloquent\Builder|Maker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Maker whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Maker whereType($value)
 * @mixin \Eloquent
 */
class Maker extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function product()
    {
        return $this->hasOne(Product::class, 'maker_id');
    }
}
