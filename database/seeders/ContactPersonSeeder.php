<?php

namespace Database\Seeders;

use App\Models\ContactPerson;
use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactPersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers=Customer::all();

        foreach($customers as $customer){
            $contact_person=ContactPerson::factory()->create();
            $contact_person->Customer()->attach($customer->id);
        }
        foreach($customers as $customer){
            $contact_person=ContactPerson::factory()->create();
            $contact_person->Customer()->attach($customer->id);
        }
        //
    }
}
