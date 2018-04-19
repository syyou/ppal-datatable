<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_student = Role::where('name', 'student')->first();
        $role_admin  = Role::where('name', 'admin')->first();

        $student = new User();
        $student->name = 'SYED YOU';
        $student->email = 'student@example.com';
        $student->address = 'Abc Street Student';
        $student->zipcode = '11444';
        $student->state = 'NY';
        $student->phone = '1111111111';
        $student->password = bcrypt('secret01');
        $student->consent = '1';
        $student->status = '0';
        $student->ip = \Request::ip();
        $student->save();
        $student->roles()->attach($role_student);

        $admin = new User();
        $admin->name = 'SYED ADMIN';
        $admin->email = 'admin@example.com';
        $admin->address = str_random(15);
        $admin->zipcode = '11377';
        $admin->state = str_random(2);
        $admin->phone = '222222222';
        $admin->password = bcrypt('secret02');
        $admin->consent = '0';
        $admin->status = '1';
        $admin->ip = \Request::ip();
        $admin->save();
        $admin->roles()->attach($role_admin);

    }
}
