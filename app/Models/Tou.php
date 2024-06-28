<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $content
 * @property string $html_content
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tou newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tou newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tou query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tou whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tou whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tou whereHtmlContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tou whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tou whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tou whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tou extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tou';

    protected $fillable = [
        'content',
        'html_content',
        'status',
    ];
}
