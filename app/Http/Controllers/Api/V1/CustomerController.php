<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactPersonRequest;
use App\Models\ContactPerson;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Customer::all();
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactPersonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactPerson $contact_person)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactPerson $contact_person)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactPerson $contact_person)
    {
        //
    }
}
