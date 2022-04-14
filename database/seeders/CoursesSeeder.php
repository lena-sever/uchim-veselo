<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesSeeder extends Seeder
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

			$data[] = [
                'title' => 'Приключение в лесу',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => '/img/1.jpg',

			];
			$data[] = [
                'title' => 'Набег на школу',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => '/img/2.jpg',
			];
			$data[] = [
                'title' => 'Взрослые проказы',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => '/img/3.jpg',
			];
			$data[] = [
                'title' => 'Это не интересно',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => '/img/4.png',
			];
			$data[] = [
                'title' => 'Забег по кругу',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => '/img/5.jpg',
			];
			$data[] = [
                'title' => 'В Африке тоже весело',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => '/img/6.png',
			];
			$data[] = [
                'title' => 'Джунгли в деревне',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => '/img/7.jpg',
			];            
			$data[] = [
                'title' => 'Прятки днём',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => '/img/8.jpg',
			];            
            
		return $data;
	}
}
