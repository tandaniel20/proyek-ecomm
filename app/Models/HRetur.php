<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HRetur extends Model
{
    use HasFactory;

    protected $table = "h_retur";
    protected $primaryKey = "id";
    public $timestamps = true;
    public $incrementing = true;

    public function User(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function Alamat(){
        return $this->belongsTo(Alamat::class, 'id_alamat', 'id');
    }

    public function Detail(){
        return $this->hasMany(DRetur::class, 'id_retur', 'id');
    }
}
