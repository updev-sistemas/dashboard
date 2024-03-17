<?php

namespace App\Utils\Enumerables;

class UserStatusEnum {
    const ACTIVE = 1000;
    const SUSPENDED = 0;

    public static function getStatus($status)
    {
        switch ($status) {
            case self::ACTIVE: return "Habilitado";
            case self::SUSPENDED: return "Desabilitado";
            default: return "Desconhecido";
        }
    }

    public static function getStatusLabel($status)
    {
        switch ($status) {
            case self::ACTIVE: return "success";
            case self::SUSPENDED: return "danger";
            default: return "default";
        }
    }
}
