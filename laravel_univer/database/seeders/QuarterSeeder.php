<?php

namespace Database\Seeders;

use App\Models\Quarter;
use Illuminate\Database\Seeder;

class QuarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $subject = new Quarter();
        $subject->name = '1 тоқсан';
        $subject->date_to = '2021-09-01';
        $subject->date_from = '2021-10-30';
        $subject->save();
        $subject = new Quarter();
        $subject->name = '2 тоқсан';
        $subject->date_to = '2021-11-07';
        $subject->date_from = '2021-12-31';
        $subject->save();
        $subject = new Quarter();
        $subject->name = '3 тоқсан';
        $subject->date_to = '2022-01-14';
        $subject->date_from = '2022-03-22';
        $subject->save();
        $subject = new Quarter();
        $subject->name = '4 тоқсан';
        $subject->date_to = '2022-04-01';
        $subject->date_from = '2022-05-25';
        $subject->save();
    }
}
