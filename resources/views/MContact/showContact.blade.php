@if($kontak->isEmpty())
    <h6>Siswa Belum Memiliki Kontak</h6>
@else
    @foreach($kontak as $item)
    <div class="card">
        <div class="card-header">
            <strong> {{ $item->jenis_kontak}}</strong>
        </div>
        <div class="card-body">
            <strong>Jenis kontak</strong>
            <p>{{ $item->jenis_kontak }}</p>
            <strong>Deskripsi</strong>
            <p>{{ $item->pivot->deskripsi }}</p>
        </div>
        {{-- <div class="card-footer">
            <a href= "{{route('masterproject.edit', $item->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
            <a href= "{{route('masterproject.hapus', $item->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
        </div> --}}
    </div><br>
    @endforeach
    @endif