<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'user'=>'required|string|unique:usuarios,user|max:255',
            'password'=>'required|string|min:8|confirmed',
            'telefono'=>'required|string|size:9|unique:usuarios,telefono',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required'=>'El nombre es obligatorio.',
            'user.required'=>'El nombre de usuario es obligatorio.',
            'password.required'=>'La contraseña es obligatoria.',
            'telefono.required'=>'El telefono es obligatorio.',
            'telefono.size'=>'El telefono debe contener exsactemente nueve caracteres.',
            'user.unique'=>'El nombre de usuario ya esta en uso.',
            'telefono.unique'=>'Este umero de telefono ya esta registrado.',
            'password.confirmed'=>'Las contraseñas no coinciden',

        ];
    }
}
