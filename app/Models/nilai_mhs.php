<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai_mhs extends Model
{
    use HasFactory;

    protected $table = 'nilai_mhs';
    protected $fillable = ['kode_matkul', 'nilai'];
}
