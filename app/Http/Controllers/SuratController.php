<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    /**
     * Menangani proses upload file.
     */
    public function upload(Request $request)
{
    // Validasi file yang diupload
    $request->validate([
        'file' => 'required|mimes:pdf,jpg,jpeg,png,docx|max:10240', // Validasi tipe dan ukuran file
    ]);

    // Proses upload file
    if ($request->hasFile('file')) {
        // Mengambil file yang di-upload
        $file = $request->file('file');

        // Menyimpan file ke dalam storage dan mendapatkan path-nya
        $path = $file->store('public/surat-pengajuan'); // Simpan di folder 'public/surat-pengajuan'

        // Menyimpan informasi file ke dalam database
        $surat = new Surat();
        $surat->file_name = $file->getClientOriginalName(); // Nama asli file
        $surat->surat_pengajuan_id = $request->input('surat_pengajuan_id');
        $surat->file_path = $path; // Simpan path file di storage
        $surat->save(); // Simpan data surat ke database

        return redirect()->back()->with('success', 'File berhasil di-upload');
    }

    return redirect()->back()->with('error', 'File tidak ditemukan');
}






    /**
     * Menampilkan file untuk didownload dari database.
     */
    public function download($id)
{
    // Ambil data file berdasarkan ID
    $surat = Surat::find($id);

    // Cek apakah surat ditemukan dan file_path ada
    if ($surat && $surat->file_path) {
        // Mendapatkan path file yang sudah disimpan di storage
        $filePath = storage_path('app/public/' . $surat->file_path);  // Gunakan 'app/public' sebagai base path

        // Pastikan file ada sebelum mengirimkan ke pengguna
        if (file_exists($filePath)) {
            return response()->download($filePath); // Mengunduh file dari storage
        } else {
            return response()->json(['error' => 'File not found in storage'], 404);
        }
    }

    // Jika file tidak ditemukan
    return response()->json(['error' => 'File not found'], 404);
}




}
