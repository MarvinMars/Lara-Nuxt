<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Watson\Rememberable\Rememberable;

class Post extends Model
{
    use Rememberable;

    protected $fillable = [
        "title",
        "header_subtitle",
        "slug",
        "published_at",
        "keywords",
        "description",
        "enabled",
        "type",
        "hero_id"
    ];

    protected $hidden = [
        'old_keywords',
        'old_description'
    ];

    protected $casts = [
        'old_keywords' => 'array',
        'old_description' => 'array',
    ];

    protected $dates = [
//        "published_at",
        "created_at",
        "updated_at",
    ];

    protected $appends = ['resource_url', 'frontend_link', 'published_at_format', 'meta'];


    /* ************************ ACCESSOR ************************* */

    public function getPublishedAtFormatAttribute()
    {
        return ($this->published_at instanceof Carbon ? $this->published_at->format('M d y') : null);
    }

    /**
     * Update published at date.
     *
     * @param $value
     */
    public function setPublishedAtAttribute($value)
    {
        if (false !== strtotime($value)) {
            $this->attributes['published_at'] = Carbon::parse($value);
        }
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Return collection of the metas.
     *
     * @return Collection
     */
    public function getMetaAttribute(): Collection
    {
        $metas = collect();

        if ($this->description) {
            $metas->push([
                'hid' => 'description',
                'name' => 'description',
                'content' => $this->description,
            ]);
        }

        if ($this->keywords) {
            $metas->push([
                'hid' => 'keywords',
                'name' => 'keywords',
                'content' => $this->keywords,
            ]);
        }

        return $metas;
    }

    /**
     * Get the keywords for the page.
     *
     * @param $value
     * @return array|mixed
     * @deprecated
     */
    public function getOldKeywordsAttribute($value)
    {
        if (empty($value)) {
            return [
                'hid' => 'keywords',
                'name' => 'keywords',
                'content' => '',
                'property' => 'keywords',
            ];
        }
        return json_decode($value);
    }

    /**
     * Get the description for the page.
     *
     * @param $value
     * @return array|mixed
     * @deprecated
     */
    public function getOldDescriptionAttribute($value)
    {
        if (empty($value)) {
            return [
                'hid' => 'description',
                'name' => 'description',
                'content' => '',
                'property' => 'description',
            ];
        }
        return json_decode($value);
    }

    public function getResourceUrlAttribute()
    {
        if (\Auth::check()) {
            return url('/admin/posts/' . $this->getKey());
        }

        return null;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('M d y');
    }

    public function getFrontendLinkAttribute()
    {
        if (!\Auth::check()) {
            return null;
        }

        if ($this->slug == 'home') {
            return url('/');
        }

        if ($this->type == 'post') {
            return url('/news/' . $this->slug);
        }

        if ($this->type == 'project') {
            return url('/project/' . $this->slug);
        }

        if ($this->type == 'services' || $this->type == 'hero' || $this->type == 'page') {
            return url('/' . $this->slug);
        }
    }

    public function blocks()
    {
        return $this->hasMany(Block::class);
    }

    public function metas()
    {
        return $this->belongsToMany(Meta::class, 'post_meta');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_post');
    }

    public function hero()
    {
        return $this->belongsTo(Hero::class);
    }

}
