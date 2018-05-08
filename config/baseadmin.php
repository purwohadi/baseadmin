<?php
/**
 * Created by PhpStorm.
 * Author: Elena Kolevska
 * Date: 5/8/18
 * Time: 15:21
 */

return [
    'left_menu' => [
        [
            'name' => 'dashboard',
            'label' => 'Dashboard',
            'url' => url('/')
        ],
        [
            'name' => 'example-link',
            'label' => 'Example link',
            'url' => url('/home')
        ],
        [
            'name' => 'has-children',
            'label' => 'Example with children',
            'url' => '#',
            'children' => [
                [
                    'name' => 'child1',
                    'label' => 'Child menu 1',
                    'url' => url('/')
                ],
                [
                    'name' => 'child2',
                    'label' => 'Child menu 2',
                    'url' => url('/')
                ],
            ]
        ]
    ]
];