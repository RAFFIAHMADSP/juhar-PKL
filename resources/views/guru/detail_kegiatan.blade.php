@extends('guru.layout.app')

@section('title', 'Detail Kegiatan')


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

<br>

<div class="row g-4" >
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Detail kegiatan</h6>
            <form action="" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="waktu" class="form-label">tanggal kegiatan</label>
                    <input type="text" class="form-control" id="waktu" name="waktu" value="{{old('waktu', $kegiatan->waktu)}}"  readonly>
                </div>
                <div class="mb-3">
                    <label for="ringkasan_kegiatan" class="form-label">ringkasan_kegiatan</label>
                    <input type="text" class="form-control" id="ringkasan_kegiatan" name="ringkasan_kegiatan" value="{{old('ringkasan_kegiatan', $kegiatan->ringkasan_kegiatan)}}" readonly>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">foto kegiatan</label>
                <div class="mb-2"> <img src="{{ asset('storage/' . $kegiatan->foto) }}" alt="" height="80"></div>
                <button  type="submit" class="btn btn-primary">
                    <a href="{{ route('guru.pembimbing.siswa.kegiatan', ['id' => $id, 'id_siswa' => $kegiatan->id_siswa]) }}" class="btn btn-primary ">kembali</a>
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
