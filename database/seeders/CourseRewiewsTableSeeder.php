<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseRewiewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_rewiews')->insert($this->getData());
    }
    private function getData(): array
	{
		$faker = Factory::create();
		$data = [];
        $user_id = DB::table('users')->pluck('id');
        $course_id = DB::table('courses')->pluck('id');

		for($i=0; $i < 15; $i++) {
			$data[] = [
                'course_id' => $faker->randomElement($course_id),
                'user_id' => $faker->randomElement($user_id),
				'text' => $faker->text(mt_rand(10, 30)),
                'created_at' => $faker->dateTime('now','Europe/Moscow'),
			];
		}


		return $data;
	}
}
