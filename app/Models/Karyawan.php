<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $primaryKey = 'id_karyawan';

    protected $fillable = [
        'nama_karyawan',
        'jabatan',
        'gaji',
        'tanggal_masuk',
    ];
}