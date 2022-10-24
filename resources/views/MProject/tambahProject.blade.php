@extends('Templates.admin')
@section('title', 'Tambah Project')
@section('content-title', 'Master project   '.$siswa->nama)
@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="post" enctype="multipart/form-data" action="{{ route('masterproject.store', $siswa->id) }}">
    @csrf
    <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
    <div class="form-group">
        <input type="hidden" name="id_siswa" value="{{ $siswa->id }}">
        <label for="nama">NAMA PROJECT</label>
        <input type="text" class="form-control" id="nama_project" name="nama_project" value="{{ old('nama_project') }}">
    </div>
    <div class="form-group">
        <label for="nama">DESKRIPSI PROJECT</label>
        <textarea id="deskripsi" name="deskripsi" class="form-control" value="{{ old('deskripsi') }}"></textarea>
    </div>
    <div class="form-group">
        <label for="nama">TANGGAL PROJECT</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
    </div>
    <div class="form-group">
        <a href="{{ route('masterproject.index') }}" class="btn btn-danger">BATAL</a>
        <input class="btn btn-success" type="submit" value="simpan">
    </div>
</form>
@endsection