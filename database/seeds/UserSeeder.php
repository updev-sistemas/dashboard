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
                'name' => 'Administrador',
                'email' => 'dashboard@orbitautomacao.com.br',
                'password' => Hash::make('12345678'),
                'id' => 1
            ];

            $user = new User($data0);
            $user->saveOrFail();

            \Illuminate\Support\Facades\DB::commit();
            print("Usuário e Empresa registrada.");
        }
        catch (\Exception $ex) {
            \Illuminate\Support\Facades\DB::rollBack();
            print($ex->getMessage());
        }
    }
}
