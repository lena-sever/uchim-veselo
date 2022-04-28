<?php
declare(strict_types=1);

namespace App\Http\Requests\Review;

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
            'text' => ['required', 'string'],
            'course_id' => ['required', 'integer' ],
            'user_id' => ['required', 'integer' ],
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
            'text' => 'Ваш Отзыв',
            'course_id' => 'Комикс',
            'user_id' => 'Пользователь'
		];
	}
}
