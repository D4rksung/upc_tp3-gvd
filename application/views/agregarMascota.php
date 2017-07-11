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
        <input type="hidden" name="idClienteH" id="idClienteH" value="0" />
                <div class="col-md-6">
                    <div class="col-md-6" id="divEspecie">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Especie:<font size="2" color="red"> </font></div>
                                        <select required="" class="form-control" name="cboEspecie" id="cboEspecie">
                                            <option value="0">Seleccione</option>
                                             <?php
                                                    foreach($getEspecie as $via){?>
                                                    <option value="<?php echo $via["id"]?>"><?php echo $via["nombre"]?></option>
                                             <?php }?>
                                        </select>
                                  </div>
                                </div>
                              </div>
                    <div class="col-md-6" id="divRaza">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Raza:<font size="2" color="red"> </font></div>
                                       <select required="" class="form-control" name="cboRaza" id="cboRaza">
                                            <option value="0">Seleccione</option>
                                        </select>
                                  </div>
                                </div>
                              </div>
              </div>                       
              
    <div class="col-md-6">   
            <div class="col-md-6" id="divNombre">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label> 
                                  <div class="input-group">
                                    <div class="input-group-addon">Nombre:<font size="2" color="red"> </font></div>
                                    <input type="text" class="form-control" required="" id="txtNombre" name="txtNombre"   >                                          
                                  </div>
                                </div>
                            </div> 
        
               <div class="col-md-6" id="divGenero">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Género:<font size="2" color="red"> </font></div>
                                    <select required="" class="form-control" name="cboGenero" id="cboGenero">
                                            <option value="0">Seleccione</option>
                                            <option value="Macho">Macho</option>
                                            <option value="Hembra">Hembra</option>
                                        </select>
                                  </div>
                                </div>
                            </div>  
    
    </div>
        <div class="col-md-6">
            <div class="col-md-6" id="divTamaño">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Tamaño:<font size="2" color="red"> </font></div>
                                    <select required="" class="form-control" name="cboTamaño" id="cboTamaño">
                                            <option value="0">Seleccione</option>
                                            <option value="1">Pequeño</option>
                                            <option value="2">Mediano</option>
                                            <option value="3">Grande</option>
                                        </select> </div>
                                </div>
                            </div> 
        
               <div class="col-md-6" id="divPeso">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Peso en Kilogramos:<font size="2" color="red"> </font></div>
                                    <input type="text" class="form-control" required="" id="txtPeso" name="txtPeso" >
                                          
                                  </div>
                                </div>
                            </div>  
    
    </div>
         
 <div class="col-md-6"> 
   <div class="col-md-6" id="divNacimiento">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label> 
                                  <div class="input-group">
                                    <div class="input-group-addon">Fecha de Nacimiento<font size="2" color="red"> </font></div>                                     
                                        <input type="text" readonly class="form-control" data-provide="datepicker" name="txtNacimiento" id="txtNacimiento">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>     
                                  </div>
                                </div>
                            </div>
       </div>
     </div>
       
  
     
        <div class="col-md-6" id="crearCal">
            <div class="col-md-6">
              <input type="button" class="btn btn-danger" id="save" name="save" value="Registrar"/>
            </div>
            
          </div>
         </form>   
    <br>

     <div id="myModal_total_formularios" >
                
        </div>
    
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
            
            
        $("#txtNacimiento").change(function() {
            var nac =  $("#txtNacimiento").val()
            nac = nac.substring(6,10) + nac.substring(3,5) + nac.substring(0,2) 
            if( nac >= dia){
                    alert('la fecha de nacimiento no puede ser mayor a la fecha actual')
                    $("#txtNacimiento").val('');
                     return null;
                }
           
        });
         
            
            $('#txtNacimiento').datepicker({
                format: 'dd/mm/yyyy',
                language: 'es',
                autoclose: true
            });
            
            $("#cboEspecie").change(function (){
                
                 var cbo = ' ';
                 var idEspecie = $("#cboEspecie").val();
                 
                $.ajax({
                    type: "POST",
                    url: '<?php echo getUrl().'/campania/getRaza';?>',
                    data:  {idEspecie:idEspecie},
                    dataType: "json",
                    success: function(data) {
                        $("#cboRaza").html('');
                         cbo += "<option value=\"0\">Seleccione</option>";
                                        $.each( data, function( key, value ) {
                                          //  alert('1.2')
                                          //  alert('idd'+value["id"])
                                           
                                           cbo += "<option value=\""+value["id"]+"\" >"+value["nombre"]+"</option>";
                                        });   
                                         $("#cboRaza").html(cbo);
                    }
                });
            });
            $("#save").click(function (){
            
             var val = validar(1);
         
                if(val == 0){
                //alert('2')
                     callMODAL_Bootstrap_ConfirmaMasc("my_modal_ConfirmaMascotaadd", "Confirmación", '<h5>¿Desea guardar los datos ingresados?</h5>');
        

                    }else{
                        alert('Ingresar datos indicados')
                    }
            });
            
        });
        
          function validar(flag){
                var cboEspecie = $("#cboEspecie").val();       
                var cboRaza = $("#cboRaza").val();  
                var txtNombre = $("#txtNombre").val();   
                var cboGenero = $("#cboGenero").val();
                var cboTamaño = $("#cboTamaño").val();
                var txtPeso = $("#txtPeso").val();      
                var txtNacimiento = $("#txtNacimiento").val();
             //cboTipoDoc txtDocumento txtNombre txtApellidos txtDireccion txtTelefono  txtNacimiento txtEmail
               // alert(txtCalendario.length+"-"+cboEspecie+"-"+cboTipoCalendario+"-"+txtFechaInicio.length+"-"+txtFechaFin.length)
                var retorno = 0;
 
                if(flag == '1'){
 
                    if( cboEspecie == '0' ) { $("#divEspecie").addClass('has-error') ; retorno += 1 }else{  $("#divEspecie").removeClass('has-error');  retorno += 0 ;}
                    if( cboRaza == '0'  ) { $("#divRaza").addClass('has-error') ; retorno += 1 }else{  $("#divRaza").removeClass('has-error');  retorno += 0 ;}
                    if( txtNombre == '' ) {  $("#divNombre").addClass('has-error') ; retorno += 1 }else{  $("#divNombre").removeClass('has-error');  retorno += 0 ;}
                    if( cboGenero == '0' ) {  $("#divGenero").addClass('has-error') ; retorno += 1 }else{  $("#divGenero").removeClass('has-error');  retorno += 0 ;}
                    if( cboTamaño == '0' ) {  $("#divTamaño").addClass('has-error') ; retorno += 1 }else{  $("#divTamaño").removeClass('has-error');  retorno += 0 ;}
                    if( txtPeso == '' ) {  $("#divPeso").addClass('has-error') ; retorno += 1 }else{  $("#divPeso").removeClass('has-error');  retorno += 0 ;}
                    if( txtNacimiento == '' ) {  $("#divNacimiento").addClass('has-error') ; retorno += 1 }else{  $("#divNacimiento").removeClass('has-error');  retorno += 0 ;}
                   
                 }
                     
                    
                    return retorno;
            }
            
        
            function callMODAL_Bootstrap_ConfirmaMasc(id_modal,titulo, contenido) {
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
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" onclick="guardarMascota()" data-dismiss=\"modal\">Guardar</button>';
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" data-dismiss=\"modal\">Cancelar</button>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';

             //alert(modal);

                $("#myModal_total_formularios").html(modal);
                $("#"+id_modal).modal();
            }
            
             function  guardarMascota(){
                var cboEspecie = $("#cboEspecie").val();       
                var cboRaza = $("#cboRaza").val();  
                var txtNombre = $("#txtNombre").val();   
                var cboGenero = $("#cboGenero").val();
                var cboTamaño = $("#cboTamaño").val();
                var txtPeso = $("#txtPeso").val();      
                var txtNacimiento = $("#txtNacimiento").val();
                var idCliente = '<?php echo $id;?>';
                $.ajax({
                type: "POST",
                url: '<?php echo getUrl().'/campania/formMascota';?>',
                data:  {cboEspecie:cboEspecie,cboRaza:cboRaza,txtNombre:txtNombre,cboGenero:cboGenero,cboTamaño:cboTamaño,
                        txtPeso:txtPeso,txtNacimiento:txtNacimiento,idCliente:idCliente},
                dataType: "json",
                success: function(data) {
                    /*
                    $.each( data, function( key, value ) {
                       // alert('id:'+value["id"])
                        alert('Mascota registrada satisfactoriamente');
                        //$("#idClienteH").val(value["id"]);
                        actualizarMascota(idCliente);
                    });*/
                   // alert(data)
                    if(data == '1'){
                        alert('Registro guardado satisfactoriamente');
                        actualizarMascota(idCliente)
                    }
                     /*   $("#txtPauta").val('');
                        $("#cboPeriodo").val('0');
                        $("#cboTipoPauta").val('0');
                        $("#txtOrden").val('');
                    listaPauta(0,10,id);*/
                      
                  //  }
                }
            });
            }
            
            function actualizarMascota(idCliente){ 
            
            parent.updateMascota(idCliente)
    }
   </script>