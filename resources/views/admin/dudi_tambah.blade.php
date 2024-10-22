@extends('admin.layout.app')

@section('title', 'Tambah Dudi')

@section('content')

<div class="row g-4" >
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Basic Form</h6>
            <form action="{{route('admin.dudi_create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_dudi" class="form-label">Nama dudi</label>
                    <input type="text" class="form-control" id="nama_dudi" name="nama_dudi">
                    <div class="text-danger">
                    @error('nama_dudi')
                        {{$message}}
                    @enderror</div>
                </div>
                <div class="mb-3">
                    <label for="alamat_dudi" class="form-label">Alamat dudi</label>
                    <input type="text" class="form-control" id="alamat_dudi" name="alamat_dudi">
                    <div class="text-danger">
                        @error('alamat_dudi')
                            {{$message}}
                        @enderror</div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection
