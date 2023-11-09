<?php

namespace App\Http\Requests\partners;

use Illuminate\Foundation\Http\FormRequest;

class createrequist extends FormRequest
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
            "img_path"=> "required",
            "describtion"=> "required",
            "visit_our_website"=> "required",
            "view_company_profile"=> "required",
            "facebook_link"=> "required",
            "whatsApp_link"=> "required",
            "viber_link"=> "required",
            "instagram_link"=> "required",
        ];
    }
}
