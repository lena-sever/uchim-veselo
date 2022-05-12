<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        //$img = Storage::allFiles('test_img');
        $courses = DB::table('courses')->get();

        $data[] = [
            'course_id' => 1,
            'img' => '/test_img/1-1.jpg',
            'author' => 'Админ',
            'word' => 'Нитки',
            'answer_1' => 'это длинное изделие из металла',
            'answer_2' => 'это плетёное орудие лова, используемое для добычи рыбы в большом количестве',
            'answer_3' => 'это верёвочка, через которую прыгают, вертя её и перекидывая через голову',
            'answer_4'=> 'это тонкий и гибкий шнур',
            'answer_5'=> 'это длинные, тонко скрученные волокна, предназначенные для изготовления тканей, шитья, вязания',
            'right_answer' => 'answer_5',
            'description' => 'Существительное «нить» — славянское по происхождению и означает «тонко скрученную прядь, используемую для шитья и прочего». Слово закрепилось в лексике русского языка в XI в.',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        foreach ($courses as $item) {
            if ($item->id == 1) continue;
            $data[] = [
                'course_id' => $item->id,
                'img'=>'/test_img/1-1.jpg',
                'author' => 'Админ',
                'word' => $faker->text(mt_rand(5, 10)),
                'answer_1' => $faker->text(mt_rand(10, 20)),
                'answer_2' => $faker->text(mt_rand(10, 20)),
                'answer_3' => $faker->text(mt_rand(10, 20)),
                'answer_4'=> $faker->text(mt_rand(10, 20)),
                'answer_5'=> $faker->text(mt_rand(10, 20)),
                'right_answer' => $faker->randomElement(['answer_1','answer_2','answer_3','answer_4','answer_5']),
                'description' => $faker->text(mt_rand(10, 30)),
                'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
            ];

        }

        return $data;
    }
}
