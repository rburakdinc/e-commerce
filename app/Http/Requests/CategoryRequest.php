<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CategoryRequest extends FormRequest
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
            "name" => "required",
            "slug" => "required|unique:App\Models\Category,slug",
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Bu alan boş geçilemez!",
            "slug.required" => "Bu alan boş geçilemez!",
            "slug.unique" => "Bu kısa ad daha önceden alınmış."
        ];
    }

    protected function passedValidation()
    {
        if (!$this->request->has("slug")) {
            $name = $this->request->get("name");
            $slug = Str::of($name)->slug();
            $this->request->set("slug", $slug);
        }
    }

}
