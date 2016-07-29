<?php

return [
    'details' => [
        // Format : 'route' => 'parent'
        'dashboard' => [
            'parent' => 'top',
            'name'   => 'Dashboard',
        ],
        'settings.index' => [
            'parent' => 'dashboard',
            'name'   => 'Settings',
        ],
        'settings.update' => [
            'parent' => 'settings.index',
            'name'   => 'Update Details',
        ],
        'settings.changepassword' => [
            'parent' => 'settings.index',
            'name'   => 'Change Password',
        ],
    ]

];