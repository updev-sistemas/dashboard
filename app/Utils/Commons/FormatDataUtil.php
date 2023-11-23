<?php

namespace App\Utils\Commons;


use NumberFormatter;

class FormatDataUtil
{
    private static $formatter = null;

    private static function get_formatter()
    {
        if (is_null(self::$formatter))
        {
            self::$formatter = new NumberFormatter( 'pt_BR', NumberFormatter::CURRENCY );
        }

        return  self::$formatter;
    }
    public static function FormatMoney( $value )
    {
        $l_formatter = self::get_formatter();
        return $l_formatter->formatCurrency($value, 'BRL');
    }
}
