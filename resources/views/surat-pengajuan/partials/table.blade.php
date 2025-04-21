@php
    $user = auth()->user();
    $suratPengajuans = \App\Models\SuratPengajuan::with(['tipeSurat', 'user'])
        ->when($user->role_id === 1, function($q) use ($user) {
            return $q->where('user_id', $user->id);
        })
        ->when(in_array($user->role_id, [2, 3]), function($q) use ($user) {
            return $q->where('prodi_id', $user->prodi_id);
        })
        ->latest()
        ->get();
@endphp

@if($suratPengajuans->isEmpty())
    <p>Tidak ada pengajuan surat.</p>
@else
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe Surat</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                @if(auth()->user()->isMahasiswa())
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mahasiswa</th>
                @endif
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($suratPengajuans as $index => $surat)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $surat->tipeSurat->nama_tipe ?? 'Tidak ada tipe surat' }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $surat->created_at->format('d/m/Y') }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            {{ $surat->status === 'Approved' ? 'bg-green-100 text-green-800' : 
                               ($surat->status === 'Rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                            {{ $surat->status }}
                        </span>
                    </td>
                    @if(auth()->user()->isMahasiswa())
                        <td class="px-6 py-4 whitespace-nowrap">{{ $surat->user->name ?? 'Tidak ada nama mahasiswa' }}</td>
                    @endif
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if(auth()->user()->role_id === 2 && $surat->status === 'Pending')
                            <form method="POST" action="{{ route('surat-pengajuan.approve', $surat->id) }}" class="inline">
                                @csrf
                                <button type="submit" class="text-green-600 hover:text-green-900">Approve</button>
                            </form>
                            <span class="mx-1">|</span>
                            <form method="POST" action="{{ route('surat-pengajuan.reject', $surat->id) }}" class="inline">
                                @csrf
                                <button type="submit" class="text-red-600 hover:text-red-900">Reject</button>
                            </form>
                        @endif

                        @if(auth()->user()->role_id === 3 && $surat->status === 'Approved' && !$surat->file_path)
                            <form method="POST" action="{{ route('surat-pengajuan.upload', $surat->id) }}" enctype="multipart/form-data" class="inline">
                                @csrf
                                <input type="file" name="file" class="hidden" id="file-{{ $surat->id }}" onchange="this.form.submit()">
                                <label for="file-{{ $surat->id }}" class="text-blue-600 hover:text-blue-900 cursor-pointer">Upload</label>
                            </form>
                        @endif

                        @if($surat->file_path)
                            <a href="{{ Storage::url($surat->file_path) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900">Download</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
