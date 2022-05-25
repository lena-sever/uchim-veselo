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
                'description' => 'Клим отправляется на розыски своей пропавшей подруги Софии в лес. Там он встречает там одного из самых опасных монстров в мире Сиренокубоголового. Мальчик пытается убежать от монстра, но тот настигает Клима. Жизнь мальчика висит на волоске.',
                'img' => 'https://uchim-veselo.ru/img/1.jpg',
                'author_id'=> 1,
                'painter_id'=> 1,
                'price' => 500,


			];
			$data[] = [
                'title' => 'Набег на школу',
                'description' => $faker->text(mt_rand(100, 150)),
                'img' => 'https://uchim-veselo.ru/img/2.jpg',
                'author_id'=> 1,
                'painter_id'=> 2,
                'price' => 500,


			];
			$data[] = [
                'title' => 'Взрослые проказы',
                'description' => $faker->text(mt_rand(100, 150)),
                'img' => 'https://uchim-veselo.ru/img/3.jpg',
                'author_id'=> 3,
                'painter_id'=> 1,
                'price' => 500,


			];
			$data[] = [
                'title' => 'Это не интересно',
                'description' => $faker->text(mt_rand(100, 150)),
                'img' => 'https://uchim-veselo.ru/img/4.jpg',
                'author_id'=> 4,
                'painter_id'=> 4,
                'price' => 500,


			];
			$data[] = [
                'title' => 'Забег по кругу',
                'description' => $faker->text(mt_rand(100, 150)),
                'img' => 'https://uchim-veselo.ru/img/5.jpg',
                'author_id'=> 5,
                'painter_id'=> 5,
                'price' => 500,


			];
			$data[] = [
                'title' => 'В Африке тоже весело',
                'description' => $faker->text(mt_rand(100, 150)),
                'img' => 'https://uchim-veselo.ru/img/6.jpg',
                'author_id'=> 6,
                'painter_id'=> 6,
                'price' => 500,


			];
			$data[] = [
                'title' => 'Джунгли в деревне',
                'description' => $faker->text(mt_rand(100, 150)),
                'img' => 'https://uchim-veselo.ru/img/7.jpg',
                'author_id'=> 7,
                'painter_id'=> 7,
                'price' => 500,


			];
			$data[] = [
                'title' => 'Прятки днём',
                'description' => $faker->text(mt_rand(100, 150)),
                'img' => 'https://uchim-veselo.ru/img/8.jpg',
                'author_id'=> 8,
                'painter_id'=> 8,
                'price' => 500,


			];

		return $data;
	}
}
