<?php

namespace App\Rules;

use App\Models\Buku;
use Illuminate\Contracts\Validation\Rule;

class promoHargaKelebihan implements Rule
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
        $this->harga = 0;
        if ($cBox != "null"){
            $buku = Buku::find($this->cBox);
            $this->harga = $buku["harga"];
        }
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
        if ($this->cBox == "null") return true;
        else{
            $buku = Buku::find($this->cBox);
            if ($value != null){
                if ($buku["harga"] <= $value){
                    return false;
                }else return true;
            }
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Harga promo tidak boleh melebihi '.$this->harga;
    }
}
