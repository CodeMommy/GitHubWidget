<?php

return array(
    // Route Type: pathinfo, map or symfony
    'type' => 'symfony',
    // Route Configure
    // any, get, post...
    'get'  => array(
        '' => 'HomeController.index',
        'widget/members/{user}' => 'WidgetController.members',
    ),
    'any'  => array()
);