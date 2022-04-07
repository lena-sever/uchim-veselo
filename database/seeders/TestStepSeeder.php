<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestStepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test_steps')->insert($this->getData());
    }
    private function getData(): array
	{
		$data = [];

        $data[] = [
            'test_steps_title' => 'Проверка знания слова',
        ];
        $data[] = [
            'test_steps_title' => 'Подходящая дефиниция',
        ];
        $data[] = [
            'test_steps_title' => 'Составление предложений',
        ];  
        $data[] = [
            'test_steps_title' => 'Происходдение, инфа, написать слово',
        ];  
        
        return $data;
	}
}
