@extends('Templates.admin')
@section('title', 'Siswa')
@section('content-title', 'Master siswa')
@section('content')
    
@if($message = Session::get('sukses'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <strong>{{ $message }}</strong>
  </div>
@endif
@if($message = Session::get('hapus'))
  <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <strong>{{ $message }}</strong>
  </div>
@endif
@if($message = Session::get('berhasil'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <strong>{{ $message }}</strong>
  </div>
@endif

<div class="col-lg-12">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <a href="{{route('mastersiswa.create')}}" class="btn btn-success">tambah data</a>
  </div>
</div>
<div class="card-body">
  
  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">No.</th>
        <th scope="col">NISN</th>
        <th scope="col">Nama</th>
        <th scope="col">Alamat</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $i => $item)
      <tr>
        <th scope="row">{{++$i}}</th>
        <td>{{$item->nama}}</td>
        <td>{{$item->nisn}}</td>
        <td>{{$item->alamat}}</td>
        <td>
          <a href= "{{route('mastersiswa.show', $item->id)}}" class="btn btn-info btn-circle">
            <i class="fas fa-info-circle"></i>
          </a>
          <a href="{{route('mastersiswa.edit', $item->id)}}" class="btn btn-warning btn-circle">
            <i class="fas fa-edit"></i>
          </a>
          <a href="{{route('mastersiswa.hapus', $item->id)}}" class="btn btn-danger btn-circle">
            <i class="fas fa-trash"></i>
          </a>
        </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
</div>
@endsection