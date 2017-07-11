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
    <form id="frmReultado" action="main/formcalendario2" method="POST" > 
        <input type="hidden" id="idMascota" name="idMascota" value="<?php echo $idMascota;?>" />
        <input type="hidden" id="idCalendario" name="idCalendario" value="<?php echo $idCalendario;?>" />
        <input type="hidden" id="farmaco_especie" name="farmaco_especie" value="<?php echo $farmaco_especie;?>" />
        <input type="hidden" id="pauta" name="pauta" value="<?php echo $pauta;?>" />
        <input type="hidden" id="idCita" name="idCita" value="<?php echo $_SESSION["CLIENTEATENCION_SESSION"][0]["idCita"];?>" />
        
                        <div class="row" >
                    <div class="col-md-12" id="dvResultado">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon" >Tipo de Resultado:<font size="2" color="red"> </font></div>
                                        <select required=""  class="form-control" name="cboReultado" id="cboReultado">
                                           
                                             <?php
                                                    foreach($getResultado as $via3){?>
                                                    <option value="<?php echo $via3["id"]?>"><?php echo $via3["nombre"]?></option>
                                             <?php }?>
                                        </select>
                                  </div>
                                </div>
                              </div>
                    </div>
        
        <div class="row" id="divAmbito">
                    <div class="col-md-12" id="dvAmbito">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Ámbito:<font size="2" color="red"> </font></div>
                                        <select required=""  class="form-control" name="cboAmbito" id="cboAmbito">
                                           
                                            <?php
                                                    foreach($getAmbito as $via4){?>
                                                    <option value="<?php echo $via4["id"]?>"><?php echo $via4["nombre"]?></option>
                                             <?php }?>
                                        </select>
                                  </div>
                                </div>
                              </div>
                    </div>
        
        <div class="row" id="divOrigen" style="display: none;" >
                    <div class="col-md-12" id="dvOrigen">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Origen:<font size="2" color="red"> </font></div>
                                        <select required=""  class="form-control" name="cboOrigen" id="cboOrigen">
                                            <option value="0">Seleccione</option>
                                            <?php
                                                    foreach($getOrigen as $via5){?>
                                                    <option value="<?php echo $via5["id"]?>"><?php echo $via5["nombre"]?></option>
                                             <?php }?>
                                        </select>
                                  </div>
                                </div>
                              </div>
                    </div>
        
    <div class="row">
        
        <div class="col-md-12" id="dvResultadotxt">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Descripción Resultado:<font size="2" color="red"> </font></div>
                                        <textarea class="form-control"maxlength="150" rows="5" name="txtResultado" id="txtResultado"></textarea>
                                   
                                  </div>
                                </div>
                              </div>
    </div>
         
              <div class="row" id="divFecApli" > 
                    <div class="col-md-12" id="txtApliacion">
                                <div class="form-group">
                                    <label class="sr-only" for="txtCod_Mod"></label>
                                    <div class="input-group">
                                        <div class="input-group-addon" id="FechaAteAp">Fecha de Aplicación:<font size="2" color="red"> </font></div>
				<input type="text" readonly class="form-control" name="txtFechaAplicacionOnly" id="txtFechaAplicacionOnly">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                  <div class="col-md-12" id="dateApliacion" style="display: none;">
                                <div class="form-group">
                                    <label class="sr-only" for="txtCod_Mod"></label>
                                    <div class="input-group">
                                        <div class="input-group-addon" id="FechaAteAp2">Fecha de Aplicación:<font size="2" color="red"> </font></div>
				<input type="text" readonly class="form-control" data-provide="datepicker" name="txtFechaAplicacionDate" id="txtFechaAplicacionDate">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                    </div>
                                </div>
                            </div> 
    </div>

        <div class="row" id="crearCal">
            <div class="col-md-6">
              <input type="button" class="btn btn-danger" id="save" name="save" value="Grabar"/>
            </div>
            
          </div>
         </form> 
     <div id="myModal_total_formularios" >
                
        </div>
    
    <br>
</body>

