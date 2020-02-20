<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\DestroyPost;
use App\Http\Requests\Admin\Post\IndexPost;
use App\Http\Requests\Admin\Post\StorePost;
use App\Http\Requests\Admin\Post\UpdatePost;
use App\Models\Hero;
use App\Models\Post;
use Brackets\AdminListing\Facades\AdminListing;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;


class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexPost $request
     * @return Response|array
     */
    public function index(IndexPost $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Post::class)->processRequestAndGet(
        // pass the request with params
            $request,

            // set columns to query
            ['id', 'title', 'published_at', 'enabled', 'type', 'slug', 'header_subtitle'],

            // set columns to searchIn
            ['id', 'title', 'header_subtitle', 'slug', 'type']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.post.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.post.create');
        $heroes = Hero::all()->load('slides');
        return view('admin.post.create', ['heroes' => $heroes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePost $request
     * @return Response|array
     */
    public function store(StorePost $request)
    {
        $hero = $request->get('hero');

        $modules = $request->get('blocks', []);

        // Sanitize input
        $sanitized = $request->validated();
        // Store the Post
        $post = Post::create($sanitized);

        if (!empty($hero) && $post->type == 'hero') {
            $post->hero_id = $hero['id'];
        }

        $this->createBlocks($modules, $post);
        $post->save();

        Post::flushCache();

        if ($request->ajax()) {
            return [
                'redirect' => route('admin/posts/edit', ['post' => $post->id]),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
                'data' => $post,
            ];
        }

        return redirect('admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  Post $post
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Post $post)
    {
        $this->authorize('admin.post.show', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Post $post
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Post $post)
    {
        $heroes = Hero::all()->load('slides');
        $this->authorize('admin.post.edit', $post);
        return view('admin.post.edit', [
            'post' => $post->load('blocks', 'hero'),
            'heroes' => $heroes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePost $request
     * @param  Post $post
     * @return Response|array
     */
    public function update(UpdatePost $request, Post $post)
    {
        $hero = $request->get('hero');
        $modules = $request->get('blocks');
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Post
        $post->update($sanitized);

        $post->blocks()->delete();

        if (!empty($hero) && $post->type == 'hero') {
            $post->hero_id = $hero['id'];
        }

        $this->createBlocks($modules, $post);
        $post->save();

        Post::flushCache();

        if ($request->ajax()) {
            return [
                'redirect' => route('admin/posts/edit', ['post' => $post->id]),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
                'data' => $post,
            ];
        }

        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyPost $request
     * @param  Post $post
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyPost $request, Post $post)
    {
        $post->categories()->detach();
        $post->hero()->dissociate();
        $post->blocks()->delete();
        $post->delete();

        Post::flushCache();

        if ($request->ajax()) {
            return response([
                'message' => trans('brackets/admin-ui::admin.operation.succeeded')
            ]);
        }

        return redirect()->back();
    }

    /**
     * create blocks for Post.
     *
     * @param  $modules
     * @param  Post $post
     * @return Response|bool
     */
    public function createBlocks($modules, $post)
    {
        if (empty($modules) || empty($post)) {
            return false;
        }

        $order = 1;
        foreach ($modules as $module) {
            $module['order'] = $order;
            unset($module['id']);

            $post->blocks()->create([
                'name' => $module['name'],
                'group' => $module['group'],
                'html' => $module['html'],
                'type' => Arr::get($module, 'type', 'page'),
                'fields' => Arr::get($module, 'fields', []),
                'order' => $order
            ]);

            $order++;
        }
        return true;
    }
}
