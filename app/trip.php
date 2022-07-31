<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trip extends Model
{
    protected $table="trips";
    protected $fillable=['state','price','description','date','agency_id'];
}
