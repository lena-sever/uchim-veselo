<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        DB::table('test_types')->insert($this->getData());
    }
    private function getData(): array
	{
		$data = [];

			$data[] = [
                'test_type_title' => 'радио',
            ];
			$data[] = [
                'test_type_title' => 'последовательность',
            ];

			$data[] = [
                'test_type_title' => 'текстовое поле (точно ввести текст)',
            ];            
            
		return $data;
	}
}
