<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FileExtValidation implements Rule
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
        $allowed = ['csv','xlsx','pdf'];
        return (in_array($value->getClientOriginalExtension(),$allowed))?$value:'';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'File needs to be xlsx, pdf or csv.';
    }
}
