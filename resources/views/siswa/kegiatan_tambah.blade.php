@extends('siswa.layout.app')

@section('title', 'tambah kegiatan')

@section('content')

<div class="row g-4" >
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Tambah Kegiatan</h6>
            <form action="{{ route('siswa.kegiatan_store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_kegiatan" class="form-label">kegiatan</label>
                    <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan">
                    <div class="text-danger">
                    @error('nama_kegiatan')
                        {{$message}}
                    @enderror</div>
                </div>
                <div class="mb-3">
                    <label for="waktu" class="form-label">tanggal kegiatan</label>
                    <input type="date" class="form-control" id="waktu" name="waktu">
                    <div class="text-danger">
                        @error('waktu')
                            {{$message}}
                        @enderror</div>
                </div>
                <div class="mb-3">
                    <label for="ringkasan_kegiatan" class="form-label">detail kegiatan</label>
                    <textarea name="ringkasan_kegiatan" id="ringkasan_kegiatan" rows="5" class="form-control"></textarea>
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
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection
