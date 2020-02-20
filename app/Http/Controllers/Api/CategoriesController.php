<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;

class CategoriesController extends Controller
{
    public function index()
    {
        $hero = Post::where('type', 'post')
            ->where('enabled', true)
            ->with('blocks')
            ->orderByDesc('published_at')
            ->first();

        $posts = Post::where('type', 'post')
            ->where('enabled', true)
            ->with('blocks')
            ->orderByDesc('published_at')
            ->limit(8);

        if ($hero) {
            $posts = $posts->where('id', '!=', $hero->id);
        }

        $posts = $posts->get();

//        $categories = Category::with([
//            'posts' => function (BelongsToMany $query) use ($hero) {
//                $query->where('enabled', true)->with('blocks')->orderByDesc('published_at');
//
//                if ($hero) {
//                    $query->where('posts.id', '!=', $hero->id);
//                }
//
//            }
//        ])->get()->groupBy('slug');

        return response()->json([
            'data' => $posts,
            'hero' => $hero,
        ]);

    }
}
