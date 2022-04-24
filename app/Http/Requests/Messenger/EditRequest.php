<?php

declare(strict_types=1);

namespace App\Http\Requests\Messenger;

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
            'message' => ['required', 'string', 'max:1000'],
            'answer' => ['required', 'string', 'max:1000'],
            'email' => ['required','string','email:rfc,dns'],
            'name' => ['required', 'string'],
            'user_id' => ['integer' ],        ];
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
			'email' => 'Почта',
			'message' => 'Сообщение',
            'answer' => 'Ответ',
            'user_id' => 'Пользователь'
		];
	}
}
