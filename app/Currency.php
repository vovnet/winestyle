<?php

namespace app;


class Currency
{
    public static function get($val)
    {
        session_start();
        if (isset($_SESSION['currency']) && isset($_SESSION['rate'])) {
            if ($_SESSION['currency'] == 'eng') {
                return ($val * $_SESSION['rate']).' $';
            }
        }

        return $val . ' руб.';
    }
}