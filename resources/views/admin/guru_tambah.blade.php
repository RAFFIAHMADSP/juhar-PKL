@extends('admin.layout.app')

@section('title', 'Tambah Guru')

@section('content')

<div class="row g-4" >
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Tambah Guru</h6>
            <form action="{{route('admin.guru_store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="NIP" class="form-label">NIP</label>
                    <input type="text" class="form-control" id="NIP" name="NIP">
                    <div class="text-danger">
                    @error('NIP')
                        {{$message}}
                    @enderror</div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email">
                    <div class="text-danger">
                        @error('email')
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
                    <label for="nama_guru" class="form-label">Nama Guru</label>
                    <input type="text" class="form-control" id="nama_guru" name="nama_guru">
                    <div class="text-danger">
                        @error('nama_guru')
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
