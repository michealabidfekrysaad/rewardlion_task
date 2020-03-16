<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class reports extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'reports';

    protected $fillable = ['name','image','description'];
}
