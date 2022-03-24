<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert($this->getData());
    }
    private function getData(): array
	{
		$faker = Factory::create();
		$data = [];

		for($i=0; $i < 15; $i++) {
			$data[] = [
                'title' => $faker->sentence(mt_rand(3,10)),
                'description' => $faker->text(mt_rand(10, 30)),
                'created_at' => $faker->dateTime('now','Europe/Moscow'),
			];
		}


		return $data;
	}
}
