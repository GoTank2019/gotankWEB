<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Jam extends Model
{
    // use SoftDeletes;
	
    protected $table = 'jams';

    protected $guarded = [];
}
