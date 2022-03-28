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
                'back_img' => 'https://im0-tub-ru.yandex.net/i?id=ef0ba8ba5db2aea909c79e1f4c13e901-l&ref=rim&n=13&w=640&h=640',
                'img' => 'prod2.jpg'

			];
			$data[] = [
                'title' => 'Английский для школьников',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'back_img' => 'https://yt3.ggpht.com/a/AATXAJwIPqE1M38ePrPTEnHhFd8epyR4U3eChpF36A=s900-c-k-c0xffffffff-no-rj-mo',
                'img' => 'prod3.png'
			];
			$data[] = [
                'title' => 'Английский для взрослых',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'back_img' => 'https://lh4.googleusercontent.com/proxy/RVUOkvu5ECmtUFNEfOS5k6HE7LV0Q2c-EVylLK1pS_fN8sNt8VupvgvUzt28-uoforeESyFh3CgxachdPkJwzVA-yg=w1200-h630-p-k-no-nu',
                'img' => 'prod4.jpg'
			];
			$data[] = [
                'title' => 'Программирование для школьников',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'back_img' => 'https://i.pinimg.com/originals/fa/7e/6e/fa7e6e04b27bb2cfb7670a24eb743be9.jpg',
                'img' => 'prod4.png'
			];
			$data[] = [
                'title' => 'Программирование для взрослых',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'back_img' => 'https://2d-cdr.ru/image/data/photo/40083_kompyutershhik_114.jpg',
                'img' => 'prod5.jpg'
			];
			$data[] = [
                'title' => 'Математика',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'back_img' => 'https://thumbs.dreamstime.com/b/%D0%BC%D0%B8-%D1%8B%D0%B9-%D0%BC%D0%B0-%D1%8C%D1%87%D0%B8%D0%BA-%D1%81-%D0%BA%D0%BD%D0%B8%D0%B3%D0%B0%D0%BC%D0%B8-49419719.jpg',
                'img' => 'prod5.png'
			];
			$data[] = [
                'title' => 'Литература',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'back_img' => 'https://eos.hmtpk.ru/pluginfile.php/20583/course/overviewfiles/kniga_2.jpg',
                'img' => 'prod6.jpg'
			];            
			$data[] = [
                'title' => 'Разработка игр для детей',
                'description' => $faker->text(mt_rand(100, 150)),
                'text' => $faker->text(mt_rand(300, 500)),
                'back_img' => 'https://avatars.mds.yandex.net/i?id=2a0000017a02947ecb73028e49e43b81cafe-4613717-images-thumbs&n=13&exp=1',
                'img' => 'product_photo6.png'
			];            
            
		return $data;
	}
}
