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
            'right_sentence_1' => 'Я шью свою одежду красной ниткой',
            'right_sentence_2'=>'Я свою одежду шью красной ниткой',
            'right_sentence_3'=>'Я красной ниткой шью свою одежду',
            'words' =>'шью|ниткой|одежду|Я|красной|свою',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
/*       $data[] = [
            'course_id' => 1,
            'right_sentence_1' => 'Он разрезал нитку острыми ножницами',
            'right_sentence_2'=>'Он острыми ножницами разрезал нитку',
            'right_sentence_3'=>'',
            'words' =>'разрезал|ножницами|Он|нитку|острыми',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' => 1,
            'right_sentence_1' => 'Учительница достала из сумочки катушку черных ниток',
            'right_sentence_2'=>'Учительница достала катушку черных ниток из сумочки',
            'right_sentence_3'=>'',
            'words' =>'черных|Учительница|из|достала|ниток|сумочки|катушку',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' => 1,
            'right_sentence_1' => 'На полу лежал клубок шерстяных ниток',
            'right_sentence_2'=>'',
            'right_sentence_3'=>'',
            'words' =>'ниток|полу|лежал|шерстяных|клубок|На',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' => 1,
            'right_sentence_1' => 'Бабушка попросила вдеть нитку в иголку',
            'right_sentence_2'=>'',
            'right_sentence_3'=>'',
            'words' =>'иголку|в|Бабушка|вдеть|нитку|попросила',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' => 1,
            'right_sentence_1' => 'На брюках торчала белая нитка',
            'right_sentence_2'=>'',
            'right_sentence_3'=>'',
            'words' =>'белая|На|нитка|торчала|брюках',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];*/
        $data[] = [
            'course_id' =>1,
            'right_sentence_1' => 'Я с помощью нитки и иголки зашил себе карман',
            'right_sentence_2'=>'Я с помощью иголки и нитки зашил себе карман',
            'right_sentence_3'=>'Я зашил себе карман с помощью иголки и нитки',
            'words' =>'себе|с|иголки|Я|помощью|карман|и|нитки|зашил',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
  /*      $data[] = [
            'course_id' => 1,
            'right_sentence_1' => 'Она пришила нитками нашивку к рюкзаку',
            'right_sentence_2'=>'',
            'right_sentence_3'=>'',
            'words' =>'Она|к|нашивку|пришила|рюкзаку|нитками',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' => 1,
            'right_sentence_1' => 'Из шерстяных ниток вяжут носки и свитера',
            'right_sentence_2'=>'Из шерстяных ниток вяжут свитера и носки',
            'right_sentence_3'=>'',
            'words' =>'вяжут|и|шерстяных|Из|свитера|носки|ниток',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];*/
        $data[] = [
            'course_id' => 1,
            'right_sentence_1' => 'Ткань обычно делается из ниток',
            'right_sentence_2'=>'Ткань делается обычно из ниток',
            'right_sentence_3'=>'',
            'words' =>'делается|обычно|из|Ткань|ниток',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];

        foreach($courses as $item){
            if ($item->id == 1) continue;
            $data[] = [
                'course_id' => $item->id,
                'right_sentence_1' => 'Слово_1 слово_2',
                'right_sentence_2'=>'Cлово_2 cлово_1',
                'right_sentence_3'=>'cлово_1 Cлово_2',
                'words' => 'слово_2|Слово_1',
                'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
            ];
        }
		return $data;
	}
}

