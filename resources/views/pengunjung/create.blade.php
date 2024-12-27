<!-- filepath: /C:/Users/Azhri/Desktop/laravel/deadline/Sistem-Pendataan-Pengunjung-Tempat-Wisata-Group5-main/resources/views/pengunjung/create.blade.php -->
@extends('dashboard')

@section('title', 'Tambah Pengunjung - Sistem Pendataan Pengunjung')

@section('main-content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pengunjung Wisata</h1>
</div>

<!-- Intro Text -->
<div class="card shadow mb-4">
    <div class="card-body">
        <p class="mb-0">Berikut adalah data pengunjung wisata di tempat ini.</p>
    </div>
</div>

<!-- Registration Form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form method="POST" action="{{ route('pengunjung.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <!-- Left Column -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Nama Pengunjung</label>
                        <input type="text" name="nama_pengunjung" value="{{ old('nama_pengunjung') }}" 
                            class="form-control @error('nama_pengunjung') is-invalid @enderror"/>
                        @error('nama_pengunjung')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Umur</label>
                        <input type="number" name="umur" value="{{ old('umur') }}" 
                            class="form-control @error('umur') is-invalid @enderror"/>
                        @error('umur')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Asal</label>
                        <input type="text" name="asal" value="{{ old('asal') }}" 
                            class="form-control @error('asal') is-invalid @enderror"/>
                        @error('asal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}" 
                            class="form-control @error('tgl_lahir') is-invalid @enderror"/>
                        @error('tgl_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Jenis Kelamin</label>
                        <div class="custom-control custom-radio mb-2">
                            <input type="radio" id="male" name="jenis_kelamin" value="Laki-laki" 
                                class="custom-control-input" {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="male">Laki-laki</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="female" name="jenis_kelamin" value="Perempuan" 
                                class="custom-control-input" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="female">Perempuan</label>
                        </div>
                        @error('jenis_kelamin')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Kewarganegaraan</label>
                        <select name="kewarganegaraan" class="form-control @error('kewarganegaraan') is-invalid @enderror">
                            <option value="">Pilih Kewarganegaraan</option>
                            <option value="WNI" {{ old('kewarganegaraan') == 'WNI' ? 'selected' : '' }}>WNI</option>
                            <option value="WNA" {{ old('kewarganegaraan') == 'WNA' ? 'selected' : '' }}>WNA</option>
                        </select>
                        @error('kewarganegaraan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Tanggal Kunjungan</label>
                        <input type="datetime-local" name="tgl_kunjungan" value="{{ old('tgl_kunjungan') }}" 
                            class="form-control @error('tgl_kunjungan') is-invalid @enderror"/>
                        @error('tgl_kunjungan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group text-right mb-0">
                <a href="{{ url()->previous() }}" class="btn btn-warning">
                    <i class="fas fa-arrow-left mr-1"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i> Simpan Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection