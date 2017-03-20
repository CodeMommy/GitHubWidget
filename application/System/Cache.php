<?php

/**
 * CodeMommy GitHub Widget
 * @author  Candison November <www.kandisheng.com>
 */

namespace System;

use CodeMommy\WebPHP\Cache as CodeMommyCache;
use CodeMommy\WebPHP\Config;

class Cache
{
    const TIME_ONE_SECOND  = 1;
    const TIME_ONE_MINUTE  = 1 * 60;
    const TIME_ONE_HOUR    = 1 * 60 * 60;
    const TIME_ONE_DAY     = 1 * 60 * 60 * 24;
    const TIME_ONE_MONTH   = 1 * 60 * 60 * 24 * 30;
    const TIME_ONE_QUARTER = 1 * 60 * 60 * 24 * 90;
    const TIME_ONE_YEAR    = 1 * 60 * 60 * 24 * 365;

    public static function cache($key, $timeOut, $function)
    {
        $cacheRootKey = Config::get('application.cacheRootKey');
        $cacheVersion = Config::get('application.cacheVersion');
        $key = sprintf('%s.%s.%s', $cacheRootKey, $key, $cacheVersion);
        if (CodeMommyCache::isExist($key)) {
            return unserialize(CodeMommyCache::get($key));
        }
        $value = $function();
        $timeOut = intval($timeOut);
        CodeMommyCache::set($key, serialize($value), $timeOut);
        return $value;
    }
}