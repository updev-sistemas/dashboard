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
                self::$formatter = new NumberFormatter( 'pt_BR', NumberFormatter::CURRENCY);
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
    public static function FormatNumber($value, $decimal_places = 2)
    {
        try
        {
            // Ensure string does not have leading/trailing spaces
            $value = trim($value);

            /**
             * Standardize readability delimiters
             *****************************************************/

            // Space used as thousands separator between digits
            $value = preg_replace('/(\d)(\s)(\d)/', '$1$3', $value);

            // Decimal used as delimiter when comma used as radix
            if (stristr($value, '.') && stristr($value, ',')) {
                // Ensure last period is BEFORE first comma
                if (strrpos($value, '.') < strpos($value, ',')) {
                    $value = str_replace('.', '', $value);
                }
            }

            // Comma used as delimiter when decimal used as radix
            if (stristr($value, ',') && stristr($value, '.')) {
                // Ensure last period is BEFORE first comma
                if (strrpos($value, ',') < strpos($value, '.')) {
                    $value = str_replace(',', '', $value);
                }
            }

            /**
             * Standardize radix (decimal separator)
             *****************************************************/

            // Possible radix options
            $radixOptions = [',', ' '];

            // Convert comma radix to "point" or "period"
            $value = str_replace(',', '.', $value);

            /**
             * Strip non-numeric and non-radix characters
             *****************************************************/

            // Remove other symbols like currency characters
            $value = preg_replace('/[^\d\.]/', '', $value);

            /**
             * Convert to float value
             *****************************************************/

            // String to float first before formatting
            $formatted_value = number_format(floatval($value), $decimal_places, '.', '');

            return $formatted_value;
        }
        catch (\Exception $e) {
            return 0;
        }
    }

}
