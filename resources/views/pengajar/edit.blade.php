@extends('layout.index')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('pengajar.update', $pengajar->id) }}" method="POST" enctype="multipart/form-data">
                        <!-- Use the route() helper function to generate the form action URL -->
                        @csrf
                        @method('PUT')
                        <!-- Add the CSRF token -->
                        <!-- <input type="hidden" name="_token" value="3DRGApjGStoGmxlNfRqQFIzlZg1Np3HHX8uVKbcG"> -->
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Guru</label>
                            <select class="form-control" name="id_guru" id="namaDropdown">
                                <option value="">Select Nama Guru</option>
                                @foreach($data as $guru)
                                    <option value="{{ $guru->id }}" {{ old('id_guru', $pengajar->id_guru) == $guru->id ? 'selected' : '' }}>
                                        {{ $guru->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="font-weight-bold">Mapel</label>
                            <select class="form-control" name="id_mapel" id="namaDropdown1">
                                <option value="">Select Mapel</option>
                                @foreach($data2 as $mapel)
                                    <option value="{{ $mapel->id }}" {{ old('id_mapel', $pengajar->id_mapel) == $mapel->id ? 'selected' : '' }}>
                                        {{ $mapel->nama_mapel }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="font-weight-bold">Kelas</label>
                            <select class="form-control" name="kelas">
                                <option value="X PPLG" {{ old('kelas', $pengajar->kelas) == 'X PPLG' ? 'selected' : '' }}>X PPLG</option>
                                <option value="XI PPLG" {{ old('kelas', $pengajar->kelas) == 'XI PPLG' ? 'selected' : '' }}>XI PPLG</option>
                                <option value="XII PPLG" {{ old('kelas', $pengajar->kelas) == 'XII PPLG' ? 'selected' : '' }}>XII PPLG</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label class="font-weight-bold">Jam Pelajaran</label>
                            <select class="form-control" name="jam_pelajaran">
                                @for ($i = 1; $i <= 10; $i++)
                                    <option value="{{ $i }}" {{ old('jam_pelajaran', $pengajar->jam_pelajaran) == $i ? 'selected' : '' }}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        

                        <div class="d-flex justify-content-end "> <!-- Added class justify-content-end -->
                            <button type="submit" class="btn btn-md btn-primary mx-1">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning mx-1">RESET</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
