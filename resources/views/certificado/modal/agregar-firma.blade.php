	<!-- Modal Agregar Firma -->
<form id="agregar-firma" autocomplete="off">
	<div class="modal fade" id="modal-agregar-firma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        @csrf
	        <input type="hidden" name="id" class="id">
	        <div class="form-group">
	        	<label>Archivo Pfx</label>
	        	<input type="file" name="archivo_pfx" class="form-control">
	        </div>
	        <div class="form-group">
	        	<label>Contraseña</label>
	        	<input type="password" name="password" class="form-control">
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	        <button type="submit" class="btn btn-primary">Grabar</button>
	      </div>
	    </div>
	  </div>
	</div>
</form>