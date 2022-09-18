<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PrefectureRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^(東京都|北海道|(京都|大阪)府|.{2,3}県)$/u', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '都道府県名が正しくありません';
    }
}
