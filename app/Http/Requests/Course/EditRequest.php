<?php

declare(strict_types=1);

namespace App\Http\Requests\Course;

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
			'title' => ['required', 'string', 'min:5'],
            'description' => ['required', 'string',  'min:20', 'max:255'],
            'text' =>['required', 'string', 'min:20'],
            'img' => ['nullable', 'file', 'image'],

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
			'title' => 'Наименование комикса',
			'description' => 'Краткое описание комикса',
            'text' => 'Полное описание комикса'
		];
	}
}
