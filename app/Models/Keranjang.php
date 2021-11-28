<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = "keranjang";
    protected $primaryKey = "id";
    public $timestamps = false;
    public $incrementing = true;

    public function User(){
        return $this->belongsTo(User::class, "id_user", "id");
    }

    public function Buku(){
        return $this->belongsTo(Buku::class, "id_buku", "id");
    }
}
