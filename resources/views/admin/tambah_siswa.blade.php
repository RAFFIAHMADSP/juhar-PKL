@extends('admin.layout.app')

@section('title', 'Tambah Siswa')

@section('content')

<div class="row g-4" >
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Tambah Siswa</h6>
            <form action="{{route('admin.siswa_store', $id )}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nisn" class="form-label">nisn</label>
                    <input type="text" class="form-control" id="nisn" name="nisn">
                    <div class="text-danger">
                    @error('nisn')
                        {{$message}}
                    @enderror</div>
                </div>
                <div class="mb-3">
                    <label for="nama_siswa" class="form-label">nama siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama_siswa">
                    <div class="text-danger">
                        @error('nama_siswa')
                            {{$message}}
                        @enderror</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <div class="text-danger">
                        @error('password')
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
