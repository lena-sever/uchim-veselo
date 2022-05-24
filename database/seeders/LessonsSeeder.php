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
        $data[] = [

            'title' => 'Первая встреча с монстром',
            'description' => $faker->text(mt_rand(10, 30)),

            'course_id' => 1,
            'created_at' => $faker->dateTime('now','Europe/Moscow'),
        ];

        foreach ($courses as $item) {
            for($i=1; $i < 4; $i++) {
                if ($item->id == 1 AND $i == 1) continue;
                $data[] = [
                    'title' => 'Глава '.$i.'. комиксы: '.$item->title,
                    'description' => $faker->text(mt_rand(10, 30)),

                    'course_id' => $item->id,
                    'created_at' => $faker->dateTime('now','Europe/Moscow'),
                ];
            }
        }

		return $data;
	}
}
