<?php

namespace App\Scopes;

use App\Utils\Enumerables\UserTypeEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class CustomerScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('id_type', UserTypeEnum::CUSTOMER);
    }
}
