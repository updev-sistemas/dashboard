<?php

namespace App\Http\Controllers;

use App\Enterprise;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class AuthApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function changePassword($key, Request $request)
    {
        try
        {
            $secret = decrypt($key);
            if ($secret == 'bi.api.orbitautomacao') {

                $user = User::query()->where('email','=', $request->get('email'))->firstOrFail();
                if ($user == null) {
                    throw new \Exception("Não foi possível alterar os dados.");
                }

                $newPassword = $request->get('password');
                if ($newPassword == null || empty($newPassword)) {
                    throw new \Exception("Senha inválida.");
                }

                $user->password = Hash::make($newPassword);
                $user->update();

                return response(['data' => 'Success', 'errors' => []], 200);
            }
            else
            {
                return response(['data' => 'Error', 'errors' => []], 200);
            }
        }
        catch (\Exception $e)
        {
            logger($e->getMessage());
            return response(['data' => 'Error', 'errors' => []], 200);
        }
    }


    public function registerAuth($key, Request $request)
    {
        DB::beginTransaction();
        try
        {
            $secret = decrypt($key);
            if ($secret == 'bi.api.orbitautomacao')
            {
                $dataUser = $request->get('cliente');
                $pass =  $dataUser['pass'] ?? '12345678';
                $dataToNewUser = [
                    'id_type' => \App\Utils\Enumerables\UserTypeEnum::CUSTOMER,
                    'name' => $dataUser['nome'] ?? '',
                    'email' => $dataUser['email'] ?? '',
                    'password' => Hash::make($pass)
                ];

                $email = $dataUser['email'] ?? null;
                if ($email == null || empty($email))
                {
                    throw new \Exception("Não foi possível alterar os dados.");
                }

                $user = User::query()->where('email','=',$email)->first();
                if ($user == null) {
                    $user = new User($dataToNewUser);
                    $user->saveOrFail();
                }
                else {
                    $user->update();
                }

                $dataStores = $request->get('lojas');
                $errors = [];
                foreach ($dataStores as $key => $store)
                {
                    try {
                        $enterprise = Enterprise::query()->where('cnpj', '=', $store['ie'])->first();

                        if ($enterprise == null) {
                            $data = [
                                'user_id' => $user->id,
                                'cnpj' => $store['ie'],
                                'razao_social' => $store['nome'],
                                'fantasia' => $store['nome'],
                                'email' => "{$store['ie']}@bi.orbitautomacao.com.br",
                                'uuid' => Uuid::uuid4()->toString()
                            ];
                            $enterprise = new Enterprise($data);
                            $enterprise->save();
                        } else {
                            if ($enterprise->user_id != $user->id) {
                                throw new \Exception("Empresa {$store['ie']} já está registrada com um outro cliente.");
                            }

                            $data = [
                                'cnpj' => $store['ie'],
                                'razao_social' => $store['nome'],
                                'fantasia' => $store['nome'],
                                'email' => "{$store['ie']}@bi.orbitautomacao.com.br",
                            ];

                            $enterprise->fill($data);
                            $enterprise->update();
                        }
                    }
                    catch (\Exception $e) {
                        array_push($errors, $e->getMessage());
                    }
                }

                DB::commit();
                return response(['data' => count($errors) == 0 ? 'Success' : 'Warn', 'errors' => $errors], 200);
            }
            else
            {
                return response(['data' => 'Error', 'errors' => []], 200);
            }
        }
        catch (\Exception $e)
        {
            DB::rollBack();
            logger($e->getMessage());
            return response(['data' => 'Error', 'errors' => []], 200);
        }
    }
}
