<?php

return array(
    // Route Type: pathinfo, map or symfony
    'type' => 'symfony',
    // Route Configure
    // any, get, post...
    'get'  => array(
        '' => 'HomeController.index'
    ),
    'any'  => array(
        'widget/user/information/{user}'         => 'WidgetController.userInformation',
        'widget/organization/members/{user}'     => 'WidgetController.organizationMembers',
        'widget/organization/information/{user}' => 'WidgetController.organizationInformation',
        'widget/organization/events/{user}'      => 'WidgetController.organizationEvents'
    )
);