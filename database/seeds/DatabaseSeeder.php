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
        values (?,?,?,?,?,?,?,?,?,?,?)', [ 'Fabio','/img/ayudante/1569209704_img_msanoja_20160801-194152_imagenes_lv_getty.jpg','Pedraza','fabio@gmail.com','123123','MASCULINO','1992-01-13',3442635,65823789,-17.71593257522612,-63.16063868318972]); 
        DB::insert('insert into usuario_movil (nombre,foto,apellido,correo,contrasena,genero,fecha_nacimiento,celular,contacto_emergencia,latitud,longitud) 
        values (?,?,?,?,?,?,?,?,?,?,?)', [ 'Angelica','/img/ayudante/1569209704_img_msanoja_20160801-194152_imagenes_lv_getty.jpg','Cruz','angelica@gmail.com','123123','FEMENINO','1991-01-13',3225896,63923859,-17.742284, -63.145331]); 
        DB::insert('insert into ayudante (usuario_id,fecha_registro,estado) values (?,?,?)', [ 2,'2019-02-15',1]);  
        DB::insert('insert into ubicacion (longitud,latitud,ayudante_id) values (?,?,?)', [ 0,0,2]);  
        
        DB::insert('insert into estudiante (usuario_id,carrera,fecha_registro,facultad,estado) values (?,?,?,?,?)', [ 1,'Ingenieria en Sistemas','2019-01-15','Ciencias de computacion',1]);  
        DB::insert('insert into emergencia (tipo,latitud,longitud,estado,estudiante_id) values (?,?,?,?,?)', [ 'Policia',-17.756630, -63.155717,1,1]); 
        DB::insert('insert into trabajo (hora,fecha,latituda,longituda,estado,emergencia_id,user_id) values (?,?,?,?,?,?,?)', [ '13:00:59','2019-02-23',-17.742284,-63.145331,1,1,1]); 
        DB::insert('insert into detalle_especialidad (ayudante_id,estado,especialidad_id) values (?,?,?)', [ 2,1,1]); 
        DB::insert('insert into detalle_trabajo (nombre,estado,fecha,hora,trabajo_id,dtespecialidad_id) values (?,?,?,?,?,?)', [ 'ejecutando',1,'2019-02-23','13:00:59',1,1]); 
    
        DB::insert('insert into emergencia (tipo,latitud,longitud,estado,estudiante_id) values (?,?,?,?,?)', [ 'Policia',-17.758556, -63.156285,1,1]); 
        DB::insert('insert into trabajo (hora,fecha,latituda,longituda,estado,emergencia_id,user_id) values (?,?,?,?,?,?,?)', [ '14:00:59','2019-02-22',-17.742284,-63.145331,1,2,1]); 
        DB::insert('insert into detalle_trabajo (nombre,estado,fecha,hora,trabajo_id,dtespecialidad_id) values (?,?,?,?,?,?)', [ 'finalizado',1,'2019-02-22','14:00:59',2,1]); 
    
        DB::insert('insert into emergencia (tipo,latitud,longitud,estado,estudiante_id) values (?,?,?,?,?)', [ 'Policia',-17.758556, -63.156285,1,1]); 
        DB::insert('insert into trabajo (hora,fecha,latituda,longituda,estado,emergencia_id,user_id) values (?,?,?,?,?,?,?)', [ '15:00:59','2019-03-22',-17.742284,-63.145331,1,3,1]); 
        DB::insert('insert into detalle_trabajo (nombre,estado,fecha,hora,trabajo_id,dtespecialidad_id) values (?,?,?,?,?,?)', [ 'finalizado',1,'2019-03-22','14:00:59',3,1]); 
    
    }
}
