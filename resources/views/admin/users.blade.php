@extends('admin.template')

@section('content')
<style>
	table {
		text-align:middle;
	}
</style>
<div class="container">
	<div class="row text-center">
		<h1>Admin<small> Dashboard</small></h1>
		<br><br><br>	
	</div>
	<div class="row">
		<div class="col">
			<div class="col-sm-5">
			<form action="" class="form-inline" method="GET">
				<div class="form-group">
					<input class="form-control" placeholder="cari pengguna" type="text" name="cari">
					<button type="submit" class="btn btn-secondary">Cari</button>
				</div>
			</form>
			</div>
			<table class="table table-light	 table-sm table-bordered table-hover">
			<br>
				<thead>
					<tr>
						<th rowspan="2">Name</th><th rowspan="2">Nim</th><th rowspan="2">Email</th><th colspan="3">Kontribusi</th>
					</tr>
					<tr>
						<th><small>Saran</small></th><th><small>Komentar</small></th><th><small>Dukungan</small></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $i => $user)
					<tr>
						<td>
							<a href="{{ url('/profile/'.$user->id)}}" title="Link to Halaman Saran">{{ $user->name }}</a>
						</td>
						<td>
							{{ $user->biodata->nim }}
						</td>
						<td>
							{{ $user->email }}
						</td>
						<td>
							{{ $user->sarans()->count() }}
						</td>
						<td>
							{{ $user->comments()->count() }}
						</td>
						<td>
							{{ $user->supports()->count() }}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $users->links() }}
		</div>
	</div>
</div>
@endsection

