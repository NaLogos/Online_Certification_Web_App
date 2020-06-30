<?php

use App\Tag;
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

        $tag1 = Tag::create([
            'name' => 'Web Development'
        ]);

        $tag2 = Tag::create([
            'name' => 'Data Science'
        ]);

        $tag3 = Tag::create([
            'name' => 'Front-End'
        ]);

        $tag4 = Tag::create([
            'name' => 'Back-End'
        ]);

        $tag5 = Tag::create([
            'name' => 'Data Warehouse'
        ]);

        foreach($categories as $category)
        {
            foreach(range(1,5) as $index)
            {
                $exam = $category->categoryExams()->create([
                    'title' => $faker->sentence(3),
                    'description' => $faker->text(20),
                    'image' => 'storage/exams/'.$index.'.png'
                ]);

                $exam->tags()->attach([$tag1->id,$tag2->id,$tag3->id]);
            }
        }


    }
}
