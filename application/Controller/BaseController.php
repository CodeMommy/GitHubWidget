<?php

/**
 * CodeMommy GitHub Widget
 * @author  Candison November <www.kandisheng.com>
 */

namespace Controller;

use CodeMommy\WebPHP\Controller;
use CodeMommy\WebPHP\Output;
use CodeMommy\WebPHP\Config;
use CodeMommy\WebPHP\Me;

/**
 * Class BaseController
 * @package Controller
 */
class BaseController extends Controller
{
    protected $data = null;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->data = array();
        $this->data['title'] = '';
    }

    /**
     * @param $view
     *
     * @return bool
     */
    public function template($view)
    {
        $siteTitle = Config::get('application.title');
        if (empty($this->data['title'])) {
            $this->data['title'] = $siteTitle;
        } else {
            $this->data['title'] .= ' - ' . $siteTitle;
        }
        $this->data['root'] = Me::root();
        $this->data['cache'] = Config::get('application.cache');
        $this->data['static'] = sprintf('%s%s', $this->data['root'] . Config::get('application.static'));
        if (in_array(Me::domain(), array(Config::get('application.domain')))) {
            $this->data['static'] = sprintf('%shttp://%s/%s', $this->data['cache'], Me::domain(), Config::get('application.static'));
        }
        return Output::template($view, $this->data);
    }
}