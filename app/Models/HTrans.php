<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HTrans extends Model
{
    use HasFactory;

    protected $table = "h_trans";
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
        return $this->hasMany(DTrans::class, 'id_trans', 'id');
    }
}
