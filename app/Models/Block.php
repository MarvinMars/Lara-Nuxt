<?php namespace App\Models;

use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;


    protected $fillable = [
        'name',
        'group',
        'html',
        'fields',
        'type',
        'order',
        'post_id'
    ];

    protected $casts = [
        'fields' => 'array'
    ];

    protected $dates = [
        "created_at",
        "updated_at",
    ];


    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/blocks/' . $this->getKey());
    }

    /**
     * Register media collection.
     *
     * @throws \Brackets\Media\Exceptions\Collections\MediaCollectionAlreadyDefined
     */
    public function registerMediaCollections()
    {
        $this->addMediaCollection('blockGallery')
            ->accepts('image/*');
    }

    /**
     * Register media conversions.
     *
     * @param Media|null $media
     * @throws \Spatie\Image\Exceptions\InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->autoRegisterThumb200();

        $this->addMediaConversion('detail_hd')
            ->width(1920)
            ->height(1080)
            ->performOnCollections('blockGallery');
    }
}
