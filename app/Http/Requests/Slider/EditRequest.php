<?php

declare(strict_types=1);

namespace App\Http\Requests\Slider;

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

            'text' => ['required', 'string', 'max:1000'],
            'img' => ['required', 'file', 'image'],
            'music' => ['required', 'file',],
            'lesson_id' => ['required' ],
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
			'text' => 'Текст',
			'img' => 'Изображение',
            'music' => 'Аудио файл',
            'lesson_id' => 'Глава'
		];
	}
}
