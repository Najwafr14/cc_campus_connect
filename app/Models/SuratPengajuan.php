<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'tipe_surat_id', 'prodi_id', 'semester', 'keperluan',
        'kode_mk', 'nama_mk', 'tujuan', 'topik', 'status', 'file_path'
    ];

    // Di model SuratPengajuan.php
public function tipeSurat()
{
    return $this->belongsTo(TipeSurat::class, 'tipe_surat_id');
}

public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}


    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}