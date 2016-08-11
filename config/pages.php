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

        'dns.index' => [
            'parent' => 'dashboard',
            'name'   => 'DNS'
        ],

        'dns.create' => [
            'parent' => 'dns.index',
            'name'   => 'Create Domain'
        ],

        'dns.domain' => [
            'parent' => 'dns.index',
            'name'   => 'View Domain'
        ],

        'dns.domain.record.new' => [
            'parent' => 'dns.domain',
            'name'   => 'New Record',
            'params' => ['domain'],
        ]
    ]

];