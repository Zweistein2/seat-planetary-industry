<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'  => 'Zweistein2\Seat\PlanetaryIndustry\Http\Controllers',
    'middleware' => ['web', 'auth', 'locale'],
    'prefix' => 'planetaryIndustry',
], function () {
    Route::get('/character', [
        'as'   => 'PlanetaryIndustry.character',
        'uses' => 'PlanetaryIndustryController@character',
        'middleware' => 'can:PlanetaryIndustry.all'
    ]);

    Route::get('/user', [
        'as'   => 'PlanetaryIndustry.user',
        'uses' => 'PlanetaryIndustryController@user',
        'middleware' => 'can:PlanetaryIndustry.all'
    ]);
});