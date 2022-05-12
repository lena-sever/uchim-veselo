<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Illuminate\Support\Facades\Storage;

class ThirdTestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('third_tests')->insert($this->getData());
    }
    private function getData(): array
	{
        $faker = Factory::create();
        $data = [];
        $courses = DB::table('courses')->get();

        $data[] = [
            'course_id' => 1,
            'right_sentence' => 'Я шью свою одежду красной ниткой',
            'words' =>'шью|ниткой|одежду|Я|красной|свою',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' => 1,
            'right_sentence' => 'Он разрезал нитку острыми ножницами',
            'words' =>'разрезал|ножницами|Он|нитку|острыми',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' => 1,
            'right_sentence' => 'Учительница достала из сумочки катушку черных ниток',
            'words' =>'черных|Учительница|из|достала|ниток|сумочки|катушку',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' => 1,
            'right_sentence' => 'На полу лежал клубок шерстяных ниток',
            'words' =>'ниток|полу|лежал|шерстяных|клубок|На',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' => 1,
            'right_sentence' => 'Бабушка попросила вдеть нитку в иголку',
            'words' =>'иголку|в|Бабушка|вдеть|нитку|попросила',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' => 1,
            'right_sentence' => 'На брюках торчала белая нитка',
            'words' =>'белая|На|нитка|торчала|брюках',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' =>1,
            'right_sentence' => 'Я с помощью нитки и иголки зашил себе карман',
            'words' =>'себе|с|иголки|Я|помощью|карман|и|нитки|зашил',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' => 1,
            'right_sentence' => 'Она пришила нитками нашивку к рюкзаку',
            'words' =>'Она|к|нашивку|пришила|рюкзаку|нитками',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' => 1,
            'right_sentence' => 'Из шерстяных ниток вяжут носки и свитера',
            'words' =>'вяжут|и|шерстяных|Из|свитера|носки|ниток',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' => 1,
            'right_sentence' => 'Ткань обычно делается из ниток',
            'words' =>'делается|обычно|из|Ткань|ниток',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];

        foreach($courses as $item){
            if ($item->id == 1) continue;
            $data[] = [
                'course_id' => $item->id,
                'right_sentence' => 'Слово_1 слово_2',
                'words' => 'слово_2|Слово_1',
                'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
            ];
        }
		return $data;
	}
}

