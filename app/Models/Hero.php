<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Hero
 *
 * @property-read mixed $post_slug
 * @property-read mixed $resource_url
 * @property-read \App\Models\Post $post
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Slide[] $slides
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hero newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hero newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hero query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $template
 * @property string $slug
 * @property int|null $post_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hero whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hero whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hero wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hero whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hero whereTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Hero whereUpdatedAt($value)
 */
class Hero extends Model
{
    
    
    protected $fillable = [
        "template",
        "slug",
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "created_at",
        "updated_at",
    
    ];
    
    
    
    protected $appends = ['resource_url' ];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/heroes/'.$this->getKey());
    }

    public function posts()
    {
        return $this->hasMany(Post::class,'hero_id');
    }

    public function slides()
    {
        return $this->belongsToMany(Slide::class, 'hero_slide');
    }
}
