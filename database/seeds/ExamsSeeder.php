<?php

use App\Category;
use Illuminate\Database\Seeder;

class ExamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $categories = Category::all();

        foreach($categories as $category)
        {
            foreach(range(1,5) as $index)
            {
                $category->categoryExams()->create([
                    'title' => $faker->sentence(3),
                    'description' => $faker->text(20),
                    'image' => 'storage/exams/'.$index.'.png'
                ]);
            }
        }


    }
}
