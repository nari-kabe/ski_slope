<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     
     /*
    public function authorize()
    {
        return false;
    }
    */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'profile.age' => 'nullable|integer|max:100',
            'profile.occupation' => 'nullable|string|max:20',
            'profile.activity' => 'nullable|string|max:20', //ここどうなの？
            'profile.experience' => 'nullable|integer|max:100',
            'profile.level' => 'nullable|url',
            'profile.home_slope' => 'nullable|string|max:60',
            'profile.greeting' => 'nullable|string|max:300',
        ];
    }
}
