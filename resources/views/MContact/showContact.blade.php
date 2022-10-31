@if($kontak->isEmpty())
    <h6>Siswa Belum Memiliki Kontak</h6>
@else
    @foreach($kontak as $item)
    <div class="card ">
        <div class="card-header">
            <strong>Kontak siswa</strong>
        </div>
        <div class="card-body">
            <strong>Jenis Kontak</strong>
            <p>{{ $item->jenis_kontak }}</p>
            <strong>Deskripsi Kontak</strong>
            <p>{{ $item->pivot->deskripsi }}</p>
        </div>
        {{-- <div class="card-footer">
            <a href= "{{route('mastercontact.edit', $item->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
            <a href= "{{route('mastercontact.hapus', $item->id)}}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
        </div> --}}
        <div class="card-footer">  
            <form action="/mastercontact/delete/{{$item->pivot->id}}" method="post">
                @csrf  
                    <button type="submit" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></button>
                </form> 
                <a href="{{ route('mastercontact.edit', $item->id)}}" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                
        </div>
    </div>
    <br>
    @endforeach
    @endif