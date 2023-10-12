<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductImageRequest extends FormRequest
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
            "product_id" => "required|numeric",
            "image_url" => "required|image|mimes:jpg,jpeg,png|sometimes"
        ];
    }

    public function messages()
    {
        return [
            "product_id.required" => "Bu alan boş geçilemez!",
            "product_id.numeric" => "Bu alan sayısal değerlerden oluşmalıdır.",
            "image_url.required" => "Bu alan boş geçilemez!",
            "image_url.mimes"=> "Sadece jpg,jpeg,png uzantılı dosyalar yüklenebilir!"
        ];
    }
}
