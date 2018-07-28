<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'İPERA',
            'address' => 'esenler',
            'phone' =>'1234567674',
            'email'=>'ipera@gmail.com',
            'logo' => 'C:\Users\NCS\blog\public\app\public\logos\1528842778.png',
            'website' => 'www.ipera.com',
        ]);
        DB::table('departments')->insert([
            'name' => 'Administration',
            'company_id' => '1',
        ]);
        DB::table('branches')->insert([
            'name' => 'Centre',
            'company_id' => '1',
            'address'=>'esenler'
        ]);
        DB::table('titles')->insert([
            'name' => 'Team Leader',
        ]);
    }
}
