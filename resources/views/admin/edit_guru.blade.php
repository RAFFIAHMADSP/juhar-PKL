@extends('admin.layout.app')

@section('title', 'Edit Guru')

@section('content')

<div class="row g-4" >
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Edit Guru</h6>
            <form action="{{ route('admin.guru_update', $guru->id_guru) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label" >NIP</label>
                    <input type="text" class="form-control" id="nip" name="nip" value="{{old('nip', $guru->nip)}}" >
                    <div class="text-danger">
                    @error('nip')
                        {{$message}}
                    @enderror</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"  >email address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{old('email', $guru->email)}}">
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
                    <label for="exampleInputEmail1" class="form-label"  >Nama Guru</label>
                    <input type="text" class="form-control" id="nama_guru" name="nama_guru"  value="{{old('nama_guru', $guru->nama_guru)}}">
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
                <div class="mb-2"> <img src="{{ asset('storage/' . $guru->foto) }}" alt="" height="80"></div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection
