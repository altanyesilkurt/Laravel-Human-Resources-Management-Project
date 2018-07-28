<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $create=  App\User::firstOrCreate(['email'=>'admin@admin.com']);
        $create->name='admin';
        $create->admin='1';
        $create->password=Hash::make('password');
        $create->save();
    }
}
