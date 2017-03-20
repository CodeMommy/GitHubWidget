<?php

/**
 * CodeMommy GitHub Widget
 * @author  Candison November <www.kandisheng.com>
 */

namespace System;

use CodeMommy\WebPHP\Input;
use CodeMommy\WebPHP\Config;

class Json
{
    /**
     * @param $data
     *
     * @return bool
     */
    public static function show($data)
    {
        echo json_encode($data);
        return true;
    }

    /**
     * Is JsonP
     * @return bool
     */
    public static function isJson()
    {
        if (strtolower(Input::get(Config::get('application.showTypeName'), '')) == 'json') {
            return true;
        }
        return false;
    }
}