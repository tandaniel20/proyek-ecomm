<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointHistory extends Model
{
    use HasFactory;

    protected $table = "point_history";
    protected $primaryKey = "id";
    public $timestamps = true;
    public $incrementing = true;
}
