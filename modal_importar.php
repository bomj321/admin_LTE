<div class="modal fade" id="importar">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Importar Archivo Excel</h4>
              </div>
        <div class="modal-body"> 
          <style type="text/css">
            .mensaje_alerta_importacion{
              font-size: 2em;              
            }
          </style>
        <div id="mensaje"></div>        
                    <form class="form-horizontal" enctype="multipart/form-data" onsubmit="importar(); return false" id="importar_data" action="">
				<!--	<form class="form-horizontal" enctype="multipart/form-data" method="POST" action="ajax/importar_data.php">-->
                            <div class="form-group col-md-12">
		                              <label class="control-label">Seleccione Archivo</label>
		                                <input class="form-control" required="true" type="file" name="importar_archivo">

                             </div>

                             <div class="form-group col-md-12">
		                              <label class="control-label">Ingrese Clave</label>
		                                <input class="form-control" type="text" placeholder="Clave" id="clave_importar" required="true" name="importar_clave">

                             </div>

                             <button type="submit" class="btn btn-lg btn-primary">Importar</button>                                

                    </form>
        </div>            
              <br>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->