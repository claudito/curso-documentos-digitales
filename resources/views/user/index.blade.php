@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1>Lista de Usuarios</h1>
				<div class="table-responsive">
					<table id="consulta"  class="table">
						<thead>
							<tr>
								<th>Id</th>
								<th>Nombres</th>
								<th>Apellidos</th>
								<th>Nro de Documento</th>
								<th>Correo</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('scripts')
	<script>
		{{-- $('#consulta').DataTable({
			ajax:{
				url:'{{ route('users.index') }}',
				type:'GET',
				data:{}
			},
			columns:[
				{data:'id'},
				{data:'nombres'},
				{data:'apellidos'},
				{data:'document_number'},
				{data:'email'}
			]
		});--}}

		var users = @json($users);

		$('#consulta').DataTable({
			data:users,
			columns:[
				{data:'id'},
				{data:'nombres'},
				{data:'apellidos'},
				{data:'document_number'},
				{data:'email'}
			]
		});

	</script>
@endsection
