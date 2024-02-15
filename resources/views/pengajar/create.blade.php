@extends('layout.index')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('pengajar.store') }}" method="POST" enctype="multipart/form-data">
                        <!-- Use the route() helper function to generate the form action URL -->
                        @csrf
                        <!-- Add the CSRF token -->
                        <!-- <input type="hidden" name="_token" value="3DRGApjGStoGmxlNfRqQFIzlZg1Np3HHX8uVKbcG"> -->
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Guru</label>
                            <select class="form-control " name="id_guru" id="namaDropdown">
                                <option value="">Select Nama Guru</option>
                                @foreach($data as $guru)
                                    <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Mapel</label>
                            <select class="form-control " name="id_mapel" id="namaDropdown1">
                                <option value="">Select Mapel</option>
                                @foreach($data2 as $mapel)
                                    <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Kelas</label>
                            <select class="form-control" name="kelas">
                                <option value="">Select Kelas</option>
                                <option value="XII RPL ">XII RPL </option>
                                <option value="XII DKV1 ">XII DKV </option>
                                <option value="XII TJKT">XII TJKT </option>
                                <option value="XII TK1 ">XII TK </option>
                                <option value="XII TEI1">XII TEI </option>
                                <option value="XII BUSANA ">XII BUSANA </option>
                                <option value="XII BROADCASTING ">XII BROADCASTING </option>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Jam Pelajaran</label>
                            <select class="form-control" name="jam_pelajaran">
                                <option value="">Select Jam Pelajaran</option>
                                <option value="1">1 </option>
                                <option value="2">2 </option>
                                <option value="3">3 </option>
                                <option value="4">4 </option>
                                <option value="5">5 </option>
                                <option value="6">6 </option>
                                <option value="7">7 </option>
                                <option value="8">8 </option>
                                <option value="9">9 </option>
                                <option value="10">10 </option>
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
