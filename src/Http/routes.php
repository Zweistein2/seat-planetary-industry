<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'  => 'Zweistein2\Seat\PlanetaryIndustry\Http\Controllers',
    'middleware' => ['web', 'auth', 'locale'],
    'prefix' => 'planetaryIndustry',
], function () {
    Route::get('/character')
        ->name('PlanetaryIndustry.character')
        ->uses('PlanetaryIndustryController@getCharacter')
        ->middleware('can:PlanetaryIndustry.all');

    Route::get('/user')
        ->name('PlanetaryIndustry.user')
        ->uses('PlanetaryIndustryController@getUser')
        ->middleware('can:PlanetaryIndustry.all');
});