<?php

namespace App;

use App\Utils\Enumerables\UserTypeEnum;

use Illuminate\Database\Eloquent\Model;

class Customer extends User
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->id_type = UserTypeEnum::CUSTOMER;
    }

    public function enterprise() {
        return parent::enterprise();
    }
}
