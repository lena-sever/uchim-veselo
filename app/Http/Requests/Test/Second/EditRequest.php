<?php

declare(strict_types=1);

namespace App\Http\Requests\Test\Second;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'course_id' => ['required','int'],
			'test_title' => ['required', 'string', 'min:5'],
            'sentence' => ['required', 'string', 'max:1000'],
            'right_answer'=> ['required', 'string'],
            'wrong_answer'=> ['required', 'string'],
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
            'course_id' => 'История',
			'test_title' => 'Наименование теста',
			'sentence' => 'Предложение',
            'right_answer'=> 'Правильные слова',
            'wrong_answer'=> 'Не правильные слова',
		];
	}
}
