<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;

    protected $table = 'pengunjung';

    protected $fillable = [
        'nama_pengunjung', 
        'umur', 
        'asal', 
        'kewarganegaraan', 
        'tgl_kunjungan',
        'tgl_lahir',
        'jenis_kelamin'
    ];

    protected $dates = ['tgl_kunjungan', 'tgl_lahir'];

    protected $casts = [
        'umur' => 'integer',
    ];

    public function getTglKunjunganAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d F Y'); // Mengubah format tanggal menjadi "tanggal Bulan Tahun"
    }
}