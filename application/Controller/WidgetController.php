<?php

/**
 * CodeMommy GitHub Widget
 * @author  Candison November <www.kandisheng.com>
 */

namespace Controller;

use CodeMommy\WebPHP\Input;
use CodeMommy\GitHubPHP;
use System\Cache;
use System\JsonP;
use System\Json;

/**
 * Class HomeController
 * @package Controller
 */
class WidgetController extends BaseController
{

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
        $this->data['title'] = 'Members';
        $avatarSize = Input::get('avatar_size', 100);
        $this->data['avatarSize'] = intval($avatarSize);
        $user = Input::get('user', '');
        $server = new GitHubPHP();
        $server->setURL($user);
        $cacheKey = sprintf('%s.%s', __FUNCTION__, $server->getUser());
        $members = Cache::cache($cacheKey, Cache::TIME_ONE_DAY, function () use ($server) {
            return $server->getMembers();
        });
        $this->data['members'] = $members['data']['data'];
        if (Json::isJson()) {
            return Json::show($this->data['members']);
        }
        if (JsonP::isJsonP()) {
            return JsonP::show($this->data['members']);
        }
        return $this->template('widget/members');
    }

    /**
     * User
     * @return bool
     */
    public function user()
    {
        $this->data['title'] = 'User';
        $avatarSize = Input::get('avatar_size', 64);
        $this->data['avatarSize'] = intval($avatarSize);
        $user = Input::get('user', '');
        $server = new GitHubPHP();
        $server->setURL($user);
        $cacheKey = sprintf('%s.%s', __FUNCTION__, $server->getUser());
        $members = Cache::cache($cacheKey, Cache::TIME_ONE_DAY, function () use ($server) {
            return $server->getUserInformation();
        });
        $this->data['user'] = $members['data']['data'];
        if (Json::isJson()) {
            return Json::show($this->data['user']);
        }
        if (JsonP::isJsonP()) {
            return JsonP::show($this->data['user']);
        }
        return $this->template('widget/user');
    }

    /**
     * Events
     * @return bool
     */
    public function events()
    {
        $this->data['title'] = 'Events';
        $avatarSize = Input::get('avatar_size', 64);
        $this->data['avatarSize'] = intval($avatarSize);
        $user = Input::get('user', '');
        $server = new GitHubPHP();
        $server->setURL($user);
        $cacheKey = sprintf('%s.%s', __FUNCTION__, $server->getUser());
        $members = Cache::cache($cacheKey, Cache::TIME_ONE_DAY, function () use ($server) {
            return $server->getEvents();
        });
        $this->data['events'] = $members['data']['data'];
        if (Json::isJson()) {
            return Json::show($this->data['events']);
        }
        if (JsonP::isJsonP()) {
            return JsonP::show($this->data['events']);
        }
        return $this->template('widget/events');
    }
}