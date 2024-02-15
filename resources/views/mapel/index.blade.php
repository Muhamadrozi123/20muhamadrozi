@extends('layout.index')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('mapel.create') }}" class="btn btn-md btn-success mb-3">TAMBAH MAPEL</a>
                        <a href="{{ route('guru.index') }}" class="btn btn-md btn-success mb-3">DATA GURU</a>
                        <a href="{{ route('pengajar.index') }}" class="btn btn-md btn-success mb-3">DATA PENGAJAR</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NAMA MAPEL</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mapels as $mapel)
                                    <tr>

                                        <td>{{ $mapel->nama_mapel }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('mapel.destroy', $mapel->id) }}" method="post">
                                                <a href="{{ route('mapel.edit', $mapel->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data guru belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $mapels->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
