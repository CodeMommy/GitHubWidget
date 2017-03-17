<?php

return array(
    // Route Type: pathinfo, map or symfony
    'type' => 'symfony',
    // Route Configure
    // any, get, post...
    'get'  => array(
        ''                      => 'HomeController.index',
        'widget/members/{user}' => 'WidgetController.members',
        'widget/user/{user}'    => 'WidgetController.user',
    ),
    'any'  => array()
);