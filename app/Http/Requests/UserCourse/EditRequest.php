<?php

declare(strict_types=1);

namespace App\Http\Requests\UserCourse;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
			'user_id' => ['required', 'integer'],
            'course_id' => ['required','integer'],
            'price' => ['required'],
        ];
    }

	public function messages(): array
	{
		return [
			'required' => 'Необходимо заполнить поле :attribute.'
		];
	}

	public function  attributes(): array
	{
		return [
			'user_id' => 'Имя',
			'course_id' => 'Курс',
            'price' => 'Стоимость',

		];
	}
}
