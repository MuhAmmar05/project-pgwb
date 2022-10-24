@extends('Templates.admin')
@section('title', 'Contact')
@section('content-title', 'Master contact')
@section('content')
<div class="row">

		<div class="col-lg-5">
			<div class="card shadow mb-4" style="border: 1px solid #bbb;">
		        <div style="font-weight: 500;" class="card-header bg-gradient-info text-white">
			        <i class="fas fa-user me-1" style="margin-right: 5px;"></i>
			        Data Siswa
			    </div>
			    <div class="card-body">
					<table class="table table-bordered display nowrap" cellspacing="0" width="100%">
					    <thead>
					        <tr>
                                <th>Nisn</th>
					            <th>Nama</th>
					            <th>Action</th>
					        </tr>
					    </thead>
						@foreach ($data as $item)
					        <tr>
                                <td>{{$item->nisn}}</td>
                                <td>{{$item->nama}}</td>
							<td>
									<a class="btn btn-info" onclick="show({{ $item->id }})"><i class="fas fa-info-circle"></i></a>
									<a href= "{{route('mastercontact.create', $item->id)}}" class="btn btn-info"><i class="fas fa-plus"></i></a>
                            </td>
							</tr>
                            @endforeach
					</table>
					<div class="card-footer">
						{{ $data->links() }}
					</div>
			    </div>
		    </div>
		</div>

		<div class="col-lg-7">
			<div class="card shadow mb-4" style="border: 1px solid #bbb;">
		        <div style="font-weight: 500;" class="card-header bg-gradient-info text-white">
			        <i class="fas fa-book me-1" style="margin-right: 5px;"></i>
			        Kontak Siswa
			    </div>
			    <div id="project" class="card-body">
					<section class="text-center">
					    <h3>Pilih siswa terlebih dahulu</h3>
					</section>
			    </div>
		    </div>
		</div>

	</div>
	<script>
		function show(id){
			$.get('mastercontact/'+id,function(data){
				$('#contact').html(data);
			})
		}
	</script>
@endsection