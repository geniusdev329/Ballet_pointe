<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $html_description
 * @property int|null $maker_id
 * @property string|null $rakuten_link
 * @property string|null $amazon_link
 * @property string|null $yahoo_link
 * @property string|null $image
 * @property float|null $average_satisfaction
 * @property float|null $comfort
 * @property float|null $quietness
 * @property float|null $lightness
 * @property float|null $stability
 * @property float|null $longevity
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $favoritedBy
 * @property-read int|null $favorited_by_count
 * @property-read \App\Models\Maker|null $maker
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductReview> $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereAmazonLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereAverageSatisfaction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereComfort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereHtmlDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereLightness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereLongevity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMakerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereQuietness($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRakutenLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStability($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereYahooLink($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory;
    
    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'product_reviews')->withPivot('review', 'rating');
    }

    public function maker()
    {
        return $this->belongsTo(Maker::class, 'maker_id');
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorite_products')->withTimestamps();
    }
}
