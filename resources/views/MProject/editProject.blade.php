@extends('Templates.admin')
@section('title', 'Edit Project')
@section('content-title', 'Project   '.$project->nama)
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

        <form method="post" enctype="multipart/form-data" action="{{ route('masterproject.update', $project->id) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <input type="hidden" name="id_siswa" value="{{ $project->id_siswa}}">
                <label for="nama">NAMA PROJECT</label>
                <input type="text" class="form-control" id="nama_project" name="nama_project" value="{{ $project->nama_project}}">
            </div>
            <div class="form-group">
                <label for="nama">DESKRIPSI PROJECT</label>
                <textarea type="deskripsi" id="deskripsi" class="form-control" name='deskripsi'>{{ $project->deskripsi}}</textarea>
            </div>
            <div class="form-group">
                <label for="nama">TANGGAL PROJECT</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $project->tanggal}}">
            </div><br>
            <div class="form-group">
                @csrf
                <a href="{{ route('masterproject.index') }}" class="btn btn-danger">BATAL</a>
                <input type="submit" class="btn btn-success" value="update">
            </div>
        </form>
    </div>
</div>

@endsection