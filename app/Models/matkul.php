<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matkul extends Model
{
    use HasFactory;

    protected $table = 'matkuls';
    protected $fillable = ['kode_matkul', 'matkul', 'kelas'];
}
