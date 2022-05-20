<?php
declare(strict_types=1);

namespace App\Http\Requests\UserCourse;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
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
