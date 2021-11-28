<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;
    protected $connection= 'mysql';
    protected $table= 'alamat';
    public $timestamps = true;
    protected $fillable = [
        'penerima',
        'nohp',
        'provinsi',
        'kota',
        'kecamatan',
        'kelurahan',
        'kodepos',
        'jalan'
    ];
}
