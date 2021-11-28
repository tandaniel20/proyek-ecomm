<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class promoHargaKosong implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($cBox)
    {
        //
        $this->cBox = $cBox;
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
        //
        if ($this->cBox != "null" && $value == null){
            return false;
        }else return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Harga perlu diisi!';
    }
}
