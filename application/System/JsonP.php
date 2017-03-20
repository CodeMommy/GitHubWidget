<?php

/**
 * CodeMommy GitHub Widget
 * @author  Candison November <www.kandisheng.com>
 */

namespace System;

use CodeMommy\WebPHP\Input;
use CodeMommy\WebPHP\Config;

class JsonP
{
    /**
     * @param $data
     *
     * @return bool
     */
    public static function show($data)
    {
        $callBack = Input::get(Config::get('application.jsonpName'), '');
        echo sprintf('%s(%s)', $callBack, json_encode($data));
        return true;
    }

    /**
     * Is JsonP
     * @return bool
     */
    public static function isJsonP()
    {
        if (empty(Input::get(Config::get('application.jsonpName'), ''))) {
            return false;
        }
        return true;
    }
}