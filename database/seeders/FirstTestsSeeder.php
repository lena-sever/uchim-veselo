<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FirstTestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('first_tests')->insert($this->getData());
    }
    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];

        $courses = DB::table('courses')->get();

        $data[] = [
            'course_id' => 1,
            'test_title' => 'Помогите герою, выберите правильне значение слова',
            'word' => 'Нитки',
            'answer_1' => 'это длинное изделие из металла',
            'answer_2' => 'это плетёное орудие лова, используемое для добычи рыбы в большом количестве',
            'answer_3' => 'это верёвочка, через которую прыгают, вертя её и перекидывая через голову',
            'answer_4'=> 'это тонкий и гибкий шнур',
            'answer_5'=> 'это длинные, тонко скрученные волокна, предназначенные для изготовления тканей, шитья, вязания',
            'right_answer' => 5,
            'description' => $faker->text(mt_rand(40, 200)),
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        foreach ($courses as $item) {
            if ($item->id == 1) continue;
            $data[] = [
                'course_id' => $item->id,
                'test_title' => 'Помогите герою, выберите правильное значение слова ',
                'word' => $faker->text(mt_rand(5, 10)),
                'answer_1' => $faker->text(mt_rand(10, 20)),
                'answer_2' => $faker->text(mt_rand(10, 20)),
                'answer_3' => $faker->text(mt_rand(10, 20)),
                'answer_4'=> $faker->text(mt_rand(10, 20)),
                'answer_5'=> $faker->text(mt_rand(10, 20)),
                'right_answer' => mt_rand(1, 5),
                'description' => $faker->text(mt_rand(40, 200)),
                'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
            ];

        }

        return $data;
    }
}
