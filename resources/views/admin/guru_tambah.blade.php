@extends('admin.layout.app')

@section('title', 'Tambah Guru')

@section('content')

<div class="row g-4" >
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Basic Form</h6>
            <form action="{{route('admin.guru_store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip">
                    <div class="text-danger">
                    @error('nip')
                        {{$message}}
                    @enderror</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="Email" name="Email">
                    <div class="text-danger">
                        @error('Email')
                            {{$message}}
                        @enderror</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <div class="text-danger">
                        @error('password')
                            {{$message}}
                        @enderror</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Guru</label>
                    <input type="text" class="form-control" id="nama_guru" name="nama_guru">
                    <div class="text-danger">
                        @error('nama_guru')
                            {{$message}}
                        @enderror</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">foto</label>
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
