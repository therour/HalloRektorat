@extends('admin.template')

@section('content')
<style>
	td {
	}
</style>
<div class="container">
	<div class="row text-center">
		<h1>Admin<small> Dashboard</small></h1>
		<br><br><br>	
	</div>
	<div class="row">
		<div class="col">
			{{ $sarans->links() }}
			<table class="table table-light	 table-sm table-bordered table-hover">
			<br>
				<thead>
					<tr>
						<th>No.</th><th>Judul</th><th>ditujukan</th><th>Tanggal</th><th>Action</th><th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($sarans as $i => $saran)
					<tr>
						<td>
							{{ $sarans->firstItem() + $i }}
						</td>
						<td>
							<a href="{{ url('/saran/'.$saran->id)}}" title="Link to Halaman Saran">{{ str_limit($saran->title, 30 , '...') }}</a>
						</td>
						<td>
							{{ $saran->target->singkatan }}
						</td>
						<td>
							{{ $saran->created_at }}
						</td>
						<td>
							<button type="button" class="btn btn-{{ $saran->isResponded() ? 'primary' : 'warning'}}" data-toggle="modal" data-target="#modalSaran{{$saran->id}}" style="display:inline;">{{ $saran->isResponded() ? 'Lihat' : 'Lihat & Tanggapi'}}</button>
						</td>
						<td>
							<form action="{{ route('admin.saran.delete', ['saran' => $saran->id]) }}" method="POST">
								{{ csrf_field() }}
								{{ method_field('DELETE') }}
								<button style="display:inline;" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
							</form>
						</td>
					</tr>
						@include('admin.modal.lihat', [ 'saran' => $saran])
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

