<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Slide\DestroySlide;
use App\Http\Requests\Admin\Slide\IndexSlide;
use App\Http\Requests\Admin\Slide\StoreSlide;
use App\Http\Requests\Admin\Slide\UpdateSlide;
use App\Models\Slide;
use Brackets\AdminListing\Facades\AdminListing;
use Illuminate\Http\Response;

class SlidesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexSlide $request
     * @return Response|array
     */
    public function index(IndexSlide $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Slide::class)->processRequestAndGet(
        // pass the request with params
            $request,

            // set columns to query
            ['id', 'slug', 'template'],

            // set columns to searchIn
            ['id', 'slug', 'fields']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.slide.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.slide.create');

        return view('admin.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSlide $request
     * @return Response|array
     */
    public function store(StoreSlide $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Slide
        $slide = Slide::create($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/slides'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded')
            ];
        }

        return redirect('admin/slides');
    }

    /**
     * Display the specified resource.
     *
     * @param  Slide $slide
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Slide $slide)
    {
        $this->authorize('admin.slide.show', $slide);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Slide $slide
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Slide $slide)
    {
        $this->authorize('admin.slide.edit', $slide);

        return view('admin.slide.edit', [
            'slide' => $slide,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSlide $request
     * @param  Slide $slide
     * @return Response|array
     */
    public function update(UpdateSlide $request, Slide $slide)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Slide
        $slide->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/slides'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded')
            ];
        }

        return redirect('admin/slides');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroySlide $request
     * @param  Slide $slide
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroySlide $request, Slide $slide)
    {
        $slide->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

}
