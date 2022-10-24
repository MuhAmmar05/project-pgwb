@extends('Templates.admin')
@section('title', 'Show')
@section('content-title', 'Show siswa')
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card shadow mb-4">
            <div class="card-header">Nama</div>
                <div class="card-body text-center">
                    <img src="{{ asset('/template/img/'.$siswa->foto) }}" width="250"  class="rounded-circle mx-3 mx-auto img-thumbnail">
                    <h4 class="">{{ $siswa->nama }}</h4>
                    <h6><i class="fas fa-id-card"></i>{{ $siswa->nisn }}</h6>
                    <h6><i class="fas fa-venus-mars"></i>{{ $siswa->jk }}</h6>
                    <h6><i class="fas fa-map"></i>{{ $siswa->alamat }}</h6>
                </div>
          </div>
            <div class="card shadow mb-4">
                <div class="card-header"><i class="fas fa-user-plus"></i> Kontak Siswa</div>
                <div class="card-body text-center">
                    @foreach($kontak as $item)
                    <li>{{$item->jenis_kontak}} : {{$item->pivot->deskripsi}}</li>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card shadow mb-4">
            <div class="card-header"><i class="fas fa-quote-left"></i> About Siswa</div>
                <div class="card-body">
                    <blockquote class="blockquote text-center">
                        <p class="mb-0">{{ $siswa->about}}</p>
                        <footer class="blackquote-footer"> -by <cite title="Source Title">{{$siswa->nama}}</cite></footer>
                    </blockquote>
                </div>
            </div>
            <div class="card shadow mb-4">
            <div class="card-header"><i class="fas fa-tasks"></i> Project Siswa</div>
                <div class="card-body">
                    <div class="text-center">
                        <blockquote class="blockquote text-center">
                        <p class="mb-0">{{ $siswa->project}}</p>
                        
                        </blockquote>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="col-lg-4">
            <a href="{{ route('mastersiswa.index') }}" class="btn btn-danger">Kembali</a>
        </div>
    </div>
@endsection