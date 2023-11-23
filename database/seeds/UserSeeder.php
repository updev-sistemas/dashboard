<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Enterprise;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::beginTransaction();
        try {
            $data0 = [
                'id_type' => \App\Utils\Enumerables\UserTypeEnum::ADMIN,
                'name' => 'Usuário 1',
                'email' => 'usuario@mail.com',
                'password' => Hash::make('12345678'),
                'id' => 1
            ];
            $user = new User($data0);
            $user->saveOrFail();

            $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
            $huuid = Hash::make($uuid);

            $data1 = [
                'id' => 1,
                'cnpj' => '00000000000000',
                'razao_social' => 'Empresa Padrão',
                'fantasia' => 'Empresa Padrão',
                'email' => 'empresa@padrao.test',
                'user_id' => 1,
                'credential' => $uuid,
                'secret' => $huuid
            ];

            $enterprise = new Enterprise($data1);
            $enterprise->saveOrFail();

            \Illuminate\Support\Facades\DB::commit();
            print("Usuário e Empresa registrada.");
        }
        catch (\Exception $ex) {
            \Illuminate\Support\Facades\DB::rollBack();
            print($ex->getMessage());
        }
    }
}
