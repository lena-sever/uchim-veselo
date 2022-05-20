<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('course_reviews')->insert($this->getData());
    }
    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];

        $user_id = DB::table('users')->pluck('id');
        // $course_id = DB::table('courses')->pluck('id');
        $courses = DB::table('courses')->get();

        foreach ($courses as $item) {
            for ($i = 1; $i < 3; $i++) {
                $data[] = [
                    'text' => 'Отзыв  ' . $i . '. к комиксу: ' . $item->title,
                    'publish' => 0,
                    'user_id' => $faker->randomElement($user_id),
                    'course_id' => $item->id,
                    'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
                ];
            }
        }

        return $data;
    }
}
