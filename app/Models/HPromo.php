<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HPromo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "h_promo";
    protected $primaryKey = "id";

    public function buku(){
        return $this->belongsToMany(Buku::class, "d_promo", "id_promo", "id_buku")->withPivot("harga_promo");
    }
}
