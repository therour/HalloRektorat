@extends('admin.template')

@section('content')
<style>
	td {
		vertical-align:middle;
	}
</style>
<div class="container">
	<div class="row text-center">
		<h1>Admin<small> Dashboard</small></h1>
		<br><br><br>	
	</div>
	<div class="row">
		<div class="col">
			<table class="table table-light	 table-sm table-bordered table-hover">
			<caption>Saran belum ditanggapi <span class="badge badge-warning">{{ $jumlahbaru }}</span></caption>
			<br>
				<thead>
					<tr>
						<th>No.</th><th>Judul</th><th>ditujukan</th><th>Tanggal</th><th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($sarans as $i => $saran)
					<tr>
						<td>
							{{ $sarans->firstItem() + $i }}
						</td>
						<td>
							<a href="{{ url('/saran/'.$saran->id)}}" title="Link to Halaman Saran">{{ str_limit($saran->title, 50 , '...') }}</a>
						</td>
						<td>
							{{ $saran->target->name }}
						</td>
						<td>
							{{ $saran->created_at }}
						</td>
						<td>
							<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalSaran{{$saran->id}}">Lihat & Tanggapi</button>
							<!-- <a role="button" class="btn btn-warning">Tanggapi</a> -->
						</td>
					</tr>
						@include('admin.modal.lihat', [ 'saran' => $saran])
					@endforeach
				</tbody>
			</table>
			{{ $sarans->links() }}
		</div>
	</div>
</div>
@endsection

