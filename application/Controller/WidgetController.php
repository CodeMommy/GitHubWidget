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
    const CACHE = 'http://cache.shareany.com/?f=';
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return bool
     */
    public function members()
    {
        $data = array();
        $avatarSize = Input::get('avatar_size', 80);
        $data['avatarSize'] = intval($avatarSize);
        $user  = Input::get('user', '');
        $server = new GitHubPHP();
        $server->setURL($user);
        $cacheKey = sprintf('members.%s', $server->getUser());
        $members = CacheTool::cache($cacheKey, CacheTool::TIME_ONE_DAY, function () use ($server) {
            $result = $server->getMembers();
            foreach($result['data'] as &$value){
                $value['avatar'] = sprintf('%s%s', self::CACHE, $value['avatar']);
            }
            return $result;
        });

        $data['members'] = $members['data'];
        return Output::template('widget/members', $data);
    }
}