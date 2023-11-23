<?php

namespace App;

use App\Utils\Enumerables\UserTypeEnum;

use Illuminate\Database\Eloquent\Model;

class Customer extends User
{
    protected $table = "users";

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->id_type = UserTypeEnum::CUSTOMER;
    }

    public function enterprises() {
        return parent::enterprises();
    }
}
