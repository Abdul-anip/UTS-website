@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Data Servis</h1>

    <!-- Menampilkan error validasi -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('servis.store') }}" method="POST">
        @csrf
        
        <div>
            <label>Nama Pemilik</label><br>
            <input type="text" name="nama_pemilik" value="{{ old('nama_pemilik') }}">
        </div>

        <div>
            <label>No Polisi</label><br>
            <input type="text" name="no_polisi" value="{{ old('no_polisi') }}">
        </div>

        <div>
            <label>Jenis Kendaraan</label><br>
            <select name="jenis_kendaraan">
                <option value="Mobil" {{ old('jenis_kendaraan') == 'Mobil' ? 'selected' : '' }}>Mobil</option>
                <option value="Motor" {{ old('jenis_kendaraan') == 'Motor' ? 'selected' : '' }}>Motor</option>
            </select>
        </div>

        <div>
            <label>Keluhan</label><br>
            <textarea name="keluhan">{{ old('keluhan') }}</textarea>
        </div>

        <div>
            <label>Jenis Servis</label><br>
            <input type="text" name="jenis_servis" value="{{ old('jenis_servis') }}">
        </div>

        <div>
            <label>Tanggal Servis</label><br>
            <input type="date" name="tanggal_servis" value="{{ old('tanggal_servis') }}">
        </div>

        <div>
            <label>Biaya</label><br>
            <input type="number" step="0.01" name="biaya" value="{{ old('biaya') }}">
        </div>

        <div>
            <label>Status</label><br>
            <select name="status">
                <option value="menunggu" {{ old('status') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                <option value="dikerjakan" {{ old('status') == 'dikerjakan' ? 'selected' : '' }}>Dikerjakan</option>
                <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <br>
        <button type="submit">Simpan</button>
        <a href="{{ route('servis.index') }}">Kembali</a>
    </form>
</div>
@endsection
