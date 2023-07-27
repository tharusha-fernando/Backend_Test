<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\GetContactPersonRequest;
use App\Http\Requests\StoreContactPersonRequest;
use App\Http\Requests\UpdateContactPersonRequest;
use App\Models\ContactPerson;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetContactPersonRequest $request)
    {
        $contact_person=ContactPerson::query()
        ->when($request->person_name,function ($query) use($request){
            $query->where('first_name', 'like', '%' . $request->person_name . '%')
            ->orWhere('last_name', 'like', '%' . $request->person_name . '%');
        })
        ->when($request->customer_name,function ($query) use($request){
            $query->whereHas('Customer',function($query1) use($request){
                $query1->where('first_name', 'like', '%' . $request->customer_name . '%')
                ->orWhere('last_name', 'like', '%' . $request->customer_name . '%');
            });
        })->with('Customer')
        ->get();

        return $contact_person;
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactPersonRequest $request)
    {
        $data=$request->validated();


        try {
            $response = DB::transaction(function () use ($data) {
                $contact_person=ContactPerson::create($data);
                $contact_person->Customer()->attach($data['customer_id']);
              
            
                return [
                    'contact_person' => $contact_person,
                ];
            });
            return response($response);
        } catch (\Exception $ex) {
            return response()->json(['General Exeption = ', $ex->getMessage()], 500);
        } catch (\Error $er) {
            return response()->json(['General Error = ', $er->getMessage()], 500);
        } catch (QueryException $qr) {
            return response()->json(['General Exeption = ', $qr->getMessage()], 500);
        }




        
      
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactPerson $contact_person)
    {
        $contact_person->load('Customer');
        return response($contact_person);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactPersonRequest $request, ContactPerson $contact_person)
    {
        $data=$request->validated();
        try {
            $response = DB::transaction(function () use ($data,$contact_person) {
                $contact_person->update($data);
                if(!$contact_person->Customer->contains($data['customer_id'])){
                    $contact_person->Customer()->attach($data['customer_id']);
                }   
                $contact_person->load('Customer');       
                return [
                    'contact_person' => $contact_person,
                ];
            });
            return response($response);
        } catch (\Exception $ex) {
            return response()->json(['General Exeption = ', $ex->getMessage()], 500);
        } catch (\Error $er) {
            return response()->json(['General Error = ', $er->getMessage()], 500);
        } catch (QueryException $qr) {
            return response()->json(['General Exeption = ', $qr->getMessage()], 500);
        }

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactPerson $contact_person)
    {
        $contact_person->delete();
        return response()->noContent();

        //
    }
}
