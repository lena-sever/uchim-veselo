<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class TestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test_type')->insert($this->getData());
    }
    private function getData(): array
	{
		$faker = Factory::create();
		$data = [];

		for($i=0; $i < 2; $i++) {
			$data[] = [
                'title' => $faker->sentence(mt_rand(3,10)),
                'created_at' => $faker->dateTime('now','Europe/Moscow'),
            ];
		}


		return $data;
	}
}
