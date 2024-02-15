@extends('layout.index')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <a href="{{ route('guru.create') }}" class="btn btn-md btn-success mb-3">TAMBAH GURU</a>
                    <a href="{{ route('mapel.index') }}" class="btn btn-md btn-success mb-3">DATA MAPEL</a>
                    <a href="{{ route('pengajar.index') }}" class="btn btn-md btn-success mb-3">DATA PENGAJAR</a>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">NAMA</th>
                            <th scope="col">NO.HP</th>
                            <th scope="col">FOTO</th>
                            <th scope="col">AKSI</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($gurus as $guru)
                            <tr>
                               
                                <td>{{ $guru->nama }}</td>
                                <td>{!! $guru->no_hp !!}</td>
                                <td class="text-center">
                                    <img src="{{ Storage::url('/posts/').$guru->gambar }}" class="rounded" style="width: 150px">
                                </td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('guru.destroy', $guru->id) }}" method="POST">
                                        <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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
                      {{ $gurus->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
