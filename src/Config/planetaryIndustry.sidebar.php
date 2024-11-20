<?php

return [
    'planetaryIndustry' => [
        'name'          => 'Planetary Industry',
        'icon'          => 'fas fa-earth-asia',
        'route_segment' => 'planetary',
        'permission'    => 'planetaryIndustry.all',
        'entries'       => [
            [
                'name'  => 'By Character',
                'icon'  => 'fas fa-user',
                'route' => 'PlanetaryIndustry.character',
                'permission' => 'planetaryIndustry.all',
            ],
            [
                'name'  => 'By User',
                'icon'  => 'fas fa-users',
                'route' => 'PlanetaryIndustry.user',
                'permission' => 'planetaryIndustry.all',
            ]
        ]
    ]
];