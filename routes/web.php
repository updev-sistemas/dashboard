<?php

Auth::routes(['register'=>false]);

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'auth_customer']], function() {

    Route::get('/', function() {
        return "Área do Cliente";
    })->name('env_ctm');
});

Route::group(['prefix' => 'administrativo', 'middleware' => ['auth', 'auth_admin']], function() {

    Route::get('/', function() {
        return "Área do Administrador";
    })->name('env_adm');
});


Route::get('/', function() { 
    return ValidateEnv(); 
});

Route::get('/home', function() { 
    return ValidateEnv(); 
});

function ValidateEnv()
{
    if (auth()->check()) {

        $user = auth()->user();

        if ($user->isAdministratorUser()) 
        {
            return redirect()->route('env_adm');
        } 

        if ($user->isCustomerUser()) 
        {
            return redirect()->route('env_ctm');
        }

        auth()->logout();

        return redirect()->to('login');
    } else {
        return redirect()->to('login');
    }
}