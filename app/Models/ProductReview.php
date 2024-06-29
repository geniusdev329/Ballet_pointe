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
 * @property string|null $content
 * @property float $purchase_size
 * @property float $purchase_width
 * @property float|null $shank
 * @property float $average_satisfaction
 * @property float $comfort
 * @property float $quietness
 * @property float $lightness
 * @property float $stability
 * @property float $longavity
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product|null $product
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereAverageSatisfaction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereComfort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereLightness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereLongevity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview wherePurchaseSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview wherePurchaseWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereQuietness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereShank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereStability($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductReview whereUserId($value)
 * @mixin \Eloquent
 */
class ProductReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'purchase_size',
        'purchase_width',
        'average_satisfaction',
        'comfort',
        'quietness',
        'lightness',
        'stability',
        'longavity',
        'content'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
