@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Riwayat Servis Dihapus</h1>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemilik</th>
                <th>No Polisi</th>
                <th>Jenis Kendaraan</th>
                <th>Tanggal Servis</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($trashedServis as $index => $servis)
                <tr>
                    <td>{{ $index + $trashedServis->firstItem() }}</td>
                    <td>{{ $servis->nama_pemilik }}</td>
                    <td>{{ $servis->no_polisi }}</td>
                    <td>{{ $servis->jenis_kendaraan }}</td>
                    <td>{{ $servis->tanggal_servis }}</td>
                    <td>{{ $servis->status }}</td>
                    <td>
                        <form action="{{ route('servis.restore', $servis->id) }}" method="POST">
                            @csrf
                            <button type="submit" style="background-color: green; color: white;">Restore</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Tidak ada data servis yang dihapus.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="text-align: right; margin-top: 10px;">
        {{ $trashedServis->links() }}
    </div>

    <br>
    <a href="{{ route('servis.index') }}">← Kembali ke Data Servis</a>
</div>
@endsection
