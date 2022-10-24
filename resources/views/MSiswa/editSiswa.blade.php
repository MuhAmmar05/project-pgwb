@extends('Templates.admin')
@section('title', 'Edit')
@section('content-title', 'Edit siswa')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $item)
                                <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    <form method="post" enctype="multipart/form-data" action="{{ route('mastersiswa.update' ,$siswa->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="Nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{$siswa->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="Nisn">Nisn</label>
                            <input type="text" class="form-control" id="nisn" name="nisn" value="{{$siswa->nisn}}">
                        </div>
                        <div class="form-group">
                            <label for="Alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="{{$siswa->alamat}}">
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select class="form-select form-control" id="jk" name="jk">
                                <option value="laki-laki" @if($siswa->jk == 'laki-laki') selected @endif>laki-Laki</option>
                                <option value="Perempuan" @if($siswa->jk == 'Perempuan') selected @endif>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Foto">Foto Siswa</label>
                            <img src="{{asset('./template/img/'.$siswa->foto)}}" width="300" class="img-thumbnail">
                            <input type="file" class="form-control-file" id="foto" name="foto">
                        </div>
                        <div class="form-group">
                            <label for="About">About</label>
                            <textarea class="form-control" id="about" name="about">{{$siswa->about}}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Update">
                            <a href="{{ route('mastersiswa.index') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection