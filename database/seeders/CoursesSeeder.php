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
                'img' => 'https://uchim-veselo.ru/img/1.jpg',
                'author_id'=> 1,
                'painter_id'=> 1,

			];
			$data[] = [
                'title' => 'Набег на школу',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => 'https://uchim-veselo.ru/img/2.jpg',
                'author_id'=> 2,
                'painter_id'=> 2,
			];
			$data[] = [
                'title' => 'Взрослые проказы',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => 'https://uchim-veselo.ru/img/3.jpg',
                'author_id'=> 3,
                'painter_id'=> 3,
			];
			$data[] = [
                'title' => 'Это не интересно',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => 'https://uchim-veselo.ru/img/4.png',
                'author_id'=> 4,
                'painter_id'=> 4,
			];
			$data[] = [
                'title' => 'Забег по кругу',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => 'https://uchim-veselo.ru/img/5.jpg',
                'author_id'=> 5,
                'painter_id'=> 5,
			];
			$data[] = [
                'title' => 'В Африке тоже весело',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => 'https://uchim-veselo.ru/img/6.png',
                'author_id'=> 6,
                'painter_id'=> 6,
			];
			$data[] = [
                'title' => 'Джунгли в деревне',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => 'https://uchim-veselo.ru/img/7.jpg',
                'author_id'=> 7,
                'painter_id'=> 7,
			];
			$data[] = [
                'title' => 'Прятки днём',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => 'https://uchim-veselo.ru/img/8.jpg',
                'author_id'=> 8,
                'painter_id'=> 8,
			];

		return $data;
	}
}
