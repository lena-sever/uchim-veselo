<?php

declare(strict_types=1);

namespace App\Http\Requests\Test\First;

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
            'course_id' => ['required', 'integer'],
            'img' => ['nullable', 'file', 'image'],
            'word' => ['required', 'string', 'min:5'],
            'answer_1' => ['required', 'string', 'max:1000'],
            'answer_2' => ['required', 'string', 'max:1000'],
            'answer_3' => ['required', 'string', 'max:1000'],
            'answer_4' => ['required', 'string', 'max:1000'],
            'answer_5' => ['required', 'string', 'max:1000'],
            'right_answer' => ['required', 'string', 'max:1000'],
            'description' => ['required', 'string', 'max:1000']
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
            'course_id' => 'Комикс',
            'word' => 'Слово',
            'answer_1' => 'Вопрос №1',
            'answer_2' => 'Вопрос №2',
            'answer_3' => 'Вопрос №3',
            'answer_4' => 'Вопрос №4',
            'answer_5' => 'Вопрос №5',
            'right_answer' => 'Правильный вопрос',
            'description' => 'Описание слова'
		];
	}
}
