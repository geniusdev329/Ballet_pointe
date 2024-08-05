<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * 
 *
 * @property int $id
 * @property string $nickname
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $gender
 * @property int $age
 * @property int $ballet_career
 * @property string|null $ballet_level
 * @property string|null $foot_shape
 * @property int $foot_size
 * @property string|null $foot_width
 * @property string|null $foot_height
 * @property string|null $mail_magazin
 * @property int $tos_confirm
 * @property int $privacy_policy_confirm
 * @property-read int $type
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Blog> $blogs
 * @property-read int|null $blogs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $favoriteProducts
 * @property-read int|null $favorite_products_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $reviewedProducts
 * @property-read int|null $reviewed_products_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProductReview> $reviews
 * @property-read int|null $reviews_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBalletCareer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBalletLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFootHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFootShape($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFootSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFootWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMailMagazin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePrivacyPolicyConfirm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTosConfirm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nickname',
        'email',
        'avatar',
        'password',
        'gender',
        'age',
        'ballet_career',
        'ballet_level',
        'foot_shape',
        'foot_size',
        'foot_width',
        'foot_height',
        'mail_magazin',
        'tos_confirm',
        'privacy_policy_confirm',
        'type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["user", "admin", "manager"][$value],
        );
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function reviewedProducts()
    {
        return $this->belongsToMany(Product::class, 'product_reviews')->withPivot('review', 'rating');
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }  
    
    public function favoriteProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'favorite_products')->withTimestamps();
    }
}
