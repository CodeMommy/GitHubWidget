<?php

/**
 * CodeMommy GitHub Widget
 * @author  Candison November <www.kandisheng.com>
 */

namespace Core;

use CodeMommy\WebPHP\Cache;

class CacheTool
{
    const TIME_ONE_DAY = 3600 * 24;
    const CACHE_ROOT   = 'CodeMommy.GitHubWidget';

    public static function cache($key, $timeOut, $function)
    {
        $key = sprintf('%s.%s', self::CACHE_ROOT, $key);
        if (Cache::isExist($key)) {
            return unserialize(Cache::get($key));
        }
        $value = $function();
        $timeOut = intval($timeOut);
        Cache::set($key, serialize($value), $timeOut);
        return $value;
    }
}