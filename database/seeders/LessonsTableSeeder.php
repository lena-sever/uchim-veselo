<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lessons')->insert($this->getData());
    }
    private function getData(): array
	{
		$faker = Factory::create();
		$data = [];
        $test_id = DB::table('tests')->pluck('id');
        $course_id = DB::table('courses')->pluck('id');

		for($i=0; $i < 15; $i++) {
			$data[] = [
                'course_id' => $faker->randomElement($course_id),//$faker->numberBetween(1,10),
                'test_id' => $faker->randomElement($test_id),//$faker->numberBetween(1,10),
                'title' => $faker->sentence(mt_rand(3,10)),
                'description' => $faker->text(mt_rand(10, 30)),
                'created_at' => $faker->dateTime('now','Europe/Moscow'),
            ];
		}


		return $data;
	}
}
