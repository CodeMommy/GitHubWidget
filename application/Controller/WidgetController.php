<?php

/**
 * CodeMommy GitHub Widget
 * @author  Candison November <www.kandisheng.com>
 */

namespace Controller;

use CodeMommy\WebPHP\Input;
use CodeMommy\WebPHP\Config;
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
    private $server = null;

    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get GitHub Server
     * @return GitHubPHP|null
     */
    private function getGitHubServer()
    {
        if ($this->server == null) {
            $this->server = new GitHubPHP();
            $this->server->setSize(Config::get('application.size', 1000));
            $this->server->setClientID(Config::get('application.clientID', ''));
            $this->server->setClientSecret(Config::get('application.clientSecret', ''));
        }
        return $this->server;
    }

    /**
     * User Information
     * @return bool
     */
    public function userInformation()
    {
        $this->data['title'] = 'User Information';
        $avatarSize = Input::get('avatar_size', 64);
        $this->data['avatarSize'] = intval($avatarSize);
        $user = Input::get('user', '');
        $server = $this->getGitHubServer();
        $server->setURL($user);
        $cacheKey = sprintf('%s.%s', __FUNCTION__, $server->getUser());
        $members = Cache::cache($cacheKey, Cache::TIME_ONE_DAY, function () use ($server) {
            return $server->getOrganizationInformation();
        });
        $this->data['data'] = $members['data']['data'];
        if (Json::isJson()) {
            return Json::show($this->data['data']);
        }
        if (JsonP::isJsonP()) {
            return JsonP::show($this->data['data']);
        }
        return $this->template('widget/userInformation');
    }

    /**
     * Organization Members
     * @return bool
     */
    public function organizationMembers()
    {
        $this->data['title'] = 'Organization Members';
        $avatarSize = Input::get('avatar_size', 100);
        $this->data['avatarSize'] = intval($avatarSize);
        $user = Input::get('user', '');
        $server = $this->getGitHubServer();
        $server->setURL($user);
        $cacheKey = sprintf('%s.%s', __FUNCTION__, $server->getUser());
        $members = Cache::cache($cacheKey, Cache::TIME_ONE_DAY, function () use ($server) {
            return $server->getOrganizationMembers();
        });
        $this->data['data'] = $members['data']['data'];
        if (Json::isJson()) {
            return Json::show($this->data['data']);
        }
        if (JsonP::isJsonP()) {
            return JsonP::show($this->data['data']);
        }
        return $this->template('widget/organizationMembers');
    }

    /**
     * Organization Information
     * @return bool
     */
    public function organizationInformation()
    {
        $this->data['title'] = 'Organization Information';
        $avatarSize = Input::get('avatar_size', 64);
        $this->data['avatarSize'] = intval($avatarSize);
        $user = Input::get('user', '');
        $server = $this->getGitHubServer();
        $server->setURL($user);
        $cacheKey = sprintf('%s.%s', __FUNCTION__, $server->getUser());
        $members = Cache::cache($cacheKey, Cache::TIME_ONE_DAY, function () use ($server) {
            return $server->getOrganizationInformation();
        });
        $this->data['data'] = $members['data']['data'];
        if (Json::isJson()) {
            return Json::show($this->data['data']);
        }
        if (JsonP::isJsonP()) {
            return JsonP::show($this->data['data']);
        }
        return $this->template('widget/organizationInformation');
    }

    /**
     * Organization Events
     * @return bool
     */
    public function organizationEvents()
    {
        $this->data['title'] = 'Organization Events';
        $avatarSize = Input::get('avatar_size', 64);
        $this->data['avatarSize'] = intval($avatarSize);
        $user = Input::get('user', '');
        $server = $this->getGitHubServer();
        $server->setURL($user);
        $cacheKey = sprintf('%s.%s', __FUNCTION__, $server->getUser());
        $members = Cache::cache($cacheKey, Cache::TIME_ONE_DAY, function () use ($server) {
            return $server->getOrganizationEvents();
        });
        $this->data['data'] = $members['data']['data'];
        if (Json::isJson()) {
            return Json::show($this->data['data']);
        }
        if (JsonP::isJsonP()) {
            return JsonP::show($this->data['data']);
        }
        return $this->template('widget/organizationEvents');
    }
}