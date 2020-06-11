<?php

use App\Exam;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $exams = Exam::all();

        foreach($exams as $exam)
        {
            foreach(range(1,5) as $index)
            {
                $exam->examQuestions()->create([
                    'question_text' => $faker->sentence(4)
                ]);
            }
        }
    }
}
