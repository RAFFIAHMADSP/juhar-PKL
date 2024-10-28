@extends('siswa.layout.app')

@section('title', 'Dashboard Siswa')

@section('content')

    <div class="row  bg-light rounded align-items-center justify-content-center mx-0">
        <div class="col-md-6 text-center p-3">
            <h3>Hi,{{ Auth::guard('siswa')->user()->nama_siswa }} selamat datang di halaman dashboard</h3>
        </div>
    </div>
    <div class="row  bg-light rounded align-items-center justify-content-center mx-0">
        <div class="col-md-6 text-center p-3">
            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde ad voluptates corporis error quibusdam? Beatae
                consequuntur modi obcaecati assumenda. Non magnam odit dolore autem pariatur fugiat quas voluptatibus ipsum
                nihil?</h5>
        </div>
    </div>
@endsection
