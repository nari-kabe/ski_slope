<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SkiAreaRequest extends FormRequest
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
            'ski_area.place_name' => 'required|string|max:40',
            'ski_area.zip_code' => 'required|string|max:8',
            'ski_area.prefecture' => 'required|string|max:3',
            'ski_area.city' => 'required|string|max:30',
            'ski_area.after_address' => 'required|string|max:50',
            'ski_area.home_page' => 'nullable|url',
            'ski_area.phone_number' => 'required|string|max:60',
            'ski_area.business_hours' => 'required|string',
            'ski_area.evening_hours' => 'nullable|string|max:30',
            'ski_area.season' => 'nullable|string',
            'ski_area.lesson' => 'nullable|string',
            'ski_area.restaurant' => 'nullable|string',
            'ski_area.spa' => 'nullable|string',
            'ski_area.hotel' => 'nullable|string',
            // 'ski_area.slope_map' => 'required|string',  画像入力にしたいから、一旦保留
            
            //追加分
            'ski_area.parking_lot' => 'nullable|string',
            'ski_area.activity' => 'nullable|string',
            'ski_area.kids_park' => 'nullable|string',
            'ski_area.lift_ticket' => 'nullable|string',
        ];
    }
}
