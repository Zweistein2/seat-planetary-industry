<?php

return [
    'planetaryIndustry' => [
        'name'          => 'Planetary Industry',
        'icon'          => 'fas fa-globe-asia',
        'route_segment' => 'planetary',
        'permission'    => 'planetaryIndustry.all',
        'entries'       => [
            [
                'name'  => 'By Character',
                'icon'  => 'fas fa-user',
                'route' => 'planetaryIndustry.character',
                'permission' => 'planetaryIndustry.all',
            ],
            [
                'name'  => 'By User',
                'icon'  => 'fas fa-users',
                'route' => 'planetaryIndustry.user',
                'permission' => 'planetaryIndustry.all',
            ]
        ]
    ]
];