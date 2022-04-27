<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

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
            'test_title' => 'Составьте правильно предложения из имеющегося набора слов',
            'right_sentence' => 'Я шью свою одежду красной ниткой',
            'words' => json_encode(['шью','ниткой','одежду','Я','красной','свою']),
            'wrong_sentence'=>'',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' => 1,
            'test_title' => 'Составьте правильно предложения из имеющегося набора слов',
            'right_sentence' => 'Он разрезал нитку острыми ножницами',
            'words' => json_encode(['разрезал','ножницами','Он','я','нитку','острыми']),
            'wrong_sentence'=>'',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' => 1,
            'test_title' => 'Составьте правильно предложения из имеющегося набора слов',
            'right_sentence' => 'Учительница достала из сумочки катушку черных ниток',
            'words' => json_encode(['черных','Учительница','из','достала','ниток','сумочки','катушку']),
            'wrong_sentence'=>'',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' => 1,
            'test_title' => 'Составьте правильно предложения из имеющегося набора слов',
            'right_sentence' => 'На полу лежал клубок шерстяных ниток',
            'words' => json_encode(['ниток','полу','лежал','шерстяных','клубок','На']),
            'wrong_sentence'=>'',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' => 1,
            'test_title' => 'Составьте правильно предложения из имеющегося набора слов',
            'right_sentence' => 'Бабушка попросила вдеть нитку в иголку',
            'words' => json_encode(['иголку','в','Бабушку','вдеть','нитку','попросила']),
            'wrong_sentence'=>'',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' => 1,
            'test_title' => 'Составьте правильно предложения из имеющегося набора слов',
            'right_sentence' => 'На брюках торчала белая нитка',
            'words' => json_encode(['белая','На','нитка','торчала','брюках']),
            'wrong_sentence'=>'',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' =>1,
            'test_title' => 'Составьте правильно предложения из имеющегося набора слов',
            'right_sentence' => 'Я с помощью нитки и иголки зашил себе карман',
            'words' => json_encode(['себе','с','иголки','Я','помощью','карман','и','нитки','зашил']),
            'wrong_sentence'=>'',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' => 1,
            'test_title' => 'Составьте правильно предложения из имеющегося набора слов',
            'right_sentence' => 'Она пришила нитками нашивку к рюкзаку',
            'words' => json_encode(['Она','к','нашивку','пришила','рюкзаку','нитками']),
            'wrong_sentence'=>'',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' => 1,
            'test_title' => 'Составьте правильно предложения из имеющегося набора слов',
            'right_sentence' => 'Из шерстяных ниток вяжут носки и свитера',
            'words' => json_encode(['вяжут','и','шерстяных','из','свитера','носки','ниток']),
            'wrong_sentence'=>'',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];
        $data[] = [
            'course_id' => 1,
            'test_title' => 'Составьте правильно предложения из имеющегося набора слов',
            'right_sentence' => 'Ткань обычно делается из ниток',
            'words' => json_encode(['делается','обычно','из','Ткань','ниток']),
            'wrong_sentence'=>'',
            'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
        ];

        foreach($courses as $item){
            $data[] = [
                'course_id' => $item->id,
                'test_title' => 'Составьте правильно предложения из имеющегося набора слов',
                'right_sentence' => $faker->sentence(mt_rand(3, 10)),
                'words' => json_encode($faker->randomElement(
                         [$faker->words($nb = 5, $asText = false)])),
                'wrong_sentence' => '',
                'created_at' => $faker->dateTime('now', 'Europe/Moscow'),
            ];
        }
		return $data;
	}
}

