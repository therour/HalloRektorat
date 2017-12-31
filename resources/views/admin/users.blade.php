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
			<table class="table table-light	 table-sm table-bordered table-hover">
			<br>
				<thead>
					<tr>
						<th rowspan="2">Name</th><th rowspan="2">Email</th><th colspan="3">Kontribusi</th>
					</tr>
					<tr>
						<th><small>Saran</small></th><th><small>Komentar</small></th><th><small>Supports</small></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($users as $i => $user)
					<tr>
						<td>
							<a href="{{ url('/profile/'.$user->id)}}" title="Link to Halaman Saran">{{ $user->name }}</a>
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

