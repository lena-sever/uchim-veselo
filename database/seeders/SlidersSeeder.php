<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SlidersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert($this->getData());
    }
    private function getData(): array
	{
		$faker = Factory::create();
		$data = [];

        $lessons = DB::table('lessons')->get();
        $img = Storage::allFiles('slider\img');
        $music = Storage::allFiles('slider\music');

        foreach ($lessons as $i => $item) {
            $data[] = [
                'lesson_id' => $item->id,
                'img' => '/'.$img[$i],
                'music' =>'/'.$music[$i],
                'text' => $faker->text(mt_rand(10, 30)),
                'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
            ];
        }

		return $data;
	}
}
