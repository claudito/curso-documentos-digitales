<!-- Modal Agregar -->
<form id="agregar" autocomplete="off">
  <div class="modal fade" id="modal-agregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <label>Nif</label>
            <input type="text" name="nif" class="nif form-control" required>
           </div>

           <div class="row">
             <div class="col">
               <div class="form-group">
                <label>Código de Pais</label>
                <input type="text" name="codigo_pais" class="codigo_pais form-control" required>
               </div> 
             </div>
             <div class="col">
               <div class="form-group">
                <label>Número de Serie</label>
                <input type="text" name="numero_serie" class="numero_serie form-control" required>
               </div>
             </div>
           </div>

           <div class="form-group">
            <label>Nombre Común</label>
            <input type="text" name="nombre_comun" class="nombre_comun form-control" required>
           </div>

           <div class="form-group">
            <label>Cargo</label>
            <input type="text" name="cargo" class="cargo form-control" required>
           </div>



           <div class="form-group">
            <label>Tipo de Certificado</label>
            <select name="tipo_certificado" class="tipo_certificado form-control" required>
              <option value="">Seleccionar</option>
              @foreach($tipo_certificados as $key =>$value )
                <option value="{{ $value->id }}">{{ $value->nombre }}</option>
              @endforeach
            </select>
           </div>

           <div class="form-group">
            <label>Entidad Emisora</label>
            <input type="text" name="entidad_emisora" class="entidad_emisora form-control" required>
           </div>

           <div class="row">
             <div class="col">
               <div class="form-group">
                <label>Fecha de Inicio</label>
                <input type="date" name="fecha_inicio" value="{{ $fecha_inicio }}"  class="fecha_inicio form-control" required>
               </div>
             </div>
             <div class="col">
               <div class="form-group">
                <label>Fecha de Fin</label>
                <input type="date" name="fecha_fin" value="{{ $fecha_fin }}" class="fecha_fin form-control" required>
               </div>
             </div>
           </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary btn-submit">Save changes</button>
      </div>
    </div>
  </div>
</div>
</form>