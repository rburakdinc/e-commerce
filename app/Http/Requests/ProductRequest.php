<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "category_id" => "required|numeric",
            "name"=>"required",
            "price" =>"required|numeric",
            "old_price" =>"required|sometimes|numeric",
            "lead" =>"required|min:10",
        ];
    }

    public function messages()
    {
       return[
           "category_id.required"=>"Bu alan boş geçilemez!",
           "category_id.numeric"=>"Bu alan sayısal değerlerden oluşmalıdır.",
           "name.required"=>"Bu alan boş geçilemez!",
           "price.required"=>"Bu alan boş geçilemez!",
           "price.numeric"=>"Bu alan sayısal değerlerden oluşmalıdır.",
           "old_price.required"=>"Bu alan boş geçilemez!",
           "old_price.numeric"=>"Bu alan sayısal değerlerden oluşmalıdır.",
           "lead.required"=>"Bu alan boş geçilemez!",
           "lead.min"=>"Bu alan minimum 6 karakterden oluşmalıdır."
       ];
    }
}
