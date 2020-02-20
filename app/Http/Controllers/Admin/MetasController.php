<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Meta\IndexMeta;
use App\Http\Requests\Admin\Meta\StoreMeta;
use App\Http\Requests\Admin\Meta\UpdateMeta;
use App\Http\Requests\Admin\Meta\DestroyMeta;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Meta;

class MetasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexMeta $request
     * @return Response|array
     */
    public function index(IndexMeta $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Meta::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'content', 'property'],

            // set columns to searchIn
            ['id', 'name', 'content', 'property']
        );

        $posts = Post::select(['id','slug'])->get();

        if ($request->ajax()) {
            return ['data' => $data,'posts'=>$posts];
        }

        return view('admin.meta.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.meta.create');

        $posts = Post::select(['id','slug'])->get();

        return view('admin.meta.create', [ 'posts' => $posts ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreMeta $request
     * @return Response|array
     */
    public function store(StoreMeta $request)
    {
        $posts = $request->get('posts');
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Meta
        $metum = Meta::create($sanitized);

        foreach($posts as $post){
            $metum->posts()->attach($post['id']);
        }

        if ($request->ajax()) {
            return ['redirect' => url('admin/metas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/metas');
    }

    /**
     * Display the specified resource.
     *
     * @param  Meta $metum
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Meta $metum)
    {
        $this->authorize('admin.meta.show', $metum);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Meta $metum
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Meta $metum)
    {
        $this->authorize('admin.meta.edit', $metum);

        $posts = Post::select(['id','slug'])->get();

        return view('admin.meta.edit', ['metum' => $metum->load('posts'), 'posts'=>$posts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateMeta $request
     * @param  Meta $metum
     * @return Response|array
     */
    public function update(UpdateMeta $request, Meta $metum)
    {
        $posts = $request->get('posts');

        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Meta
        $metum->update($sanitized);

        $metum->posts()->detach();

        foreach($posts as $post){
            $metum->posts()->attach($post['id']);
        }

        if ($request->ajax()) {
            return ['redirect' => url('admin/metas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/metas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyMeta $request
     * @param  Meta $metum
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyMeta $request, Meta $metum)
    {
        $metum->posts()->detach();

        $metum->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
