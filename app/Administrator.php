<?php

namespace App;

use App\Scopes\AdministratorScope;
use App\Scopes\CustomerScope;
use App\Utils\Enumerables\UserTypeEnum;

class Administrator extends User
{
    protected $table = "users";

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->id_type = UserTypeEnum::ADMIN;
    }

    public function enterprises() {
        return parent::enterprises();
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new AdministratorScope());
    }
}
