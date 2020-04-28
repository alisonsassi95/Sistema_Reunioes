<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        DB::table('profiles')->insert([
            ['id' => 1, 'name' => 'Administrador', 'description' => 'Administrador do sistema'],
            ['id' => 2, 'name' => 'Funcionário', 'description' => 'Todos os funcionários que utilizarão o sistema.']
        ]);

        DB::table('equipaments')->insert([
            ['id' => 1, 'name' => 'Notebook', 'description' => 'Notebook Dell Modelo XX ','active' => '1'],
            ['id' => 2, 'name' => 'Projetor', 'description' => 'Projetor Epson Modelo XX ','active' => '1'],
            ['id' => 3, 'name' => 'Mouse', 'description' => 'Mouse Dell','active' => '1'],
            ['id' => 4, 'name' => 'Caixa de Som', 'description' => 'Modelo XXXX ','active' => '1'],
            ['id' => 5, 'name' => 'Tela de Projeção', 'description' => 'Modelo XX','active' => '1']
            ]);

            DB::table('room')->insert([
                ['id' => 1, 'name' => 'Notebook', 'description' => 'Notebook Dell Modelo XX ','active' => '1'],
                ['id' => 2, 'name' => 'Projetor', 'description' => 'Projetor Epson Modelo XX ','active' => '1'],
                ]);
    

        DB::table('peoples')->insert([
            ['id' => 1, 'name' => 'Administrador', 'birthdate' => '2999-01-01', 'genre' => 'M', 'cpf' => '12345677890','rg' => '1234567789', 'address' => 'Rua', 'number' => '12345',  'district' => 'Admin',  'complement' => 'Sem complemento', 'cep' => '987654321', 'state' => 'RS', 'city' => 'Ijuí', 'telephone' => '9978988765', 'email' => 'Admin@Admin.com', 'obs' => 'ele é o adin', 'profile' => '1']
            ]);
        DB::table('users')->insert(
            ['id' => 1, 'name' => 'Administrador', 'birthdate' => '2999-01-01', 'genre' => 'M', 'email' => 'Admin@Admin.com', 'user' => 'admin', 'password' => bcrypt('admin'), 'telephone' => '9978988765', 'sector' => 'TI',  'profile' => '1',  'description' => 'ele é o adiministardor' ]
           );
        /*
        DB::table('schedules')->insert([
                ['id' => 1, 'title' => 'Exame 1', 'start_date' => '2019-06-29 10:00:00','end_date' => '2019-06-29 11:00:00','note' => 'Primeira','doctor_requests_id' => '3','patients_id' => '2','equipament_id' => '1','convenant' => 'Unimed'],
                ['id' => 2, 'title' => 'Exame 2', 'start_date' => '2019-07-20 07:00:00','end_date' => '2019-07-20 12:00:00','note' => 'segunda','doctor_requests_id' => '3','patients_id' => '2','equipament_id' => '1','convenant' => 'Unimed'],
                ['id' => 3, 'title' => 'Exame de Raquel Milena da Costa', 'start_date' => '2019-08-21 07:00:00','end_date' => '2019-08-21 08:00:00','note' => 'terceira','doctor_requests_id' => '3','patients_id' => '2','equipament_id' => '2','convenant' => 'SUS'],
                ['id' => 4, 'title' => 'Exame 4', 'start_date' => '2019-08-21 08:00:00','end_date' => '2019-08-21 09:00:00','note' => 'quarta','doctor_requests_id' => '3','patients_id' => '4','equipament_id' => '5','convenant' => 'Unimed'],
                ['id' => 5, 'title' => 'Exame 5', 'start_date' => '2019-08-22 10:00:00','end_date' => '2019-08-22 11:00:00','note' => 'quinta','doctor_requests_id' => '3','patients_id' => '4','equipament_id' => '3','convenant' => 'SUS'],
                ['id' => 6, 'title' => 'Exame 6', 'start_date' => '2019-08-22 14:30:00','end_date' => '2019-08-22 15:00:00','note' => 'sexta','doctor_requests_id' => '3','patients_id' => '3','equipament_id' => '4','convenant' => 'Unimed'],
                ['id' => 7, 'title' => 'Exame 7', 'start_date' => '2019-08-22 16:00:00','end_date' => '2019-08-22 17:00:00','note' => 'setima','doctor_requests_id' => '3','patients_id' => '5','equipament_id' => '2','convenant' => 'Particular'],
                ['id' => 8, 'title' => 'Exame 8', 'start_date' => '2019-08-23 10:00:00','end_date' => '2019-08-23 11:00:00','note' => 'oitava','doctor_requests_id' => '3','patients_id' => '6','equipament_id' => '3','convenant' => 'Unimed'],
                ['id' => 9, 'title' => 'Exame 9', 'start_date' => '2019-08-23 15:00:00','end_date' => '2019-08-23 16:00:00','note' => 'decima','doctor_requests_id' => '3','patients_id' => '2','equipament_id' => '2','convenant' => 'SUS'],
                ['id' => 10, 'title' => 'Exame 10', 'start_date' => '2019-08-24 14:00:00','end_date' => '2019-08-24 15:00:00','note' => 'decimaprimeira','doctor_requests_id' => '3','patients_id' => '4','equipament_id' => '2','convenant' => 'Unimed'],
                ['id' => 11, 'title' => 'Exame 11', 'start_date' => '2019-08-25 11:00:00','end_date' => '2019-08-25 12:00:00','note' => 'decimasegunda','doctor_requests_id' => '3','patients_id' => '7','equipament_id' => '1','convenant' => 'Particular'],

        ]);*/
       
    }
}
