<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
use Auth;
use App\Company;

class Driver extends Authenticatable
{
    use SoftDeletes;
	protected $table = 'drivers';

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','created_at','updated_at','email_verified_at'
    ];

    /**
    * Method Many to Many Driver untuk Company dan Pesan
    */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function pesans()
    {
        return $this->hasMany(Pesan::class);
    }

    /**
    * Method One to Many Driver -> Company
    */
}
