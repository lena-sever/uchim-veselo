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
                'title' => 'Английский для дошкольников',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => 'http://uchim-veselo.ru/img/1.png',

			];
			$data[] = [
                'title' => 'Английский для школьников',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => 'http://uchim-veselo.ru/img/2.png',
			];
			$data[] = [
                'title' => 'Английский для взрослых',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => 'http://uchim-veselo.ru/img/3.png',
			];
			$data[] = [
                'title' => 'Программирование для школьников',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => 'http://uchim-veselo.ru/img/4.png',
			];
			$data[] = [
                'title' => 'Программирование для взрослых',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => 'http://uchim-veselo.ru/img/5.png',
			];
			$data[] = [
                'title' => 'Математика',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => 'http://uchim-veselo.ru/img/6.png',
			];
			$data[] = [
                'title' => 'Литература',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => 'http://uchim-veselo.ru/img/7.png',
			];            
			$data[] = [
                'title' => 'Разработка игр для детей',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'img' => 'http://uchim-veselo.ru/img/8.png',
			];            
            
		return $data;
	}
}
