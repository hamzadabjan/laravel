<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ['id','name_en','name_ar','photo', 'price', 'details_en','details_ar', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];
}
