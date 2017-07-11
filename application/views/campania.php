<div class="col-xs-12">
    <div class="box">
      <div class="contenido-ficha">
                            <section>
                            <h1 class="text-center">Campaña</h1>
                            <br><br>
                            <form id="frmCalendario" action="main/formcalendario2" method="POST" >
                                <input type="hidden" id="idHidden" name="idHidden" value="0"/>
          <div class="row">
                              <div class="col-md-12" id="divCalendario">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Nombre de Campaña:<font size="2" color="red"> </font></div>
                                    <input type="text" maxlength="100" class="form-control" disabled="" id="txtNombre" name="txtNombre" value="">
                                  </div>
                                </div>
                              </div>
              </div>
              <div class="row">
              <div class="col-md-12" id="divCalendario">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Dirección de Campaña:<font size="2" color="red"> </font></div>
                                    <input type="text" maxlength="100" class="form-control" disabled="" id="txtDireccion" name="txtDireccion" value="">
                                  </div>
                                </div>
                              </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-md-6" id="divEspecie">
                                <div class="form-group">
                                    <label class="sr-only" for="txtCod_Mod"></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Tipo de Fármaco:<font size="2" color="red"></font></div>      
                                         <input type="text" maxlength="100" class="form-control" disabled="" id="txtTipoFarmaco" name="txtTipoFarmaco" value="">
                                    </div>
                                </div>
                            </div>
                                    <div class="col-md-6" id="divTipoCalendario">
                                <div class="form-group">
                                    <label class="sr-only" for="txtCod_Mod"></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Especie:<font size="2" color="red"></font></div> 
                                         <input type="text" maxlength="100" class="form-control" disabled="" id="txtEspecie" name="txtEspecie" value="">                                        
                                    </div>
                                </div>
                            </div>
            
          </div>

                            </form>
          </section>
          <br>

          <section>
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Turnos de Campaña</h3>
                    </div>
                    <div class="panel-body">
                        <div id="table-responsive" class="table-responsive">

                            <table id="tblTurno" name="tblTurno" class="table table-striped">
                                <tbody><tr>
                        <th >Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Estado</th>
                        </tr></tbody>
                          <?php
                            foreach($_SESSION["CAMPANIATURNO_SESSION"] as $via2){?>
                                <tr>
                                    <td><?php echo $via2["fechaInicio"]?></td>
                                    <td><?php echo $via2["fechaFin"]?></td>
                                    <td><?php echo $via2["estado"]?></td>
                                </tr>
                            
                                
                     <?php }?>
                    
                    </table>
                            <div id="totalReg"></div>
                             <div id="paginacion" >
                                                                
                                 </div>
                    </div>
                    </div>
                    </div>
                    </section>
          

            <div class="row" id="editarCalendario"  >                    
            <div class="col-md-6" >
              <input type="button" class="btn btn-danger" id="finish" name="finish" value="Finalizar Atención de Turno"/>
              <input type="button" class="btn btn-primary" id="registrar" name="registrar" value="Registrar Atenciones"/>
            </div>
            </div>
          
          
        <div id="myModal_total_formularios" >
                
        </div>
          
                    <br><br><br><br><br><br>
          </div>
          </div>
    </div>

<script type="text/javascript">
   
	$(document).ready(function() {
            $("#txtNombre").val('<?php echo $_SESSION["CAMPANIAATENCION_SESSION"][0]["nombreCampania"];?>');
            $("#txtDireccion").val('<?php echo $_SESSION["CAMPANIAATENCION_SESSION"][0]["direccion"];?>');
            $("#txtTipoFarmaco").val('<?php echo $_SESSION["CAMPANIAATENCION_SESSION"][0]["tipoFarmaco"];?>');
            $("#txtEspecie").val('<?php echo $_SESSION["CAMPANIAATENCION_SESSION"][0]["DescripcionEspecie"];?>');
                
                $("#registrar").click(function (){
                    window.location = '<?php echo getUrl().'/campania/clientes';?>';
                })
                $("#finish").click(function (){
                    callMODAL_Bootstrap_Confirma("my_modal_Confirma", "Confirmación", '<h5>¿Desea finalizar el turno de atención?</h5>');
                   
                });
            });   
            
           function callMODAL_Bootstrap_Confirma(id_modal,titulo, contenido) {
            $("#myModal_total_formularios").html('');
                var modal = '';
                modal += '<div class="modal fade" id="'+id_modal+'\" data-backdrop="static"  data-keyboard="false"  tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">';
                modal += '<div class="modal-dialog\" style=\"width:350px;height:400px;\" role=\"document\">';
                modal += '<div class="modal-content">';
                modal += '<div class="modal-header">';
                modal += '<button type=\"button\" class="close" data-dismiss=\"modal\" aria-label=\"Close\" ><span aria-hidden=\"true\" onclick="cerrarModal()">&times;</span></button>';
                modal += '<div class="modal-header">';
                modal += '<h4 class="modal-title" id=\"myModalLabel\">'+titulo+'</h4>';
                modal += '</div>';
                modal += '<div class="modal-body">';//style="max-height: 720px;overflow-y:auto;"
                modal += contenido;
                modal += '</div>';
                modal += '<div class=\"modal-footer\">';
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" onclick="finalizar()" data-dismiss=\"modal\">Si</button>';
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" onclick="cerrarModal()" data-dismiss=\"modal\">No</button>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';

             //alert(modal);

                $("#myModal_total_formularios").html(modal);
                $("#"+id_modal).modal();
            }
            
            function finalizar(){
                window.location = '<?php echo getUrl().'/main/listaCampania'; ?>';
            } 
</script>