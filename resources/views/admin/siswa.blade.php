@extends('admin.layout.app')

@section('title', 'Siswa')

@section('content')


    @if ($siswa)
        <div class="row  bg-light rounded align-items-center mx-0">
            <div class="col-md-6 p-3">
                <table>
                    <tr>
                        <td width="100">Pembimbing</td>
                        <td width="15">Yth.</td>
                        <td>
                            {{ $siswa->pembimbingSiswa->guru->nama_guru }}
                        </td>
                    </tr>
                    <tr>
                        <td width="100">DUDI</td>
                        <td width="15">:</td>
                        <td>
                            {{ $siswa->pembimbingSiswa->dudi->nama_dudi }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    @endif


    <br>

    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <h6 class="mb-4">Data Siswa</h6>
            <div class="table-responsive">
                <a href="{{ route('admin.siswa_create', $id) }}" class="btn btn-primary btn-sm">Tambah</a>
                <table class="table" id="siswa">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">nisn</th>
                            <th scope="col">Nama siswa</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswas as $siswa)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $siswa->nisn }}</td>
                                <td>{{ $siswa->nama_siswa }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $siswa->foto) }}" alt="" class="src"
                                        height="30">
                                </td>
                                <td>
                                    <a href="{{ route('admin.siswa_edit', ['id' => $id, 'id_siswa' => $siswa->id_siswa]) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('admin.siswa_delete', ['id' => $id, 'id_siswa' => $siswa->id_siswa])}}" onclick="return confirm('Yakin ingin hapus data?')"
                                        class="btn btn-danger btn-sm">Delet</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#siswa').DataTable();
        })
    </script>
@endsection