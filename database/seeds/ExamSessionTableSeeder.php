<?php

use App\User;
use Illuminate\Database\Seeder;

class ExamSessionTableSeeder extends Seeder
{
    public function run()
    {
        Exam::findOrFail(1)->sessions()->sync(1);
        Exam::findOrFail(2)->roles()->sync(2);
        Exam::findOrFail(3)->roles()->sync(3);
    }
}
