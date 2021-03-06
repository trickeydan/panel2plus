<?php


Route::group(['middleware' => ['auth']],function(){
    Route::get('/',[
        'uses' => 'DashboardController@dashboard',
        'as' => 'dashboard',
    ]);

    Route::group(['namespace' => 'Settings','prefix' => 'settings'],function (){

        Route::get('/',[
            'uses' => 'SettingsController@index',
            'as' => 'settings.index',
        ]);

        Route::get('update',[
            'uses' => 'ProfileController@form',
            'as' => 'settings.update',
        ]);

        Route::put('update',[
            'uses' => 'ProfileController@post',
            'as' => 'settings.update.post',
        ]);

        Route::get('changepassword',[
            'uses' => 'PasswordController@form',
            'as' => 'settings.changepassword',
        ]);

        Route::post('changepassword',[
            'uses' => 'PasswordController@post',
            'as' => 'settings.changepassword.post',
        ]);



    });
    Route::group(['namespace' => 'DNS','prefix' => 'dns','middleware' => ['check:hasDNS']],function (){
        Route::get('/',[
            'uses' => 'DomainController@index',
            'as' => 'dns.index',
        ]);

        Route::get('add',[
            'uses' => 'DomainController@create',
            'as' => 'dns.create',
        ]);

        Route::post('add',[
            'uses' => 'DomainController@createPost',
            'as' => 'dns.create',
        ]);

        Route::get('{domain}',[
            'uses' => 'DomainController@domain',
            'as' => 'dns.domain',
        ]);

        Route::get('{domain}/delete',[
            'uses' => 'DomainController@domainDelete',
            'as' => 'dns.domain.delete',
        ]);

        Route::get('{domain}/new',[
            'uses' => 'RecordController@newRecord',
            'as' => 'dns.domain.record.new',
        ]);

        Route::post('{domain}/new',[
            'uses' => 'RecordController@newRecordPost',
            'as' => 'dns.domain.record.new.post',
        ]);

        Route::get('{domain}/{record}/delete',[
            'uses' => 'RecordController@delete',
            'as' => 'dns.domain.record.delete',
        ]);
    });






});

Route::group(['namespace' => 'Auth'],function (){
    Route::get('logout',[
        'uses' => 'AuthController@logout',
        'as'    => 'auth.logout',
    ]);

    Route::get('login',[
        'uses' => 'AuthController@showLoginForm',
        'as'    => 'auth.login',
    ]);

    Route::post('login',[
        'uses' => 'AuthController@login',
        'as'    => 'auth.loginPost',
    ]);
});


// Registration Routes...
//$this->get('register', 'Auth\AuthController@showRegistrationForm');
//$this->post('register', 'Auth\AuthController@register');

// Password Reset Routes...
//$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
//$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
//$this->post('password/reset', 'Auth\PasswordController@reset');
