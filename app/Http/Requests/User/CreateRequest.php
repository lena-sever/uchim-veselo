<?php
declare(strict_types=1);

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
			'name' => ['required', 'string', 'min:2'],
            'email' => ['required','string','email:rfc,dns'],
            'password' => ['required', 'string', 'min:7'],
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
			'email' => 'Электронная почта',
            'password' => 'Пароль',
            'photo' => 'Аватар'

		];
	}
}
