<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserCoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('user_courses')->insert($this->getData());
    }
    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];

        $user_id = DB::table('users')->pluck('id');
        $courses = DB::table('courses')->get();
        $price = DB::table('courses')->value('price');

        foreach ($courses as $item) {
                $data[] = [
                    'price' => $price,
                    'user_id' => $faker->randomElement($user_id),
                    'course_id' => $item->id,
                    'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
                    'payment' => 1,
                    'like' => 0
                ];
        }
        foreach ($courses as $item) {
            $data[] = [
                'price' => $price,
                'user_id' => $faker->randomElement($user_id),
                'course_id' => $item->id,
                'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
                'payment' => 0,
                'like' => 1
            ];
    }
    foreach ($courses as $item) {
        $data[] = [
            'price' => $price,
            'user_id' => $faker->randomElement($user_id),
            'course_id' => $item->id,
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
            'payment' => 1,
            'like' => 1
        ];
}

        return $data;
    }
}
