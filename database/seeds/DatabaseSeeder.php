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
        DB::insert('insert into especialidad (nombre,estado,grupo_id) values (?,?,?)', [ 'Pac',1,3]); 
//para prueba
        DB::insert('insert into usuario_movil (nombre,foto,apellido,correo,contrasena,genero,fecha_nacimiento,celular,contacto_emergencia,latitud,longitud) 
        values (?,?,?,?,?,?,?,?,?,?,?)', [ 'Fabio','1569209704_img_msanoja_20160801-194152_imagenes_lv_getty.jpg','Pedraza','fabio@gmail.com','123123','MASCULINO','1992-01-13',3442635,65823789,-17.71593257522612,-63.16063868318972]); 
        DB::insert('insert into usuario_movil (nombre,foto,apellido,correo,contrasena,genero,fecha_nacimiento,celular,contacto_emergencia,latitud,longitud) 
        values (?,?,?,?,?,?,?,?,?,?,?)', [ 'Angelica','1569209704_img_msanoja_20160801-194152_imagenes_lv_getty.jpg','Cruz','angelica@gmail.com','123123','FEMENINO','1991-01-13',3225896,63923859,-17.742284, -63.145331]); 
         
    }
}
