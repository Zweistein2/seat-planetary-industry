<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'  => 'Zweistein2\Seat\PlanetaryIndustry\Http\Controllers',
    'middleware' => ['web', 'auth', 'locale'],
    'prefix' => 'planetaryIndustry',
], function () {
    Route::get('/character')
        ->name('planetaryIndustry.character')
        ->uses('PlanetaryIndustryController@getCharacter')
        ->middleware('can:planetaryIndustry.all');

    Route::get('/user')
        ->name('planetaryIndustry.user')
        ->uses('PlanetaryIndustryController@getUser')
        ->middleware('can:planetaryIndustry.all');
});