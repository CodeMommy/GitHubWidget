<?php

/**
 * CodeMommy GitHub Widget
 * @author  Candison November <www.kandisheng.com>
 */

namespace Controller;

use CodeMommy\WebPHP\Input;
use CodeMommy\GitHubPHP;
use Core\CacheTool;

/**
 * Class HomeController
 * @package Controller
 */
class WidgetController extends BaseController
{
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
        $avatarSize = Input::get('avatar_size', 100);
        $this->data['avatarSize'] = intval($avatarSize);
        $user = Input::get('user', '');
        $server = new GitHubPHP();
        $server->setURL($user);
        $cacheKey = sprintf('%s.%s.%s', __FUNCTION__, $server->getUser(), self::CACHE_VERSION);
        $members = CacheTool::cache($cacheKey, CacheTool::TIME_ONE_DAY, function () use ($server) {
            return $server->getMembers();
        });
        $this->data['members'] = $members['data']['data'];
        if ($this->isJsonP()) {
            return $this->jsonP($this->data['members']);
        }
        return $this->template('widget/members');
    }

    /**
     * Members
     * @return bool
     */
    public function user()
    {
        $avatarSize = Input::get('avatar_size', 64);
        $this->data['avatarSize'] = intval($avatarSize);
        $user = Input::get('user', '');
        $server = new GitHubPHP();
        $server->setURL($user);
        $cacheKey = sprintf('%s.%s.%s', __FUNCTION__, $server->getUser(), self::CACHE_VERSION);
        $members = CacheTool::cache($cacheKey, CacheTool::TIME_ONE_DAY, function () use ($server) {
            return $server->getUserInformation();
        });
        $this->data['user'] = $members['data']['data'];
        if ($this->isJsonP()) {
            return $this->jsonP($this->data['user']);
        }
        return $this->template('widget/user');
    }
}