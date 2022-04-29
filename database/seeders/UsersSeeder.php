<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->getData());
    }
    private function getData(): array
	{
		$faker = Factory::create();
		$data = [];
        $img = Storage::allFiles('photo_profile');


		for($i=0; $i < 10; $i++) {
			$data[] = [
                'name' => $faker->name(),
                'is_admin' => 0,
                'photo' => 'https://uchim-veselo.ru/' .$faker->randomElement($img),
                'email' => $faker->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => Hash::make($faker->text(mt_rand(10, 30))),
                'session_token' => Str::random(60),
            ];
		}

        $data[] = [
            'name' => 'Админ Вася',
            'is_admin' => 1,
            'email' => 'admin@mail.ru',
            'photo' => 'https://uchim-veselo.ru/' .$faker->randomElement($img),
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'session_token' => Str::random(60),
        ];

		return $data;
	}
}
