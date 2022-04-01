<?php
declare(strict_types=1);

namespace App\Http\Requests\Lesson;

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

			'title' => ['required', 'string', 'min:5'],
            'description' => ['required', 'string', 'max:1000'],
            'text' => ['required', 'string'],
            'course_id' => ['required' ],
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
			'title' => 'Наименование урока',
			'description' => 'Описание урока',
            'text' => 'Задания урока',
            'course_id' => 'Курс'
		];
	}
}
