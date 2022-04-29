<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Illuminate\Support\Facades\Storage;

class SecondTestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('second_tests')->insert($this->getData());
    }
    private function getData(): array
	{
        $faker = Factory::create();
        $data = [];

        $img = Storage::allFiles('test_img');

        $courses = DB::table('courses')->get();

        $data[] = [
            'course_id' => 1,
            'test_title' => 'Нажимайте на слова так, чтобы получилось предложение',
            'img' => $img[0],
            'part_sentence_1' => 'Нитка - это',
            'right_word_1' => 'тонкая',
            'wrong_word_1' =>'широкая',
            'part_sentence_2'=> 'длинная,',
            'right_word_2' => 'веревочка',
            'wrong_word_2' =>'змея',
            'part_sentence_3'=>'с помощью которой делали',
            'right_word_3' =>'ткань',
            'wrong_word_3' =>'помидоры',
            'part_sentence_4'=>', шили',
            'right_word_4' =>'одежду',
            'wrong_word_4' =>'автомобиль',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];


        foreach ($courses as $item) {
            if ($item->id == 1) continue;
            $data[] = [
                'course_id' => $item->id,
                'test_title' => 'Нажимайте на слова так, чтобы получилось предложение ',
                'img'=>$img[$item->id],
                'part_sentence_1' => $faker->sentence($ndWords=3,$variableNbWords = true),
                'right_word_1' => $faker->word(),
                'wrong_word_1' =>$faker->word(),
                'part_sentence_2'=> $faker->sentence($ndWords=2,$variableNbWords = true),
                'right_word_2' => $faker->word(),
                'wrong_word_2' =>$faker->word(),
                'part_sentence_3'=>$faker->sentence($ndWords=3,$variableNbWords = true),
                'right_word_3' =>$faker->word(),
                'wrong_word_3' =>$faker->word(),
                'part_sentence_4'=>$faker->sentence($ndWords=2,$variableNbWords = true),
                'right_word_4' =>$faker->word(),
                'wrong_word_4' =>$faker->word(),
                'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
            ];
    }
        return $data;
	}
}
