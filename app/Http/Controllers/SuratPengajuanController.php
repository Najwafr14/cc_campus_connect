<?php

namespace App\Http\Controllers;

use App\Models\SuratPengajuan;
use App\Models\TipeSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SuratPengajuanController extends Controller
{
    public function index()
{
    $user = Auth::user();
    
    $query = SuratPengajuan::with(['tipeSurat', 'user'])
        ->when($user->role_id === 1, function($q) use ($user) {
            return $q->where('user_id', $user->id); // Filter berdasarkan user_id
        })
        ->when(in_array($user->role_id, [2, 3]), function($q) use ($user) {
            return $q->where('prodi_id', $user->prodi_id); // Filter berdasarkan prodi_id
        })
        ->latest();

    // Debugging untuk memastikan data ada
    // Debugging: lihat SQL query dan hasilnya

    $suratPengajuans = $query->get();

    return view('surat-pengajuan.index', [
        'suratPengajuans' => $suratPengajuans,
        'isMahasiswa' => $user->role_id === 1
    ]);
}



    public function create()
    {
        if (Auth::user()->role_id !== 1) {
            abort(403, 'Hanya mahasiswa yang bisa membuat pengajuan');
        }

        return view('surat-pengajuan.create', [
            'tipeSurats' => TipeSurat::all()
        ]);
    }

    public function store(Request $request)
    {
        if (Auth::user()->role_id !== 1) { // Jika bukan mahasiswa
            abort(403);
        }

        $request->validate([
            'tipe_surat_id' => ['required', 'exists:tipe_surats,id'],
            'semester' => ['required_if:tipe_surat_id,1', 'nullable', 'string'],
            'keperluan' => ['required_if:tipe_surat_id,1,4', 'nullable', 'string'],
            'kode_mk' => ['required_if:tipe_surat_id,2', 'nullable', 'string'],
            'nama_mk' => ['required_if:tipe_surat_id,2', 'nullable', 'string'],
            'tujuan' => ['required_if:tipe_surat_id,2', 'nullable', 'string'],
            'topik' => ['required_if:tipe_surat_id,2', 'nullable', 'string'],
        ]);

        $suratPengajuan = SuratPengajuan::create([
            'user_id' => Auth::id(),
            'tipe_surat_id' => $request->tipe_surat_id,
            'prodi_id' => Auth::user()->prodi_id,
            'semester' => $request->semester,
            'keperluan' => $request->keperluan,
            'kode_mk' => $request->kode_mk,
            'nama_mk' => $request->nama_mk,
            'tujuan' => $request->tujuan,
            'topik' => $request->topik,
            'status' => 'Pending',

        ]);

        $suratPengajuan->save();

        return redirect()->route('Mahasiswa.surat-pengajuan.index')->with('success', 'Pengajuan surat berhasil dibuat');
    }

    public function approve($id)
    {
        if (Auth::user()->role_id !== 2) { // Jika bukan kaprodi (role_id 2)
            abort(403);
        }

        $suratPengajuan = SuratPengajuan::where('prodi_id', Auth::user()->prodi_id)
            ->findOrFail($id);
            
        $suratPengajuan->update(['status' => 'Approved']);

        return back()->with('success', 'Pengajuan surat telah disetujui');
    }

    public function reject($id)
    {
        if (Auth::user()->role_id !== 2) { // Jika bukan kaprodi
            abort(403);
        }

        $suratPengajuan = SuratPengajuan::where('prodi_id', Auth::user()->prodi_id)
            ->findOrFail($id);
            
        $suratPengajuan->update(['status' => 'Rejected']);

        return back()->with('success', 'Pengajuan surat telah ditolak');
    }

    public function upload(Request $request, $id)
    {
        if (Auth::user()->role_id !== 3) { // Jika bukan tata usaha (role_id 3)
            abort(403);
        }

        $request->validate([
            'file' => ['required', 'file', 'mimes:pdf', 'max:2048'],
        ]);

        $suratPengajuan = SuratPengajuan::where('prodi_id', Auth::user()->prodi_id)
            ->where('status', 'Approved')
            ->findOrFail($id);

        $filePath = $request->file('file')->store('surat-pengajuan');

        $suratPengajuan->update(['file_path' => $filePath]);

        return back()->with('success', 'File surat berhasil diupload');
    }

    public function getFields($tipeSuratId)
    {
        if (!Auth::check() || Auth::user()->role_id !== 1) { // Jika bukan mahasiswa
            abort(403);
        }

        $view = match ((int)$tipeSuratId) {
            1 => 'surat-pengajuan.partials.fields-aktif',
            2 => 'surat-pengajuan.partials.fields-tugas',
            4 => 'surat-pengajuan.partials.fields-lhs',
            default => 'surat-pengajuan.partials.fields-lulus',
        };

        return view($view);
    }
}