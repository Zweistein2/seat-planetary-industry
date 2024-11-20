<?php

return [
    'planetaryIndustry' => [
        'name'          => 'Planetary Industry',
        'icon'          => 'fas fa-globe-asia',
        'route_segment' => 'planetary',
        'permission'    => 'PlanetaryIndustry.all',
        'entries'       => [
            [
                'name'  => 'By Character',
                'icon'  => 'fas fa-user',
                'route' => 'PlanetaryIndustry.character',
                'permission' => 'PlanetaryIndustry.all',
            ],
            [
                'name'  => 'By User',
                'icon'  => 'fas fa-users',
                'route' => 'PlanetaryIndustry.user',
                'permission' => 'PlanetaryIndustry.all',
            ]
        ]
    ]
];