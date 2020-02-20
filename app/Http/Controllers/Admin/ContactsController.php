<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Contact\IndexContact;
use App\Http\Requests\Admin\Contact\StoreContact;
use App\Http\Requests\Admin\Contact\UpdateContact;
use App\Http\Requests\Admin\Contact\DestroyContact;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Contact;

class ContactsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexContact $request
     * @return Response|array
     */
    public function index(IndexContact $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Contact::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'email', 'company'],

            // set columns to searchIn
            ['id', 'name', 'email', 'company', 'project_details']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.contact.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.contact.create');

        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreContact $request
     * @return Response|array
     */
    public function store(StoreContact $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Contact
        $contact = Contact::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/contacts'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/contacts');
    }

    /**
     * Display the specified resource.
     *
     * @param  Contact $contact
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Contact $contact)
    {
        $this->authorize('admin.contact.show', $contact);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Contact $contact
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Contact $contact)
    {
        $this->authorize('admin.contact.edit', $contact);

        return view('admin.contact.edit', [
            'contact' => $contact,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateContact $request
     * @param  Contact $contact
     * @return Response|array
     */
    public function update(UpdateContact $request, Contact $contact)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Contact
        $contact->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/contacts'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/contacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyContact $request
     * @param  Contact $contact
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyContact $request, Contact $contact)
    {
        $contact->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
