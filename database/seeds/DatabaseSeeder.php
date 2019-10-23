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
        
        DB::insert('insert into grupo (nombre,estado) values (?,?)', [ 'Ambulancia',1]); 
        DB::insert('insert into grupo (nombre,estado) values (?,?)', [ 'Bombero',1]); 
        DB::insert('insert into grupo (nombre,estado) values (?,?)', [ 'Policia',1]); 
        DB::insert('insert into especialidad (nombre,grupo_id,estado) values (?,?)', [ 'Pac',1,3]); 
    }
}
