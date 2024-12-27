<!-- filepath: /C:/Users/Azhri/Desktop/laravel/deadline/Sistem-Pendataan-Pengunjung-Tempat-Wisata-Group5-main/resources/views/profile.blade.php -->
@extends('dashboard')

@section('title', 'Profile - Sistem Pendataan Pengunjung')

@section('main-content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
</div>

<!-- Profile Content -->
<div class="row justify-content-center">
    <div class="col-xl-8 col-lg-10">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="text-center mb-4">
                    <h4 class="font-weight-bold">{{ $admin->name }}</h4>
                </div>
                <div class="user-data px-4">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label font-weight-bold">Nama</label>
                        <div class="col-sm-9">
                            <div class="form-control-plaintext">{{ $admin->nama_lengkap }}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label font-weight-bold">Email</label>
                        <div class="col-sm-9">
                            <div class="form-control-plaintext">{{ $admin->gmail }}</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label font-weight-bold">Waktu Akun Dibuat</label>
                        <div class="col-sm-9">
                            <div class="form-control-plaintext">{{ $admin->created_at }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection