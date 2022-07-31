<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class admin extends Model
{
    // use  HasApiTokens;

    protected $table="admins";
    protected $fillable=['name','email','password','age','national_id','address','phone','gender'];
}
