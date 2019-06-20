<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;
use Auth;

class Driver extends Authenticatable
{
	protected $table = 'drivers';

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function pesans()
    {
        return $this->hasMany(Pesan::class);
    }
}
