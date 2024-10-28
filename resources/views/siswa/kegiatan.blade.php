@extends('siswa.layout.app')

@section('title', 'Kegiatan')

@section('content')

<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Data Kegiatan</h6>
        <div class="table-responsive">
            <a href="" class="btn btn-primary btn-sm">Tambah</a>
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
                        <td>{{ $kegiatan->kegiatan }}</td>
                        <td>
                            <a href="" class="btn btn-warning btn-sm">edit</a>
                            <a href="" class="btn btn-danger btn-sm">hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#kegiatan').DataTable();
    });
</script>
@endsection
