<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPerson extends Model
{
    use HasFactory;

    protected $fillable=['first_name','last_name','email','address','nic'];



    public function Customer(){
        return $this->belongsToMany(Customer::class,'customer_contact','contact_person_id','customer_id');
    }


    
}
