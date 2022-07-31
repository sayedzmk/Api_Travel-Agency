<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class travelAgency extends Model
{
    protected $table="travel_agencies";
    protected $fillable=['name','legel_no','bank_account','phone','address','password','image'];
}
