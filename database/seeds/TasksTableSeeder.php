<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'task_name' => 'work',
            'start_date' => '2018-08-01',
            'end_date' =>'2018-08-01',
            'hour'=>'03:00:00',
        ]);
    }
}
