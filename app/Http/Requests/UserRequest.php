<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $user_id = $this->request->get("user_id");
        return [
            "name" => "required|min:6",
            "email" => "required|email|unique:App\Models\User,email,$user_id",
            "password" => "required|sometimes|string|min:6"
        ];
    }

    public function messages()
    {
        return[
            "name.required" => "Bu alan boş geçilemez!",
            "name.min" => "Bu alan minimum 6 karakterden oluşmalıdır.",
            "email.required" => "Bu alan boş geçilemez!",
            "email.email" => "Girilen değer e-mail formatında olmalıdır.",
            "email.unique" => "Girdiğiniz e-mail başka kullanıcı tarafından kullanılmaktadır.",
            "password.required" => "Bu alan boş geçilemez!",
            "password.min" => "Bu alan minimum 6 karakterden oluşmalıdır."
        ];
    }
}
