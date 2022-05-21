<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeeder::class,
            AuthorsSeeder::class,
            PaintersSeeder::class,
            CoursesSeeder::class,
            CourseReviewsSeeder::class,
            LessonsSeeder::class,
            FirstTestsSeeder::class,
            SecondTestsSeeder::class,
            ThirdTestsSeeder::class,
            SlidersSeeder::class,
            UserCoursesSeeder::class
        ]);
    }
}
