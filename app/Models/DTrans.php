<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DTrans extends Model
{
    use HasFactory;

    protected $table = "d_trans";
    protected $primaryKey = "id";
    public $timestamps = false;
    public $incrementing = true;

    public function Buku(){
        return $this->belongsTo(Buku::class, 'id_buku', 'id');
    }
}
