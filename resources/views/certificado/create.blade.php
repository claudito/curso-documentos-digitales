@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h2>Registro de Certificado</h2><hr>
				<form id="create" autocomplete="off">
					 @csrf

					 <div class="form-group">
					 	<label>Nif</label>
					 	<input type="text" name="nif" class="form-control" required>
					 </div>

					 <div class="form-group">
					 	<label>Código de Pais</label>
					 	<input type="text" name="codigo_pais" class="form-control" required>
					 </div>

					 <div class="form-group">
					 	<label>Nombre Común</label>
					 	<input type="text" name="nombre_comun" class="form-control" required>
					 </div>

					 <div class="form-group">
					 	<label>Cargo</label>
					 	<input type="text" name="cargo" class="form-control" required>
					 </div>

					 <div class="form-group">
					 	<label>Número de Serie</label>
					 	<input type="text" name="numero_serie" class="form-control" required>
					 </div>

					 <div class="form-group">
					 	<label>Tipo de Certificado</label>
					 	<select name="tipo_certificado" class="form-control" required>
					 		<option value="">Seleccionar</option>
					 		@foreach($tipo_certificados as $key =>$value )
					 			<option value="{{ $value->id }}">{{ $value->nombre }}</option>
					 		@endforeach
					 	</select>
					 </div>

					 <div class="form-group">
					 	<label>Entidad Emisora</label>
					 	<input type="text" name="entidad_emisora" class="form-control" required>
					 </div>

					 <div class="form-group">
					 	<label>Fecha de Inicio</label>
					 	<input type="date" name="fecha_inicio" class="form-control" required>
					 </div>

					 <div class="form-group">
					 	<label>Fecha de Fin</label>
					 	<input type="date" name="fecha_fin" class="form-control" required>
					 </div>

					 <button type="submit" class="btn btn-primary">Grabar</button>

				</form>
			</div>
		</div>
	</div>
@endsection
@section('scripts')
	<script>

		$(document).on('submit','#create',function(e){

			parametros = $(this).serialize();

			$.ajax({
				url:'{{ route('certificados.store') }}',
				type:'POST',
				data:parametros,
				dataType:'JSON',
				beforeSend:function(){

				},
				success:function(data){
					console.log(data);
				}
			});


			e.preventDefault();
		});

	</script>
@endsection
