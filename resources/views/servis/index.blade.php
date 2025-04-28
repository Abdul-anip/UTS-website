@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Daftar Servis Kendaraan</h1>

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nama Pemilik</th>
                <th>No. Polisi</th>
                <th>Jenis Kendaraan</th>
                <th>Keluhan</th>
                <th>Jenis Servis</th>
                <th>Tanggal Servis</th>
                <th>Biaya</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($servis as $data)
                <tr>
                    <td>{{ $data->nama_pemilik }}</td>
                    <td>{{ $data->no_polisi }}</td>
                    <td>{{ $data->jenis_kendaraan }}</td>
                    <td>{{ $data->keluhan }}</td>
                    <td>{{ $data->jenis_servis }}</td>
                    <td>{{ $data->tanggal_servis }}</td>
                    <td>{{ $data->biaya }}</td>
                    <td>{{ $data->status }}</td>
                    <td>
                        <a href="{{ route('servis.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('servis.destroy', $data->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus servis ini?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $servis->links() }} <!-- Pagination -->
    </div>
@endsection
