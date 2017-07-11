<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

 <link href="<?php echo getUrl(); ?>/lib/bootstrap-3/css/bootstrap-datepicker.min.css" rel="stylesheet">
<script src="<?php echo getUrl(); ?>/lib/bootstrap-3/js/bootstrap-datepicker.min.js"></script>

  
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>
    <br><br>
    <form id="formPauta" action="main/formcalendario2" method="POST" > 
       
                <div class="row">
                    <div class="col-md-12">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Resultado Seguimiento:<font size="2" color="red"> </font></div>
                                        <select required=""  class="form-control" name="cboResultadoSeguimiento" id="cboResultadoSeguimiento">
                                            <option value="0">Seleccione</option>
                                            <option value="1">Generar cita</option>
                                            <option value="2">No contactado</option>
                                            <option value="3">No Desea</option>
                                        </select>
                                  </div>
                                </div>
                              </div>

                    </div>
        <div id="divCita" style="display: none;" >
            <div class="row">
             <div class="col-md-12">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Sede:<font size="2" color="red"> </font></div>
                                        <select required="" class="form-control" name="txtSede" id="txtSede">
                                            <option value="0">Seleccione</option>
                                            <option value="1">Benavides</option>
                                            <option value="2">San Borja</option>
                                            <option value="3">Surco</option>
                                            <option value="4">La Molina</option>
                                        </select>
                                  </div>
                                </div>
                              </div>
                </div>
            <div class="row">
             <div class="col-md-12">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Área:<font size="2" color="red"> </font></div>
                                        <select required="" class="form-control" name="txtArea" id="txtArea">
                                            <option value="0">Seleccione</option>
                                            <option value="4">Vacunación</option>                                           
                                        </select>
                                  </div>
                                </div>
                              </div>
                </div>
            <div class="row">
             <div class="col-md-12">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Servicio:<font size="2" color="red"> </font></div>
                                        <select required="" class="form-control" name="txtServicio" id="txtServicio">
                                            <option value="0">Seleccione</option>
                                            <option value="6">Vacunación / Desparasitación</option>                                           
                                        </select>
                                  </div>
                                </div>
                              </div>
                </div>
            <div class="row">
             <div class="col-md-12" id="divFechaInicio">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Fecha de cita:<font size="2" color="red"> </font></div>
				<input type="text" readonly class="form-control" data-provide="datepicker" name="txtFechaInicio" id="txtFechaInicio">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                 
								 </div>
                                </div>
                              </div>
                </div>
            <div class="row">
                <div class="col-md-12">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Turno de Cita:<font size="2" color="red"> </font></div>
                                        <select required="" class="form-control" name="txtTurno" id="txtTurno">
                                            <option value="0">Seleccione</option>           
                                            <option value="10:00">10:00 - 11:00</option>
                                            <option value="11:00">11:00 - 12:00</option>
                                            <option value="12:00">12:00 - 13:00</option>
                                            <option value="13:00">13:00 - 14:00</option>
                                            <option value="14:00">14:00 - 15:00</option>
                                            <option value="15:00">15:00 - 16:00</option>
                                            <option value="16:00">16:00 - 17:00</option>
                                            <option value="17:00">17:00 - 18:00</option>
                                        </select>
                                  </div>
                                </div>
                              </div>
        </div>
            
            </div>
    <div class="row">
        <div class="col-md-12">
                                <div class="form-group">
                                    <label class="sr-only" for="txtCod_Mod"></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Comentarios:<font size="2" color="red"></font></div>                                   
                                        <textarea class="form-control"maxlength="150" rows="5" name="txtComentarios" id="txtComentarios"></textarea>
                                    </div>
                                </div>
                            </div>
          </div>
        
                
    
    </div>
         
              
  
       
        <div class="row" id="crearCal">
            <div class="col-md-6">
              <input type="button" class="btn btn-danger" id="save" name="save" value="Agregar"/>
            </div>
            
          </div>
         </form>   
    <br><br><br>
 <div id="myModal_total_formularios" >
                
        </div>
</body>

<script type="text/javascript">
    $(document).ready(function() {
        
        $("#txtFechaInicio").change(function() {
               var ini = $("#txtFechaInicio").val();              
               var ini2 = $("#txtFechaInicio").val();
                 ini = ini.substring(6,10) + ini.substring(3,5) + ini.substring(0,2) 
   
              if(ini.length > 0){
                if( ini < '20170626'){
                    alert('la fecha de Inicio no puede ser menor a la fecha actual')
                    $("#txtFechaInicio").val('');
                    return null;
                }
            }
            });
            
        $('#txtFechaInicio').datepicker({
                format: 'dd/mm/yyyy',
                language: 'es',
                autoclose: true
            });
        $("#cboResultadoSeguimiento").change(function (){
           var resulado = $("#cboResultadoSeguimiento").val();
           if(resulado == 1){
              $("#divCita").show(); 
           }else{
               $("#divCita").hide(); 
           }
            
            
        })
        $("#save").click(function () {
             callMODAL_Bootstrap_Confirma("my_modal_Confirma", "Confirmación", '<h5>¿Desea guardar los cambios realizados?</h5>');
         
        })
        
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
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" onclick="guardarSeg()" data-dismiss=\"modal\">Guardar</button>';
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" onclick="cerrarModal()" data-dismiss=\"modal\">Cancelar</button>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';

             //alert(modal);

                $("#myModal_total_formularios").html(modal);
                $("#"+id_modal).modal();
            }
            
            function guardarSeg(){
                  var cboResultadoSeguimiento = $("#cboResultadoSeguimiento").val();
                   var txtSede = $("#txtSede").val();
                   var txtArea = $("#txtArea").val();
                   var txtServicio = $("#txtServicio").val();
                   var txtFechaInicio = $("#txtFechaInicio").val();
                   var txtTurno = $("#txtTurno").val();
                   var txtComentarios = $("#txtComentarios").val();
                   var IdMascota = '<?php echo $idMascota;?>';
                   var IdCliente = '<?php echo $_SESSION["CLIENTESEGUIMIENTO_SESSION"];?>';
                        
                $.ajax({
                type: "POST",
                url: '<?php echo getUrl().'/seguimiento/registroSeguimientoServ';?>',
                data:  {cboResultadoSeguimiento:cboResultadoSeguimiento,txtSede:txtSede,txtArea:txtArea,txtServicio:txtServicio,txtFechaInicio:txtFechaInicio,
                        txtTurno:txtTurno,txtComentarios:txtComentarios,IdMascota:IdMascota,IdCliente:IdCliente},
                dataType: "json",
                success: function(data) {
                    
                    if(data == '1'){
                        alert("Registro guardado satisfactoriamente");
                        parent.finalizaRegistro()
            
                    }else{
                             alert('Existe un calendario con los datos ingresados');
                        }
                    
                    
                }
            });
            
            }
    
      </script>