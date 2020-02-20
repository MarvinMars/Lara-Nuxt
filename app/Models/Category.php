<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    
    protected $fillable = [
        "title",
        "slug",
        "description",
    
    ];
    
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/categories/'.$this->getKey());
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class,'category_post');
    }
}
