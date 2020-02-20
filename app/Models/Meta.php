<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Meta
 *
 * @property-read mixed $post_slug
 * @property-read mixed $resource_url
 * @property-read \App\Models\Post $post
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta query()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $name
 * @property string|null $content
 * @property string|null $property
 * @property int $post_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta whereProperty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Meta whereUpdatedAt($value)
 */
class Meta extends Model
{
    
    
    protected $fillable = [
        "name",
        "content",
        "property",
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "created_at",
        "updated_at",
    
    ];
    
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/metas/'.$this->getKey());
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class,'post_meta');
    }
    
}
