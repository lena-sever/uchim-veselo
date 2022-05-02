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
            'img' => ['nullable', 'file', 'image'],
            'part_sentence_1' => ['required','string'],
            'part_sentence_2' => ['required','string'],
            'part_sentence_3' => ['required','string'],
            'part_sentence_4' => ['required','string'],
            'right_word_1'=> ['required', 'string'],
            'right_word_2'=> ['required', 'string'],
            'right_word_3'=> ['required', 'string'],
            'right_word_4'=> ['required', 'string'],
            'wrong_word_1'=> ['required', 'string'],
            'wrong_word_2'=> ['required', 'string'],
            'wrong_word_3'=> ['required', 'string'],
            'wrong_word_4'=> ['required', 'string'],
            'etymology'=> ['required', 'string'],
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
			'test_title' => 'Наименование теста',
            'part_sentence_1' => 'Часть предложения №1',
            'part_sentence_2' => 'Часть предложения №2',
            'part_sentence_3' => 'Часть предложения №3',
            'part_sentence_4' => 'Часть предложения №4',
            'right_word_1'=> 'Правильное слово №1',
            'right_word_2'=> 'Правильное слово №2',
            'right_word_3'=> 'Правильное слово №3',
            'right_word_4'=> 'Правильное слово №4',
            'wrong_word_1'=> 'Не правильное слово №1',
            'wrong_word_2'=> 'Не правильное слово №2',
            'wrong_word_3'=> 'Не правильное слово №3',
            'wrong_word_4'=> 'Не правильное слово №4',
            'etymology'=> 'Происхождение слова',
		];
	}
}
