<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Enterprise;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'id' => 1,
            'cnpj' => '00000000000000', 
            'razao_social' => 'Empresa Padrão', 
            'fanstasia' => 'Empresa Padrão', 
            'email' => 'empresa@padrao.test'
        ];
        
        $enterprise = new Enterprise();
        $enterprise->fill($data);
        $enterprise->save();


        $data = [
            'name' => 'Usuário 1', 
            'email' => 'usuario@mail.com', 
            'password' => Hash::make('12345678'),
            'enterprise_id' => 1
        ];
        $user = new User();
        $user->fill($data);
        $user->save();
    }
}

$data = [
    'id' => 1,
    'cnpj' => '00000000000000', 
    'razao_social' => 'Empresa Padrão', 
    'fanstasia' => 'Empresa Padrão', 
    'email' => 'empresa@padrao.test'
];