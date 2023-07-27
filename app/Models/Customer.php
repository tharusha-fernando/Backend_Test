<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable=['first_name','last_name','email','address','nic'];



    public function ContactPerson(){
        return $this->belongsToMany(ContactPerson::class,'customer_contact','customer_id','contact_person_id');
    }
}
