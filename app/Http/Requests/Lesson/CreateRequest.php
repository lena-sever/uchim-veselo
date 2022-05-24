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
            'description' => ['required', 'string',  'min:20', 'max:255'],
            'course_id' => ['required', 'integer' ],
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
			'title' => 'Наименование главы',
			'description' => 'Описание главы',
            'course_id' => 'Комикс'
		];
	}
}
