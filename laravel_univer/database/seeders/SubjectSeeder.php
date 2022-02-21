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
        $subject->name = 'Математика';
        $subject->save();
        $subject = new Subjects();
        $subject->name = 'Қазақ тілі';
        $subject->save();
        $subject = new Subjects();
        $subject->name = 'Орыс тілі';
        $subject->save();
        $subject = new Subjects();
        $subject->name = 'Қазақстан тарихы';
        $subject->save();
    }
}
