<?php

/**
 * CodeMommy GitHub Widget
 * @author  Candison November <www.kandisheng.com>
 */

namespace Controller;

use CodeMommy\WebPHP\Input;
use CodeMommy\WebPHP\Output;
use CodeMommy\GitHubPHP;
use Core\CacheTool;

/**
 * Class HomeController
 * @package Controller
 */
class WidgetController extends BaseController
{
//    const CACHE = 'http://cache.shareany.com/?f=';
    const CACHE_VERSION = 1;

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Members
     * @return bool
     */
    public function members()
    {
        $data = array();
        $avatarSize = Input::get('avatar_size', 100);
        $data['avatarSize'] = intval($avatarSize);
        $user = Input::get('user', '');
        $server = new GitHubPHP();
        $server->setURL($user);
        $cacheKey = sprintf('%s.%s.%s', __FUNCTION__, $server->getUser(), self::CACHE_VERSION);
        $members = CacheTool::cache($cacheKey, CacheTool::TIME_ONE_DAY, function () use ($server) {
            $result = $server->getMembers();
//            if ($result['status'] == true) {
//                foreach ($result['data']['data'] as &$value) {
//                    $value['avatar'] = sprintf('%s%s', self::CACHE, $value['avatar']);
//                }
//            }
            return $result;
        });
        $data['members'] = $members['data']['data'];
        $callBack = Input::get('callback', '');
        if (empty($callBack)) {
            return Output::template('widget/members', $data);
        } else {
            echo sprintf('%s(%s)', $callBack, json_encode($data['members']));
            return true;
        }
    }

    /**
     * Members
     * @return bool
     */
    public
    function user()
    {
        $data = array();
        $avatarSize = Input::get('avatar_size', 64);
        $data['avatarSize'] = intval($avatarSize);
        $user = Input::get('user', '');
        $server = new GitHubPHP();
        $server->setURL($user);
        $cacheKey = sprintf('%s.%s.%s', __FUNCTION__, $server->getUser(), self::CACHE_VERSION);
        $members = CacheTool::cache($cacheKey, CacheTool::TIME_ONE_DAY, function () use ($server) {
            $result = $server->getUserInformation();
//            if ($result['status'] == true) {
//                $result['data']['data']['avatar'] = sprintf('%s%s', self::CACHE, $result['data']['data']['avatar']);
//            }
            return $result;
        });
        $data['user'] = $members['data']['data'];
        $callBack = Input::get('callback', '');
        if (empty($callBack)) {
            return Output::template('widget/user', $data);
        } else {
            echo sprintf('%s(%s)', $callBack, json_encode($data['user']));
            return true;
        }
    }
}