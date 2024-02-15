@extends('layout.index')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="/pengajar/create" class="btn btn-md btn-success mb-3">TAMBAH PENGAJAR</a>
                        <a href="/guru" class="btn btn-md btn-primary mb-3">DATA GURU</a>
                        <a href="/mapel" class="btn btn-md btn-info mb-3 ">DATA MAPEL</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">NAMA GURU</th>
                                    <th scope="col">MAPEL</th>
                                    <th scope="col">KELAS</th>
                                    <th scope="col">JAM PELAJARAN</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pengajarans as $key => $pengajars)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            {{-- @dd($pengajars->mapel) --}}
                                            @if ($pengajars->guru)
                                                {{ $pengajars->guru->nama }}
                                            @else
                                                <span style="color: red;">Nama Guru Kosong</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($pengajars->mapel)
                                                {{ $pengajars->mapel->nama_mapel }}
                                            @else
                                                <span style="color: red;">Nama Mapel Kosong</span>
                                            @endif
                                        </td>

                                        <td>{{ $pengajars->kelas }}</td>
                                        <td>{{ $pengajars->jam_pelajaran }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('pengajar.destroy', $pengajars->id) }}" method="post">
                                                <a href="{{ route('pengajar.edit', $pengajars->id) }}"
                                                    class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Data Post belum Tersedia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Tambahkan bagian pagination di bawah tabel -->
                        {{ $pengajarans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
