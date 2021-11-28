<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DRetur extends Model
{
    use HasFactory;

    protected $table = "d_retur";
    protected $primaryKey = "id";
    public $timestamps = false;
    public $incrementing = true;

    public function Buku(){
        return $this->belongsTo(Buku::class, 'id_buku', 'id');
    }
}
