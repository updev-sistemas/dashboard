<?php

Auth::routes(['register'=>false]);

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', /* 'auth_customer'*/]], function() {


    Route::get('/', 'Dashboard\HomeController@index')->name('env_ctm');
});

Route::group(['prefix' => 'administrativo', 'middleware' => ['auth', 'auth_admin' ]], function() {

    Route::resource('empresas', Administrator\EnterpriseController::class);

    Route::get('empresas/{id}/usuarios', 'Administrator\EnterpriseController@userList')->name('empresas.lista_usuarios');
    Route::get('empresas/{id}/usuarios/adicionar', 'Administrator\EnterpriseController@createNewUser')->name('empresas.criar_usuario');
    Route::post('empresas/{id}/usuarios/adicionar', 'Administrator\EnterpriseController@registerNewUser')->name('empresas.registrar_usuario');

    Route::get('empresas/{id}/demonstrativos', 'Administrator\EnterpriseController@getDemonstrative')->name('empresas.demonstrativo');

    Route::get('/', 'Administrator\HomeController@index')->name('env_adm');
});


Route::get('/', function() {
    if (auth()->check()) {

        $user = \Illuminate\Support\Facades\Auth::user();

        if ($user->isAdministratorUser())
        {
            return redirect()->route('env_adm');
        }

        if ($user->isCustomerUser())
        {
            return redirect()->route('env_ctm');
        }

        \Illuminate\Support\Facades\Auth::logout();

        return redirect()->to('login');
    } else {
        return redirect()->to('login');
    }
});

Route::get('/home', function() {
    if (\Illuminate\Support\Facades\Auth::check()) {

        $user = \Illuminate\Support\Facades\Auth::user();

        if ($user->isAdministratorUser())
        {
            return redirect()->route('env_adm');
        }

        if ($user->isCustomerUser())
        {
            return redirect()->route('env_ctm');
        }

        \Illuminate\Support\Facades\Auth::logout();

        return redirect()->to('login');
    } else {
        return redirect()->to('login');
    }
});
