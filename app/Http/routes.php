<?php


Route::get('/',[
    'uses' => 'DashboardController@dashboard',
    'as' => 'dashboard',
]);
