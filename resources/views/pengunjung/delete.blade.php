@extends('dashboard')

@section('title', 'Data Pengunjung - Sistem Pendataan Pengunjung')

@section('main-content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Pengunjung</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <p class="m-0 font-weight-bold text-primary">Pilih data yang ingin dihapus, lalu klik tombol "Hapus Data Terpilih"</p>
    </div>
    <div class="card-body">
        <!-- Notifikasi Sukses -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Tabel Data Pengunjung -->
        <form method="POST" action="{{ route('pengunjung.bulkDelete') }}">
            @csrf
            @method('DELETE')

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">
                                <input type="checkbox" id="selectAll" class="custom-checkbox">
                            </th>
                            <th>Nama Pengunjung</th>
                            <th>Umur</th>
                            <th>Asal</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Kunjungan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengunjungs as $pengunjung)
                            <tr>
                                <td>
                                    <input type="checkbox" name="ids[]" value="{{ $pengunjung->id }}" class="custom-checkbox">
                                </td>
                                <td>{{ $pengunjung->nama_pengunjung }}</td>
                                <td>{{ $pengunjung->umur }}</td>
                                <td>{{ $pengunjung->asal }}</td>
                                <td>{{ $pengunjung->tgl_lahir }}</td>
                                <td>{{ $pengunjung->jenis_kelamin }}</td>
                                <td>{{ $pengunjung->tgl_kunjungan }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data pengunjung.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-danger" 
                    onclick="return confirm('Apakah Anda yakin ingin menghapus data terpilih?')">
                    <i class="fas fa-trash"></i> Hapus Data Terpilih
                </button>
            </div>
        </form>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $pengunjungs->links() }}
        </div>
    </div>
</div>
@endsection

@push('styles')
<!-- Custom styles for this page -->
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<!-- Page level plugins -->
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script>
$(document).ready(function() {
    // Initialize DataTables
    $('#dataTable').DataTable();

    // Select All checkbox functionality
    $('#selectAll').change(function() {
        const checkboxes = document.querySelectorAll('input[name="ids[]"]');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });
});
</script>
@endpush