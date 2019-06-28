<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pesan extends Model
{
    use SoftDeletes;
    protected $table = 'pesans';
    protected $guarded = [];
    // protected $hidden = ['company_id']

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jam()
    {
        return $this->belongsTo(Jam::class);
    }
}
