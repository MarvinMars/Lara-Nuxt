<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property-read mixed $resource_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereTitle($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 */
	class Hero extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string|null $header_subtitle
 * @property array|mixed $old_description
 * @property array|mixed $old_keywords
 * @property string $slug
 * @property string|null $published_at
 * @property int $enabled
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $type
 * @property int|null $hero_id
 * @property string|null $description
 * @property string|null $keywords
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Block[] $blocks
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read mixed $frontend_link
 * @property-read \Collection $meta
 * @property-read mixed $published_at_format
 * @property-read mixed $resource_url
 * @property-read \App\Models\Hero|null $hero
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Meta[] $metas
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereHeaderSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereHeroId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereOldDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereOldKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereUpdatedAt($value)
 */
	class Post extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Post[] $posts
 */
	class Meta extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Contact
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $company
 * @property string $project_details
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $resource_url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereProjectDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Contact whereUpdatedAt($value)
 */
	class Contact extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Block
 *
 * @property int $id
 * @property string $name
 * @property string|null $group
 * @property string|null $html
 * @property array|null $fields
 * @property int $order
 * @property int $post_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $type
 * @property-read mixed $resource_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Media[] $media
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block whereFields($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block whereGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block whereHtml($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Block whereUpdatedAt($value)
 */
	class Block extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Menu
 *
 * @property-read mixed $resource_url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $label
 * @property string $url
 * @property string $type
 * @property int $order
 * @property int|null $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Menu whereUrl($value)
 */
	class Menu extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Slide
 *
 * @property int $id
 * @property string $slug
 * @property array $fields
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $template
 * @property-read \Illuminate\Contracts\Routing\UrlGenerator|string $resource_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Hero[] $heroes
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereFields($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slide whereUpdatedAt($value)
 */
	class Slide extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string|null $slug
 * @property array|null $fields
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $resource_url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereFields($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Setting whereUpdatedAt($value)
 */
	class Setting extends \Eloquent {}
}

