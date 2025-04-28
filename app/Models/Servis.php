<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servis extends Model
{
    use HasFactory, SoftDeletes; // SoftDeletes memungkinkan fitur soft delete

    protected $table = 'servis'; // Nama tabel yang digunakan

    protected $fillable = [
        'nama_pemilik', 'no_polisi', 'jenis_kendaraan', 'keluhan', 'jenis_servis', 
        'tanggal_servis', 'biaya', 'status'
    ]; // Menentukan kolom mana saja yang bisa diisi secara massal

    protected $dates = ['tanggal_servis', 'deleted_at']; // Menambahkan kolom tanggal_servis dan deleted_at untuk manipulasi tanggal

    // Jika kamu perlu relasi, misalnya relasi dengan model lain, bisa ditambahkan di sini.
}
