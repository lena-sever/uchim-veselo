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
        // $lesson_id = DB::table('lessons')->pluck('id');

        $lessons = DB::table('lessons')->get();

        $data[] = [
            'lesson_id' => 1,
            'test_title' => 'Помогите герою, выберите правильне значение слова',
            'word' => 'Нитки',
            'answer_1' => 'это длинное изделие из металла',
            'answer_2' => 'это плетёное орудие лова, используемое для добычи рыбы в большом количестве',
            'answer_3' => 'это верёвочка, через которую прыгают, вертя её и перекидывая через голову',
            'answer_4'=> 'это тонкий и гибкий шнур',
            'answer_5'=> 'это длинные, тонко скрученные волокна, предназначенные для изготовления тканей, шитья, вязания',
            'right_answer' => 'это длинные, тонко скрученные волокна, предназначенные для изготовления тканей, шитья, вязания',
            'description' => 'Существительное «нить» — славянское по происхождению и означает «тонко скрученную прядь, используемую для шитья и прочего». Слово закрепилось в лексике русского языка в XI в.',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        foreach ($lessons as $item) {
            $data[] = [
                'lesson_id' => $item->id,
                'test_title' => 'Помогите герою, выберите правильне значение слова ' . $faker->text(mt_rand(5, 20)),
                'word' => $faker->text(mt_rand(5, 10)),
                'answer_1' => $faker->text(mt_rand(10, 20)),
                'answer_2' => $faker->text(mt_rand(10, 20)),
                'answer_3' => $faker->text(mt_rand(10, 20)),
                'answer_4'=> $faker->text(mt_rand(10, 20)),
                'answer_5'=> $faker->text(mt_rand(10, 20)),
                'right_answer' => $faker->text(mt_rand(10, 20)),
                'description' => $faker->text(mt_rand(10, 20)),
                'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
            ];

        }

        return $data;
    }
}
