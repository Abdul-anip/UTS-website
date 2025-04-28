<!-- resources/views/servis/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Servis Kendaraan</h1>

    <form action="{{ route('servis.update', $servis->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_pemilik">Nama Pemilik:</label>
            <input type="text" name="nama_pemilik" id="nama_pemilik" value="{{ old('nama_pemilik', $servis->nama_pemilik) }}" required>
        </div>

        <div>
            <label for="no_polisi">Nomor Polisi:</label>
            <input type="text" name="no_polisi" id="no_polisi" value="{{ old('no_polisi', $servis->no_polisi) }}" required>
        </div>

        <div>
            <label for="jenis_kendaraan">Jenis Kendaraan:</label>
            <select name="jenis_kendaraan" id="jenis_kendaraan">
                <option value="Mobil" {{ $servis->jenis_kendaraan == 'Mobil' ? 'selected' : '' }}>Mobil</option>
                <option value="Motor" {{ $servis->jenis_kendaraan == 'Motor' ? 'selected' : '' }}>Motor</option>
            </select>
        </div>

        <div>
            <label for="keluhan">Keluhan:</label>
            <textarea name="keluhan" id="keluhan" required>{{ old('keluhan', $servis->keluhan) }}</textarea>
        </div>

        <div>
            <label for="jenis_servis">Jenis Servis:</label>
            <input type="text" name="jenis_servis" id="jenis_servis" value="{{ old('jenis_servis', $servis->jenis_servis) }}" required>
        </div>

        <div>
            <label for="tanggal_servis">Tanggal Servis:</label>
            <input type="date" name="tanggal_servis" id="tanggal_servis" value="{{ old('tanggal_servis', $servis->tanggal_servis->format('Y-m-d')) }}" required>
        </div>

        <div>
            <label for="biaya">Biaya:</label>
            <input type="number" name="biaya" id="biaya" value="{{ old('biaya', $servis->biaya) }}" required>
        </div>

        <div>
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="menunggu" {{ $servis->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="dikerjakan" {{ $servis->status == 'dikerjakan' ? 'selected' : '' }}>Dikerjakan</option>
                <option value="selesai" {{ $servis->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <button type="submit">Simpan</button>
    </form>
@endsection
