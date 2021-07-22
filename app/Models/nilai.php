<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    use HasFactory;

    protected $fillable = ['kode_matkul', 'nim', 'semester', 'kelas', 'h1', 'h2', 'h3',
        'h4', 'h5', 'h6', 'h7', 'hpts', 'hpas', 'hpa', 'predikat'];
}
