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
        $lesson_id = DB::table('lessons')->pluck('id');

		for($i=0; $i < 15; $i++) {
			$data[] = [
                'title' => $faker->sentence(mt_rand(3,10)),
                'description' => $faker->text(mt_rand(50, 150)),
                'questions' => $faker->text(mt_rand(300, 500)),
                'lesson_id' => $faker->randomElement($lesson_id),
                'created_at' => $faker->dateTime('now','Europe/Moscow'),
            ];
		}


		return $data;
	}
}
