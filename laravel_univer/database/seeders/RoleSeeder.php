<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $teacher = new Role();
        $teacher->name = 'Мұғалім';
        $teacher->slug = 'teacher';
        $teacher->save();
        $admin = new Role();
        $admin->name = 'Администратор';
        $admin->slug = 'admin';
        $admin->save();
        $student = new Role();
        $student->name = 'Оқушы';
        $student->slug = 'student';
        $student->save();
    }
}
