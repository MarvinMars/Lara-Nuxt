<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Contact\StoreContact;
use App\Models\Contact;
use Mail;

class ContactsController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreContact $request
     * @return Response|array
     */
    public function store(StoreContact $request)
    {
        $submission = Contact::create($request->all());

        $response = [
            'message' => 'Failed to send your message. Please try later or contact the administrator by another method.'
        ];

        if ($submission) {
            Mail::send('emails.contacts.new_submission', ['contact' => $submission],
                function ($m) use ($submission) {
                    $m->from('', '');
                    $m->to('info@webmetech.com')
                        ->bcc('vlad@webmetech.com')
                        ->subject('New Contact Submission');
                });


            $response = [
                'message' => 'Your message was sent successfully. Thanks.'
            ];
        }

        return response()->json($response);
    }
}
