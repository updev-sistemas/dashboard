<?php

namespace App;

use App\Utils\Enumerables\UserTypeEnum;

use Illuminate\Database\Eloquent\Model;

class Administrator extends User
{
    protected $table = "users";

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->id_type = UserTypeEnum::ADMIN;
    }

    public function enterprise() {
        return parent::enterprise();
    }
}
