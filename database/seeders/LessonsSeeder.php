<?php

namespace Database\Seeders;

use App\Models\Course;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonsSeeder extends Seeder
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
        // $course_id = DB::table('courses')->pluck('id');
        $courses = DB::table('courses')->get();

        foreach ($courses as $item) {
            for($i=1; $i < 5; $i++) {
                $data[] = [

                    'title' => 'Глава '.$i.'. истории: '.$item->title,
                    'description' => $faker->text(mt_rand(10, 30)),
                    'text' => $faker->text(mt_rand(350, 550)),
                    'course_id' => $item->id,
                    'created_at' => $faker->dateTime('now','Europe/Moscow'),
                ];
            }
        }

		// for($i=0; $i < 15; $i++) {
		// 	$data[] = [
        //         'title' => $faker->sentence(mt_rand(3,10)),
        //         'description' => $faker->text(mt_rand(10, 30)),
        //         'text' => $faker->text(mt_rand(350, 550)),
        //         'course_id' => $faker->randomElement($course_id),
        //         'created_at' => $faker->dateTime('now','Europe/Moscow'),
        //     ];
		// }


		return $data;
	}
}
