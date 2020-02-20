<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Block\IndexBlock;
use App\Http\Requests\Admin\Block\StoreBlock;
use App\Http\Requests\Admin\Block\UpdateBlock;
use App\Http\Requests\Admin\Block\DestroyBlock;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Block;

class BlocksController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexBlock $request
     * @return Response|array
     */
    public function index(IndexBlock $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Block::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'order', 'post_id'],

            // set columns to searchIn
            ['id', 'name', 'html', 'fields']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.block.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.block.create');

        return view('admin.block.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBlock $request
     * @return Response|array
     */
    public function store(StoreBlock $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Block
        $block = Block::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/blocks'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/blocks');
    }

    /**
     * Display the specified resource.
     *
     * @param  Block $block
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Block $block)
    {
        $this->authorize('admin.block.show', $block);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Block $block
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Block $block)
    {
        $this->authorize('admin.block.edit', $block);

        return view('admin.block.edit', [
            'block' => $block,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBlock $request
     * @param  Block $block
     * @return Response|array
     */
    public function update(UpdateBlock $request, Block $block)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Block
        $block->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/blocks'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/blocks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyBlock $request
     * @param  Block $block
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyBlock $request, Block $block)
    {
        $block->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
