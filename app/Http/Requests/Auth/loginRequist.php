<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class loginRequist extends FormRequest
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
            "email"=> "required|email",
            "password"=> "required",
        ];
    }
    public function update(updateRequist $updaterequest) 
{
    $user=User::where('id',$updaterequest->id)->first();
        $user->update([
            "name"=> $updaterequest->name,
            "email"=> $updaterequest->email,
            "password"=> bcrypt($updaterequest->password),
        ]);
    }
}
