<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
use Auth;
// use App\Driver;

class Company extends Authenticatable implements MustVerifyEmail
{
  use Notifiable;

  use SoftDeletes;

  protected $guarded = [];

  protected $table = 'companies';

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token','created_at'
  ];

  protected $casts = [
      'email_verified_at' => 'datetime',
  ];

  /**
  *
  * Method One to Many Company -> Drivers
  *
  */
  public function drivers()
  {
    return $this->hasMany(Driver::class, 'company_id');
  }

  public function pesans()
  {
      return $this->hasMany(Pesan::class);
  }
}
