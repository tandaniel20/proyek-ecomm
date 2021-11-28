<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = "rating";
    protected $primaryKey = "id";
    public $timestamps = true;
    public $incrementing = true;

    public function User(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
