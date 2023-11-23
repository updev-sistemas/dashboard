<?php

Auth::routes(['register'=>false]);

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth', 'auth_customer']], function() {

    Route::get('/empresa/{id}/visao_geral','Dashboard\DemonstrativeController@showDashboardView')->name('view_enterprise');
    Route::get('/empresa/{id}/contas_a_pagar','Dashboard\DemonstrativeController@showContasPagarView')->name('view_enterprise_cpv');
    Route::get('/empresa/{id}/contas_a_receber','Dashboard\DemonstrativeController@showContasReceberView')->name('view_enterprise_arv');
    Route::get('/empresa/{id}/caixas_abertos','Dashboard\DemonstrativeController@showCaixasAbertosView')->name('view_enterprise_cxa');
    Route::get('/empresa/{id}/minhas_vendas','Dashboard\DemonstrativeController@showMinhasVendasView')->name('view_enterprise_vds');
    Route::get('/empresa/{id}/vendedores','Dashboard\DemonstrativeController@showVendedoresView')->name('view_enterprise_vdd');

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
