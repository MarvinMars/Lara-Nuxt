<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Hero\DestroyHero;
use App\Http\Requests\Admin\Hero\IndexHero;
use App\Http\Requests\Admin\Hero\StoreHero;
use App\Http\Requests\Admin\Hero\UpdateHero;
use App\Models\Hero;
use App\Models\Post;
use App\Models\Slide;
use Brackets\AdminListing\Facades\AdminListing;
use Illuminate\Http\Response;

class HeroesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexHero $request
     * @return Response|array
     */
    public function index(IndexHero $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Hero::class)->processRequestAndGet(
        // pass the request with params
            $request,

            // set columns to query
            ['id', 'template', 'slug'],

            // set columns to searchIn
            ['id', 'template', 'slug']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.hero.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.hero.create');

        return view('admin.hero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreHero $request
     * @return Response|array
     */
    public function store(StoreHero $request)
    {
        $slides = $request->get('slides');
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Hero
        $hero = Hero::create($sanitized);

        $this->createSlides($slides, $hero);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/heroes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded')
            ];
        }

        return redirect('admin/heroes');
    }

    /**
     * Display the specified resource.
     *
     * @param  Hero $hero
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Hero $hero)
    {
        $this->authorize('admin.hero.show', $hero);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Hero $hero
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Hero $hero)
    {

        $this->authorize('admin.hero.edit', $hero);

        $hero = $hero->load([
            'slides' => function ($query) {
                $query->orderBy('fields->order', 'asc');
            }
        ]);

        return view('admin.hero.edit', ['hero' => $hero]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateHero $request
     * @param  Hero $hero
     * @return Response|array
     */
    public function update(UpdateHero $request, Hero $hero)
    {
        $slides = $request->get('slides', []);

        // Sanitize input
        $sanitized = $request->validated();
        // Update changed values Hero
        $hero->update($sanitized);

        $this->createSlides($slides, $hero);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/heroes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded')
            ];
        }

        return redirect('admin/heroes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyHero $request
     * @param  Hero $hero
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyHero $request, Hero $hero)
    {
        $slides = $hero->slides()->get()->groupBy('id')->keys();;

        $hero->slides()->detach();

        foreach ($slides as $slide_id) {
            Slide::find($slide_id)->delete();
        }
        $hero->posts()->get()->each(function ($post) use ($hero) {
            $post->hero()->dissociate($hero->id);
            $post->save();
        });
        $hero->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * create blocks for Post.
     *
     * @param array $slides
     * @param  Post $hero
     * @return Response|bool
     */
    public function createSlides(array $slides, $hero)
    {
        if (empty($hero)) {
            return false;
        }

        $old_slides = $hero->slides()->get()->groupBy('id')->keys();
        $slides_for_remove = [];

        if (!empty($old_slides)) {
            $new_slides = collect($slides)->groupBy('id')->keys();

            if (!empty($new_slides)) {
                $slides_for_remove = $old_slides->diff($new_slides);
            } else {
                $slides_for_remove = $old_slides;
            }
        }

        if (!empty($slides_for_remove)) {
            foreach ($slides_for_remove as $slide_id) {
                $hero->slides()->detach($slide_id);
                Slide::find($slide_id)->delete();
            }
        }

        if (!empty($slides)) {
            foreach ($slides as $index => $slide) {

                $slide['template'] = $hero->template;
                $slide['fields']['order'] = $index + 1;

                if (!empty($slide['id'])) {
                    Slide::find($slide['id'])->update($slide);
                } else {
                    $slide = Slide::create($slide);
                    $hero->slides()->attach($slide);
                }
            }
        }

        $slides = $hero->slides()->get();

        foreach ($slides as $slide) {
            $hero->slides()->touch($slide->id);
        }

        return true;
    }

}
