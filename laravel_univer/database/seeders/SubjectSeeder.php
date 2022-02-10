<?php

namespace Database\Seeders;

use App\Models\Subjects;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $subject = new Subjects();
        $subject->name = 'matem';
        $subject->save();
        $subject = new Subjects();
        $subject->name = 'kazakh';
        $subject->save();
        $subject = new Subjects();
        $subject->name = 'russia';
        $subject->save();
        $subject = new Subjects();
        $subject->name = 'history';
        $subject->save();
    }
}
