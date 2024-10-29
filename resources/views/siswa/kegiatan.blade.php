@extends('siswa.layout.app')

@section('title', 'Kegiatan')

@section('content')

    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <h6 class="mb-4">Data Kegiatan</h6>
            <div class="table-responsive">
                <a href="{{ route('siswa.kegiatan_tambah') }}" class="btn btn-primary btn-sm">Tambah</a>
                <table class="table" id="kegiatan">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col" style="text-align:center">Tanggal kegiatan</th>
                            <th scope="col">Kegiatan</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kegiatans as $kegiatan)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td style="text-align: center">{{ $kegiatan->waktu }}</td>
                                <td>{{ $kegiatan->nama_kegiatan }}</td>
                                <td>
                                    <a href="{{ route('siswa.kegiatan_edit', $kegiatan->id_kegiatan) }}"
                                        class="btn btn-warning btn-sm">edit</a>
                                    <a href="{{ route('siswa.kegiatan_delete', $kegiatan->id_kegiatan) }}"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin hapus data?')">hapus</a>
                                    <a href="{{ route('siswa.kegiatan_detail', $kegiatan->id_kegiatan) }}"
                                        class="btn btn-warning btn-sm">detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#kegiatan').DataTable();
        });
    </script>
@endsection
