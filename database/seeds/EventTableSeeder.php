<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('events')->insert([
            [
                'title' => 'Reunião',
                'start' => '2020-06-22 21:30:00',
                'end' => '2020-06-22 21:30:00',
                'color' => '#c40233',
                'description' => 'Reunião com cliente'
            ],
            [
                'title' => 'Ligar p/ Joao',
                'start' => '2020-07-02',
                'end' => '2020-07-02',
                'color' => '#29fdf2',
                'description' => 'Falar com Joao'
            ]
        ]);
    }
}
