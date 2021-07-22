<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';
    protected $fillable = ['nama', 'kelas', 'nim', 'jenis_kelamin', 'tanggal_lahir', 'tempat_lahir', 'alamat'];
    public function nilais()
    {
        return $this->hasMany('App\Nilai');
    }
}
