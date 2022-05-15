@extends('layouts.app')
@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<nav aria-label="breadcrumb">
				  <ol class="breadcrumb">
				    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
				    <li class="breadcrumb-item"><a href="#">Mantenimientos</a></li>
				    <li class="breadcrumb-item active" aria-current="page">Certificados</li>
				  </ol>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<button class="btn btn-primary btn-sm btn-agregar"><i class="fa fa-plus"></i> Agregar</button>
				</div>
				<div class="table-responsive">
					<table id="consulta" class="table" style="font-size: 12px">
						<thead>
							<tr>
								<th>Id</th>
								<th>Nif</th>
								<th>Código de País</th>
								<th>Nombre Común</th>
								<th>Cargo</th>
								<th>Número de Serie</th>
								<th>Tipo</th>
								<th>Entidad</th>
								<th>Fecha de Inicio</th>
								<th>Fecha de Fin</th>
								<th>Firma</th>
								<th></th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
	@include('certificado.modal.agregar')
	@include('certificado.modal.agregar-firma')
@endsection
@section('scripts')
	<script>
		function loadData(){
			$('#consulta').DataTable({
				language:{
				 url:"{{  asset('js/spanish.json') }}"
				},
				order:[[0,'asc']],
				destroy:true,
				bAutoWidth: false,
				deferRender:true,
				iDisplayLength: 25,
				bProcessing: true,
				ajax:{
					url:'{{ route('certificados.index') }}',
					type:'GET'
				},
				columns:[
					{data:'id'},
					{data:'nif'},
					{data:'codigo_pais'},
					{data:'nombre_comun'},
					{data:'cargo'},
					{data:'numero_serie'},
					{data:'tipo'},
					{data:'entidad_emisora'},
					{data:'fecha_inicio'},
					{data:'fecha_fin'},
					{data:null,render:function(data){
						if( data.firma == 1){
							return `<i class="fa fa-check-circle-o fa-3x text-success"></i>`;
						}else{
							return ``;
						}
					},'className':'text-center'},
					{data:null,render:function(data){
						return `

						<button data-id="${data.id}" type="button" class="btn btn-secondary btn-sm btn-firma">
							<i class="fa fa-pencil"></i>
						</button>

						<button data-id="${data.id}" type="button" class="btn btn-primary btn-sm btn-edit">
							<i class="fa fa-edit"></i>
						</button>

						<button data-id="${data.id}" type="button" class="btn btn-danger btn-sm btn-delete">
							<i class="fa fa-trash"></i>
						</button>
						`;
					},}
				]

			});
		}

		loadData();

		//Cargar Modal Agregar
		$(document).on('click','.btn-agregar',function(e){

			$('#agregar')[0].reset();
			$('.id').val('');

			$('.modal-title').html('Agregar');
			$('.btn-submit').html('Guardar');
			$('#modal-agregar').modal('show');

			e.preventDefault();
		});

		//Cargar Modal Actualizar
		$(document).on('click','.btn-edit',function(e){
			$('#agregar')[0].reset();
			id = $(this).data('id');

			url_edit = '{{ route('certificados.edit',[':id']) }}';
			url_edit = url_edit.replace(':id',id);

			$.ajax({
				url:url_edit,
				type:'GET',
				data:{},
				dataType:'JSON',
				success:function(data){
					$('.id').val(data.id);
					$('.nif').val(data.nif);
					$('.codigo_pais').val(data.codigo_pais);
					$('.numero_serie').val(data.numero_serie);
					$('.nombre_comun').val(data.nombre_comun);
					$('.cargo').val(data.cargo);
					$('.tipo_certificado').val(data.tipo_certificado_id);
					$('.entidad_emisora').val(data.entidad_emisora);
					$('.fecha_inicio').val(data.fecha_inicio);
					$('.fecha_fin').val(data.fecha_fin);
				}
			});

			$('.modal-title').html('Actualizar');
			$('.btn-submit').html('Guardar');
			$('#modal-agregar').modal('show');

			e.preventDefault();
		});

		//Agregar
		$(document).on('submit','#agregar',function(e){

			parametros = $(this).serialize();

			$.ajax({
				url:'{{ route('certificados.store') }}',
				type:'POST',
				data:parametros,
				dataType:'JSON',
				beforeSend:function(){
					Swal.fire({
						title:'Cargando',
						text :'Espere un momento...',
						imageUrl:'{{ asset('img/loader.gif') }}',
						showConfirmButton:false,
						allowOutsideClick:false
					});
				},
				success:function(data){
					Swal.fire({
						title:data.title,
						text :data.text,
						icon :data.icon,
						timer:3000,
						showConfirmButton:false
					});

					$('#modal-agregar').modal('hide');
					$('#consulta').DataTable().ajax.reload();
				}
			});

			e.preventDefault();
		});


		//Eliminar
		$(document).on('click','.btn-delete',function(e){

			id = $(this).data('id');

			Swal.fire({
			  title: '¿Estás Seguro?',
			  text: "EL registro se eliminará de forma permanente",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Si, estoy seguro.'
			}).then((result) => {
			  if (result.isConfirmed) {
				url_destroy = '{{ route('certificados.destroy',[':id']) }}';
				url_destroy = url_destroy.replace(':id',id);
			  	$.ajax({
			  		url:url_destroy,
			  		type:'DELETE',
			  		data:{'_token':'{{ csrf_token() }}'},
			  		dataType:'JSON',
			  		beforeSend:function(){
						Swal.fire({
							title:'Cargando',
							text :'Espere un momento...',
							imageUrl:'{{ asset('img/loader.gif') }}',
							showConfirmButton:false,
							allowOutsideClick:false
						});
			  		},
			  		success:function(data){
						Swal.fire({
							title:data.title,
							text :data.text,
							icon :data.icon,
							timer:3000,
							showConfirmButton:false
						});
						$('#consulta').DataTable().ajax.reload();
			  		}
			  	});
			  }
			});

			e.preventDefault();
		});

		//Cargar Modal Firma
		$(document).on('click','.btn-firma',function(e){
			$('#agregar-firma')[0].reset();
			id = $(this).data('id');
			$('.id').val('').val(id);
			$('.modal-title').html(`Actualizar Firma Id: ${id}`);
			$("#modal-agregar-firma").modal('show');

			e.preventDefault();
		});

		//Agregar Firma
		$(document).on('submit','#agregar-firma',function(e){

			parametros = new FormData(this);

			$.ajax({
				url:'{{ route('certificados.store_firma') }}',
				type:'POST',
				data:parametros,
				dataType:'JSON',
		        contentType: false,
		        cache: false,
		        processData:false,
				beforeSend:function(){
					Swal.fire({
						title:'Cargando',
						text :'Espere un momento...',
						imageUrl:'{{ asset('img/loader.gif') }}',
						showConfirmButton:false,
						allowOutsideClick:false
					});
				},
				success:function(data){
					Swal.fire({
						title:data.title,
						text :data.text,
						icon :data.icon,
						showConfirmButton:true
					});
					if( data.icon == 'success' ){
						$('#modal-agregar-firma').modal('hide');
						$('#consulta').DataTable().ajax.reload();
					}
				}
			});

			e.preventDefault();
		});

	</script>
@endsection
