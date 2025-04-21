<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    public function suratPengajuan()
    {
        return $this->belongsTo(SuratPengajuan::class, 'surat_pengajuan_id');
    }

    protected $table = 'surat'; // Sesuaikan dengan nama tabel di database

    protected $fillable = [
        'file_name', // Nama file
        'file_content', // Isi file (misalnya BLOB atau base64)'
        'surat_pengajuan_id', 
    ];
}
