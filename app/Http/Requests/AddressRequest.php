<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            "user_id" => "required|numeric",
            "city" => "required|min:3",
            "district" => "required|min:3",
            "zipcode" => "required|numeric",
            "address"=> "required|min:20",
        ];
    }

    public function messages()
    {
        return[
            "user_id.required" => "Bu alan boş geçilemez!",
            "user_id.numeric" => "Bu alan sayısal değerlerden oluşmalıdır.",
            "city.required" => "Bu alan boş geçilemez!",
            "city.min"=>"Bu alan minimum 3 karakterden oluşmalıdır.",
            "district.required" => "Bu alan boş geçilemez!",
            "district.min"=>"Bu alan minimum 3 karakterden oluşmalıdır.",
            "zipcode.required" => "Bu alan boş geçilemez!",
            "zipcode.numeric" => "Bu alan sayısal değerlerden oluşmalıdır.",
            "address.required" => "Bu alan boş geçilemez!",
            "address.min" => "Bu alan minimum 20 karakterden oluşmalıdır."
        ];
    }
}
