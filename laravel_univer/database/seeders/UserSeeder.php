<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('slug','admin')->first();
        $teacher = Role::where('slug', 'teacher')->first();
        $student = Role::where('slug', 'student')->first();
        $user1 = new User();
        $user1->name = 'Jhon Deo';
        $user1->email = 'jhon@deo.com';
        $user1->password = bcrypt('123456');
        $user1->save();
        $user1->roles()->attach($admin);
        $user2 = new User();
        $user2->name = 'Mike Thomas';
        $user2->email = 'mike@thomas.com';
        $user2->password = bcrypt('123456');
        $user2->save();
        $user2->roles()->attach($teacher);
        $user3 = new User();
        $user3->name = 'Jo Jo';
        $user3->email = 'jo@jo.com';
        $user3->password = bcrypt('123456');
        $user3->save();
        $user3->roles()->attach($student);
    }
}
