@extends('guru.layout.app')

@section('title', 'Kegiatan')

@section('content')

@if ($errors->has('access'))
<div class="alert alert-danger">
    {{$errors->first('access')}}
</div>
@endif

@if ($kegiatan)
<div class="row  bg-light rounded align-items-center mx-0">
    <div class="col-md-6 p-3">
        <table>
            <tr>
                <td width="100">Siswa</td>
                <td width="15">:</td>
                <td>
                    {{ $kegiatan->kegiatanSiswa->nama_siswa }}
                </td>
            </tr>
        </table>
    </div>
</div>
@endif


<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Data Kegiatan</h6>
        <div class="table-responsive">
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
                            <a href="{{ route('guru.pembimbing.siswa.kegiatan_detail', ['id' => $id_pembimbing, 'id_siswa' => $kegiatan->id_siswa, 'id_kegiatan' => $kegiatan->id_kegiatan]) }}" class="btn btn-warning btn-sm">Detail</a>
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
