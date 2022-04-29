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

        $courses = DB::table('courses')->get();

        $data[] = [
            'course_id' => 1,
            'test_title' => 'Нажимайте на слова так, чтобы получилось предложение',
            'sentence' => 'Нитка - это тонка длинная веревочка, с помощью которой делали ткань, шили одежду.',
            'right_answer' => json_encode(['тонкая','веревочка','ткань','одежду']),
            'wrong_answer' =>json_encode(['широкая','змея','помидоры','автомобиль']),
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];


        foreach ($courses as $item) {
            if ($item->id == 1) continue;
            $data[] = [
                'course_id' => $item->id,
                'test_title' => 'Нажимайте на слова так, чтобы получилось предложение ',
                'sentence' => $faker->sentence($ndWords=6,$variableNbWords = true),
                'right_answer' => json_encode($faker->randomElement([
                    $faker->words($nb = 5, $asText = false)])),
                'wrong_answer' =>json_encode($faker->randomElement([
                    $faker->words($nb = 5, $asText = false)])),
                'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
            ];
    }
        return $data;
	}
}
