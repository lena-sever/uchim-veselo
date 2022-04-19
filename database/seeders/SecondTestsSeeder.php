<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

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
        // $lesson_id = DB::table('lessons')->pluck('id');

        $lessons = DB::table('lessons')->get();

        foreach ($lessons as $item) {
            $data[] = [
                'lesson_id' => $item->id,
                'test_title' => 'Составьте предложение ' . $faker->sentence(mt_rand(3, 10)),
                'description' => 'Нажимайте на слова так, чтобы получилось предложение',
                'questions' => $faker->text(mt_rand(10, 30)),
                'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
            ];
    }
        return $data;
	}
}
