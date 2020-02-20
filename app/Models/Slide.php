<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{

    protected $fillable = [
        "slug",
        "fields",
        "hero_id",
        "template"
    ];

    protected $casts = ['fields' => 'json'];

    protected $dates = [
        "created_at",
        "updated_at",

    ];


    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    /**
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    public function getResourceUrlAttribute()
    {
        if (!\Auth::check()) {
            return null;
        }
        return url('/admin/slides/' . $this->getKey());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function heroes()
    {
        return $this->belongsToMany(Hero::class, 'hero_slide');
    }
}
