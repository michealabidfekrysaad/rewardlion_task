<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reports extends Model
{
    protected $table = 'reports';

    protected $fillable = ['name','image','description'];
}
