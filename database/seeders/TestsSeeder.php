<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tests')->insert($this->getData());
    }
    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        // $lesson_id = DB::table('lessons')->pluck('id');

        $lessons = DB::table('lessons')->get();

        foreach ($lessons as $item) {
            $data[] = [
                'lesson_id' => $item->id,
                'test_step_id' => 1,
                'test_type_id' => 1,
                'test_title' => 'Помогите герою, выберите правильне значение слова ' . $faker->text(mt_rand(5, 20)),
                'description' => $faker->text(mt_rand(10, 30)),
                'questions' => $faker->text(mt_rand(10, 30)),
                'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
            ];

           // for ($i = 0; $i < 10; $i++) {
                $data[] = [
                    'lesson_id' => $item->id,
                    'test_step_id' => 2,
                    'test_type_id' => 2,
                    'test_title' => 'Составьте предложение ' . $faker->sentence(mt_rand(3, 10)),
                    'description' => 'Нажимайте на слова так, чтобы получилось предложение',
                    'questions' => $faker->text(mt_rand(10, 30)),
                    'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
                ];
           // }

            $data[] = [
                'lesson_id' => $item->id,
                'test_step_id' => 3,
                'test_type_id' => 1,
                'test_title' => 'Посмотрете происхождение слова ' . $faker->text(mt_rand(5, 20)),
                'description' => $faker->sentence(mt_rand(3, 10)),
                'questions' => 'Напишите это слово, чтобы открыть герою путь!',
                'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
            ];

        }

        return $data;
    }
}
