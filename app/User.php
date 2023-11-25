<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Utils\Enumerables\UserTypeEnum;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','id_type','last_access_date','id_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        "created_at" => "datetime",
        "updated_at" => "datetime",
        "last_access_date" => "datetime",
    ];

    protected $dates = [
        "created_at",
        "updated_at",
        "last_access_date"
    ];

    public function isAdministratorUser() {
        return $this->id_type == UserTypeEnum::ADMIN;
    }

    public function isCustomerUser() {
        return $this->id_type == UserTypeEnum::CUSTOMER;
    }

    public function enterprises() {
        return $this->hasMany(Enterprise::class, 'user_id');
    }
}
