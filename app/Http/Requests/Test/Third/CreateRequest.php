<?php
declare(strict_types=1);

namespace App\Http\Requests\Test\Third;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'right_sentence_1' => ['required', 'string', 'max:1000'],
            'right_sentence_2' => ['max:1000'],
            'right_sentence_3' => ['max:1000'],
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
			'right_sentence_1' => 'Предложения',
			'right_sentence_2' => 'Вариант 1',
			'right_sentence_3' => 'Вариант 2',
		];
	}

}
