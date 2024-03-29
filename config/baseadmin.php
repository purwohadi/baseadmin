<?php
/**
 * Created by PhpStorm.
 * Author: Elena Kolevska
 * Date: 5/8/18
 * Time: 15:21
 */
use App\Role;

return [
    'navbar_top' => [
        'search_form' => [
            'show' => true,
            'post_url' => '/search'
        ],
        'notifications' => [
            'show' => false,
        ],
    ],
    'left_menu' => [
        [
            'name' => 'dashboard',
            'label' => 'Dashboard',
            'url' => '/',
            'icon' => 'fa fa-dashboard'
        ],
        [
            'name' => 'users',
            'label' => 'Users',
            'url' => '/users',
            'icon' => 'fa fa-group',
            'allowed_role_ids' => [Role::SUPER_ADMIN_ID]
        ],
        [
            'name' => 'has-children',
            'label' => 'Example with children',
            'url' => '#',
            'icon' => 'fa fa-dashboard',
            'children' => [
                [
                    'name' => 'child1',
                    'label' => 'Child menu 1',
                    'url' => '/'
                ],
                [
                    'name' => 'child2',
                    'label' => 'Child menu 2',
                    'url' => '/'
                ],
            ]
        ]
    ],
    'user_registration' => [
        'preaproved_users_only' => true,
        'preaproved_users_only_error_message' => 'This email address doesn\'t exist in our system. Please contact our admins to be added {admin email address}'
    ]
];