<script type="text/javascript">
	$(document).ready(function() {
            
            var hoy = new Date();
            var dd = '00'+(hoy.getDate());
            var mm = '00'+(hoy.getMonth()+1); //hoy es 0!
            var yyyy = hoy.getFullYear();
            
            if(mm.length == 3){
                mm = mm.substr(1)
            }else{
                mm = mm.substr(2)
            }
           
            if(dd.length == 3){
                dd = dd.substr(1)            
            }else{
                dd = dd.substr(2)               
            }
            
            var dia = yyyy+''+mm+''+dd
            
            $('#txtFechaAplicacionDate').datepicker({
                    format: 'dd/mm/yyyy',
                    language: 'es',
                    autoclose: true
                    });
            
             
             
              $("#txtFechaAplicacionDate").change(function() {
               var ini = $("#txtFechaAplicacionDate").val();
               
                 ini = ini.substring(6,10) + ini.substring(3,5) + ini.substring(0,2) 
               
                
                if( ini < '20060622'){
                    alert('la fecha de Aplicacion no puede ser menor a 10 año de la fecha actual')
                    $("#txtFechaAplicacionDate").val('');
                    return null;
                }
                
                 if( ini > dia){
                    alert('la fecha de Aplicacion no puede ser mayor a la fecha actual')
                    $("#txtFechaAplicacionDate").val('');
                    return null;
                }
                 
            });
            
             $("#cboReultado").change(function (){
                 var resultado = $("#cboReultado").val()
                 if(resultado==41){
                     $("#FechaAteAp").html('Fecha de Aplicación:')
                     $("#FechaAteAp2").html('Fecha de Aplicación:')
                     
                 }else{
                     $("#FechaAteAp").html('Fecha de Atención:')
                     $("#FechaAteAp2").html('Fecha de Atención:')
                 }
                 
                 
             });
            $("#cboAmbito").change(function (){
               var ambito = $("#cboAmbito").val();
               
               if(ambito != 44){
                   $("#divOrigen").show();
                   $("#txtApliacion").hide();
                  $("#dateApliacion").show();
               }else{
                   $("#divOrigen").hide();
                   $("#cboOrigen").val(0);
                   $("#txtApliacion").show();
                  $("#dateApliacion").hide();
               }

            });
             
            
            $('#txtFechaAplicacionOnly').val(dd+'/'+mm+'/'+yyyy);
            
            
            
             $("#save").click(function (){
               
             var val = validar();
               if(val == 0){
                                  
                //guardarCal();
                confirmaRes();
            }else{
            alert('Ingresar datos indicados')
            }
            });
            
           
           
        });
        
         function confirmaRes(){

            callMODAL_Bootstrap_Resultado("my_modal_Resultado", "Confirmación", '<h5>¿Desea guardar los cambios realizados?</h5>');
           }
           
             function callMODAL_Bootstrap_Resultado(id_modal,titulo, contenido) {
            
                var modal = '';
                modal += '<div class="modal fade" id="'+id_modal+'\" data-backdrop="static"  data-keyboard="false"  tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">';
                modal += '<div class="modal-dialog\" style=\"width:350px;height:400px;left:140px\" role=\"document\">';
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
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" onclick="guardarResultado()" data-dismiss=\"modal\">Guardar</button>';
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" onclick="cerrarModal()" data-dismiss=\"modal\">Cancelar</button>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';

             //alert(modal);

                $("#myModal_total_formularios").html(modal);
                $("#"+id_modal).modal();
            }
            function guardarResultado(){
                var idCalendario = $("#idCalendario").val()
                 $.ajax({
                type: "POST",
                url: '<?php echo getUrl().'/atencion/registraResultado';?>',
                data:  $("#frmReultado").serialize(),
                dataType: "json",
                success: function(data) {
                    
                    if(data == '1'){
                        alert('Resultado grabado satisfactoriamente');
                        parent.cerrarModalR(idCalendario);
                    /*    alert('Registro guardado satisfactoriamente');
                        $("#txtCalendario").val('');
                        $("#cboEspecie").val('');
                        $("#cboTipoCalendario").val('');
                        $("#txtFechaInicio").val('');
                        $("#txtFechaFin").val('');
                        listaCalendario(0,10);*/
                    }
                }
            });
            }
            
              function validar(){
        
                var cboReultado = $("#cboReultado").val();       
                var cboAmbito = $("#cboAmbito").val();     
                var cboOrigen = $("#cboOrigen").val();
                var txtResultado = $("#txtResultado").val();
                var txtFechaAplicacionOnly = $("#txtFechaAplicacionOnly").val();
                var txtFechaAplicacionDate = $("#txtFechaAplicacionDate").val();
             
               // alert(txtCalendario.length+"-"+cboEspecie+"-"+cboTipoCalendario+"-"+txtFechaInicio.length+"-"+txtFechaFin.length)
                var retorno = 0;
 
               
 
                    if( cboReultado.length == '0' ) { $("#diResultado").addClass('has-error') ; retorno += 1 }else{  $("#diResultado").removeClass('has-error');  retorno += 0 ;}
                    if( cboAmbito == '0'  ) { $("#diAmbito").addClass('has-error') ; retorno += 1 }else{  $("#diAmbito").removeClass('has-error');  retorno += 0 ;}
                        if(cboAmbito != 44){
                            if( cboOrigen == '0'  ) { $("#dvOrigen").addClass('has-error') ; retorno += 1 }else{  $("#dvOrigen").removeClass('has-error');  retorno += 0 ;}
                            if( txtFechaAplicacionDate == ''  ) { $("#dateApliacion").addClass('has-error') ; retorno += 1 }else{  $("#dateApliacion").removeClass('has-error');  retorno += 0 ;}
                        }else{
                        if( txtFechaAplicacionOnly == ''  ) { $("#txtApliacion").addClass('has-error') ; retorno += 1 }else{  $("#txtApliacion").removeClass('has-error');  retorno += 0 ;}
                        }
                    if( txtResultado == '' ) {  $("#dvResultadotxt").addClass('has-error') ; retorno += 1 }else{  $("#dvResultadotxt").removeClass('has-error');  retorno += 0 ;}
                   
                    return retorno;
            }
            
 </script>