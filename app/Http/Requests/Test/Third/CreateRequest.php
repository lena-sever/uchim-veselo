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
            'right_sentence' => ['required', 'string', 'max:1000'],
            'variant_1' => ['max:1000'],
            'variant_2' => ['max:1000'],
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
			'right_sentence' => 'Предложения',
			'variant_1' => 'Вариант 1',
			'variant_2' => 'Вариант 2',
		];
	}

}
