<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $user_id
 * @property int $product_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteProduct whereUserId($value)
 * @mixin \Eloquent
 */
class FavoriteProduct extends Model
{
    use HasFactory;
}
