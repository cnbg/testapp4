<?php

namespace App\Http\Requests;

use App\Rules\E164PhoneNumber;
use App\Rules\LatinCharacter;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstName'   => ["required", "min:2", "max:32", new LatinCharacter],
            'lastName'    => ["required", "min:2", "max:32", new LatinCharacter],
            'email'       => ["required", "email", Rule::unique('clients', 'email')->ignore($this->client)],
            'phoneNumber' => ["required", new E164PhoneNumber, Rule::unique('clients', 'phoneNumber')->ignore($this->client)],
        ];
    }
}
