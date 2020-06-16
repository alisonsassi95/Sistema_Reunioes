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
                ['id' => 1, 'name' => 'Sala 1', 'description' => 'Sala de reunioes no 5 piso','active' => '1'],
                ['id' => 2, 'name' => 'Sala 2', 'description' => 'Sala de reunioes no 5 piso','active' => '1'],
                ['id' => 3, 'name' => 'Sala 3', 'description' => 'Sala de reunioes no 5 piso','active' => '1'],
                ['id' => 4, 'name' => 'Sala 4', 'description' => 'Sala de reunioes no 5 piso','active' => '1'],
                ]);

        DB::table('users')->insert([
            ['id' => 1, 'name' => 'Administrador', 'birthdate' => '1996-01-01', 'genre' => 'M', 'email' => 'Admin@Admin.com',    'user' => 'admin',     'password' => bcrypt('admin'),     'telephone' => '9978988765', 'sector' => 'TI',                'profile_id' => '1',  'description' => 'ele é o adiministardor' ],
            ['id' => 2, 'name' => 'Adriano',       'birthdate' => '1990-10-01', 'genre' => 'M', 'email' => 'Adriano@Admin.com',  'user' => 'Adriano',   'password' => bcrypt('Adriano'),   'telephone' => '9978956232', 'sector' => 'Relacionamento',    'profile_id' => '2',  'description' => 'Entrou recentemente' ],
            ['id' => 3, 'name' => 'Luis',          'birthdate' => '1997-08-06', 'genre' => 'M', 'email' => 'Luis@Admin.com',     'user' => 'Luis',      'password' => bcrypt('Luis'),      'telephone' => '9978111765', 'sector' => 'TI',                'profile_id' => '2',  'description' => ''],
            ['id' => 4, 'name' => 'Bruna',         'birthdate' => '1980-07-25', 'genre' => 'F', 'email' => 'Bruna@Admin.com',    'user' => 'Bruna',     'password' => bcrypt('Bruna'),     'telephone' => '9978989999', 'sector' => 'TI',                'profile_id' => '2',  'description' => ''],
            ['id' => 5, 'name' => 'Jaqueline',     'birthdate' => '1995-02-12', 'genre' => 'F', 'email' => 'Jaqueline@Admin.com','user' => 'Jaqueline', 'password' => bcrypt('Jaqueline'), 'telephone' => '9978988567', 'sector' => 'Administração',     'profile_id' => '2',  'description' => ''],
            ['id' => 6, 'name' => 'Joao',          'birthdate' => '1986-02-12', 'genre' => 'M', 'email' => 'Joao@Admin.com',     'user' => 'Joao',      'password' => bcrypt('Joao'),      'telephone' => '9978944465', 'sector' => 'Relacionamento',    'profile_id' => '2',  'description' => ''],
        ]);
    }
}
