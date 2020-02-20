<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function show(Request $request, string $type, string $slug)
    {
        $post = Post::where('enabled', true)
            ->remember(60)
            ->where('slug', $slug)
            ->where('type', $type)
            ->firstOrFail();

        if ($post) {
            if (!empty($post->hero_id)) {
                $post = $post->load([
                    'blocks',
                    'hero',
                    'hero.slides' => function ($query) {
                        $query->orderBy('fields->order', 'asc');
                    }
                ]);
            } else {
                $post = $post->load('blocks');
            }
        }

        return response()->json(['data' => $post])->setStatusCode($post ? 200 : 404);
    }
}
