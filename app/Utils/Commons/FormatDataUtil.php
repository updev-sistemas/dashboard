<?php

namespace App\Utils\Commons;

use NumberFormatter;

class FormatDataUtil
{
    private static $formatter = null;

    private static function get_formatter()
    {
        try {
            if (is_null(self::$formatter))
            {
                self::$formatter = new NumberFormatter( 'pt_BR', NumberFormatter::CURRENCY );
            }

            return  self::$formatter;
        }
        catch (\Exception $e)
        {
            logger($e->getMessage());
            return null;
        }
    }
    public static function FormatMoney( $value )
    {
        try
        {
            $newValue = (float) str_replace(['.',',','+'], ['+','','.'], $value);

            $l_formatter = self::get_formatter();
            if ($l_formatter == null)
            {
                return 0;
            }

            return $l_formatter->formatCurrency($newValue, 'BRL');
        }
        catch (\Exception $e)
        {
            logger($e->getMessage());
            return 0;
        }
    }

    public static function FormatNumber( $value )
    {
        try
        {
            $entradaLimpa = str_replace(',', '.', str_replace('.', '', $value));

            return $entradaLimpa;
        }
        catch (\Exception $e) {
            return 0;
        }
    }
}
