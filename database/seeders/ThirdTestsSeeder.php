<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class ThirdTestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('third_tests')->insert($this->getData());
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
                'test_title' => 'Посмотрете происхождение слова ' . $faker->text(mt_rand(5, 20)),
                'description' => $faker->sentence(mt_rand(3, 10)),
                'questions' => 'Напишите это слово, чтобы открыть герою путь!',
                'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
            ];
        }
		return $data;
	}
}
