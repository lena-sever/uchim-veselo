<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Laravolt\Avatar\Avatar;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        //$img = Storage::allFiles('test_img');
        $avatar = new Avatar(config("laravolt.avatar"));

        $data[] = [
            'name' => 'Елена Сыроватская',
            'photo' => $avatar->create('Елена Сыроватская')->setDimension(85, 85)->toSvg(),
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        for ($i=1;$i<=8;$i++) {
            if ($i == 1) continue;
            $data[] = [
                'name' => $faker->name(),
                'photo'=>$avatar->create($faker->name())->setDimension(85, 85)->toSvg(),
                'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
            ];

        }

        return $data;
    }
}
