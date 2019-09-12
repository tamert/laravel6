<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $table = 'home';

    protected $fillable = ["*"];

    public $timestamps = true;

}
