@extends('guru.layout.app')

@section('title', 'Pembimbing')

@section('content')

<div class="col-12">
    <div class="bg-light rounded h-100 p-4">
        @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        <h6 class="mb-4">Data Pembimbing</h6>
        <div class="table-responsive">
            <table class="table" id="pembimbing">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">nama guru</th>
                        <th scope="col">nama dudi</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pembimbings as $pembimbing)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $pembimbing->guru->nama_guru }}</td>
                        <td>{{ $pembimbing->dudi->nama_dudi }}</td>

                        <td>
                            <a href="{{ route('guru.pembimbing.siswa', $pembimbing->id_pembimbing) }}" class="btn btn-primary btn-sm">Siswa</a>
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
        $('#pembimbing').DataTable();
    });
</script>
@endsection
