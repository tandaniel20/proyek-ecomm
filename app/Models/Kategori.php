<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "kategori";
    protected $primaryKey = "id";

    public function buku(){
        return $this->belongsToMany(Buku::class, "buku_kategori", "id_kategori", "id_buku");
    }
}
