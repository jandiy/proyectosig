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
        // $this->call(UsersTableSeeder::class);
        \App\User::insert([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password' => Hash::make('123123')
        ]);
        
        DB::insert('insert into grupo (nombre) values (?)', [ 'Ambulancia']); 
        DB::insert('insert into grupo (nombre) values (?)', [ 'Bombero']); 
        DB::insert('insert into grupo (nombre) values (?)', [ 'Policia']); 
    }
}
