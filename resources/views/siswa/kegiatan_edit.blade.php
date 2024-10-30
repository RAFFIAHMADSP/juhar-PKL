@extends('siswa.layout.app')

@section('title', 'Edit kegiatan')

@section('content')
@if ($errors->has('access'))
<div class="alert alert-danger">
    {{$errors->first('access')}}
</div>
@endif
<div class="row g-4" >
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Edit kegiatan</h6>
            <form action="{{ route('siswa.kegiatan_update', $kegiatan->id_kegiatan) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_kegiatan" class="form-label">kegiatan</label>
                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="{{old('nama_kegiatan', $kegiatan->nama_kegiatan)}}">
                    <div class="text-danger">
                    @error('kegiatan')
                        {{$message}}
                    @enderror</div>
                </div>
                <div class="mb-3">
                    <label for="waktu" class="form-label">tanggal kegiatan</label>
                    <input type="date" class="form-control" id="waktu" name="waktu" value="{{old('waktu', $kegiatan->waktu)}}">
                    <div class="text-danger">
                        @error('waktu')
                            {{$message}}
                        @enderror</div>
                </div>
                <div class="mb-3">
                    <label for="ringkasan_kegiatan" class="form-label">detail kegiatan</label>
                    <textarea name="ringkasan_kegiatan" id="ringkasan_kegiatan" rows="5" class="form-control" >{{$kegiatan->ringkasan_kegiatan}}</textarea>
                    <div class="text-danger">
                        @error('ringkasan_kegiatan')
                            {{$message}}
                        @enderror</div>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">foto</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                    <div class="text-danger">
                        @error('foto')
                            {{$message}}
                        @enderror</div>
                </div>
                <button type="submit" class="btn btn-primary">update</button>
            </form>
        </div>
    </div>
</div>

@endsection
