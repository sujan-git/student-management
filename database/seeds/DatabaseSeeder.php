<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*$array = array(         
            array(
                'name'=>'admin',
                //'adress'=>'Bharatpur',
                'email'=>'admin@school.com',
                'role'=>'admin',
                'password'=>Hash::make('school123'),
                'phone'=>'9845612577'
            ),
            array(
                'name'=>'teacher1',
                'email'=>'teacher@school.com',
                'role'=>'teacher',
                'password'=>Hash::make('teacher123'),
                'phone'=>'9845612577'
            )
        );*/

        Model::unguard();

        $this->call('UserSeeder');
        $this->call('AcademicclassSeeder');
        $this->call('BusRouteSeeder');
        $this->call('SubjectSeeder');
        $this->call('ClassSubjectSeeder');
    }
}
