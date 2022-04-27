<?php

declare(strict_types=1);

namespace App\Http\Requests\Test\Third;

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
            'right_sentence' => ['required', 'string', 'max:1000'],
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
			'right_sentence' => 'Предложения',
		];
	}
}
