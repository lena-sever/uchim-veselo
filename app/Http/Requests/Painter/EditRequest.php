<?php

declare(strict_types=1);

namespace App\Http\Requests\Painter;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
			'name' => ['required', 'string', 'min:2'],
            'photo' => ['nullable', 'file', 'image']
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
			'name' => 'Ваше Имя',
            'photo' => 'Аватар'
		];
	}
}
