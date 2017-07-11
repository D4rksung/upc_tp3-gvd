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
                    <div class="col-md-6" id="divTipoDoc">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Tipo de Documento:<font size="2" color="red"> </font></div>
                                        <select required=""  class="form-control" name="cboTipoDoc" id="cboTipoDoc">
                                            <option value="0">Seleccione</option>
                                            <option value="001">DNI</option>
                                            <option value="002">Carnet de Extranjeria</option>
                                            <option value="003">Passaporte</option>                                            
                                        </select>
                                  </div>
                                </div>
                              </div>
                    <div class="col-md-6" id="divDocumento">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Número de Documento:<font size="2" color="red"> </font></div>
                                    <input type="text" class="form-control" maxlength="11" disabled="" id="txtDocumento" name="txtDocumento"   >
                                  </div>
                                </div>
                              </div>
              </div>                       
              
    <div class="col-md-6">   
            <div class="col-md-6" id="divNombre">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Nombre(s) Cliente:<font size="2" color="red"> </font></div>
                                    <input type="text" class="form-control" maxlength="100" disabled="" id="txtNombre" name="txtNombre"   >                                          
                                  </div>
                                </div>
                            </div> 
        
               <div class="col-md-6" id="divApellidos">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Apellido(s) Cliente<font size="2" color="red"> </font></div>
                                    <input type="text" class="form-control" maxlength="100" disabled="" id="txtApellidos" name="txtApellidos" >
                                          
                                  </div>
                                </div>
                            </div>  
    
    </div>
        <div class="col-md-6">
            <div class="col-md-6" id="divDireccion">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Dirección:<font size="2" color="red"> </font></div>
                                    <input type="text" class="form-control" maxlength="150" disabled="" id="txtDireccion" name="txtDireccion"   >                                          
                                  </div>
                                </div>
                            </div> 
        
               <div class="col-md-6" id="divTelefono">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Teléfono<font size="2" color="red"> </font></div>
                                    <input type="text" class="form-control" maxlength="9" disabled="" id="txtTelefono" name="txtTelefono" >
                                          
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
       <div class="col-md-6"> 
                    <div class="col-md-6" id="divEmail">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Email<font size="2" color="red"> </font></div>
                                    <input type="text" class="form-control" maxlength="50" disabled="" id="txtEmail" name="txtEmail" >
                                          
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
            var dia2 = (yyyy-18)+''+mm+''+dd
         //   alert('dia: '+ dia + ' dia2: ' + dia2)
        $("#txtNacimiento").change(function() {
            var nac =  $("#txtNacimiento").val()
            nac = nac.substring(6,10) + nac.substring(3,5) + nac.substring(0,2) 
            if( nac > dia){
                    alert('la fecha de nacimiento no puede ser mayor a la fecha actual')
                    $("#txtNacimiento").val('');
                     return null;
                }
             if( nac > dia2){
                    alert('El cliente debe tener al menos de 18 años')
                    $("#txtNacimiento").val('');
                     return null;
                }   
        });
        $('#txtTelefono').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '');
          });
          
          $('#txtDocumento').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '');
          });
          
        $("#txtTelefono").blur(function (){
          var txtTelefono =   $("#txtTelefono").val();
             if(txtTelefono.length > 0 ){
                 if(txtTelefono.length < 7 || txtTelefono.length > 9 ){
                     alert('Ingrese como mínimo 7 caracteres y máximo 9')
                     $("#txtTelefono").val('');
                 }
             }
        });
        
        $("#txtDocumento").blur(function (){
             var txtDocumento = $("#txtDocumento").val();  
             var cboTipoDoc = $("#cboTipoDoc").val();  
             if(cboTipoDoc == '001'){
                 if(txtDocumento.length > 0 ){
                 if(txtDocumento.length < 8 || txtDocumento.length > 8 ){
                     alert('Ingrese 8 caracteres numéricos')
                     $("#txtDocumento").val('');
                 }
                 if(txtDocumento == '00000000'){
                     alert('DNI incorrecto')
                     $("#txtDocumento").val('');
                 }
                }
             
             }
        })
        $('#cboTipoDoc').change(function () {
            var cboTipoDoc = $("#cboTipoDoc").val();   
            if(cboTipoDoc == '0'){
                 $("#txtDocumento").prop("disabled", true);     
                $("#txtNombre").prop("disabled", true);   
                $("#txtApellidos").prop("disabled", true);   
                $("#txtDireccion").prop("disabled", true);     
                $("#txtTelefono").prop("disabled", true);      
                $("#txtEmail").prop("disabled", true);  
            }else{
                 $("#txtDocumento").prop("disabled", false);     
                $("#txtNombre").prop("disabled", false);   
                $("#txtApellidos").prop("disabled", false);   
                $("#txtDireccion").prop("disabled", false);     
                $("#txtTelefono").prop("disabled", false);      
                $("#txtEmail").prop("disabled", false);   
            }
        });
        
        $('#txtNacimiento').datepicker({
                format: 'dd/mm/yyyy',
                language: 'es',
                autoclose: true
            });
            
      

        
       
        
     $("#save").click(function (){
        // alert('1')
       var val = validar(1);
         
        if(val == 0){
        //alert('2')
            confirmaCli();
          
            }else{
                alert('Ingresar datos indicados')
            }
            });
    });
    
        
        function validar(flag){
        
                var cboTipoDoc = $("#cboTipoDoc").val();       
                var txtDocumento = $("#txtDocumento").val();     
                var txtNombre = $("#txtNombre").val();
                var txtApellidos = $("#txtApellidos").val();
                var txtDireccion = $("#txtDireccion").val();       
                var txtTelefono = $("#txtTelefono").val();     
                var txtNacimiento = $("#txtNacimiento").val();
                var txtEmail = $("#txtEmail").val();
                
             //cboTipoDoc txtDocumento txtNombre txtApellidos txtDireccion txtTelefono  txtNacimiento txtEmail
               // alert(txtCalendario.length+"-"+cboEspecie+"-"+cboTipoCalendario+"-"+txtFechaInicio.length+"-"+txtFechaFin.length)
                var retorno = 0;
 
                if(flag == '1'){
 
                    if( cboTipoDoc == '0' ) { $("#divTipoDoc").addClass('has-error') ; retorno += 1 }else{  $("#divTipoDoc").removeClass('has-error');  retorno += 0 ;}
                    if( txtDocumento == ''  ) { $("#divDocumento").addClass('has-error') ; retorno += 1 }else{  $("#divDocumento").removeClass('has-error');  retorno += 0 ;}
                    if( txtNombre == '' ) {  $("#divNombre").addClass('has-error') ; retorno += 1 }else{  $("#divNombre").removeClass('has-error');  retorno += 0 ;}
                    if( txtApellidos == '' ) {  $("#divApellidos").addClass('has-error') ; retorno += 1 }else{  $("#divApellidos").removeClass('has-error');  retorno += 0 ;}
                    if( txtDireccion == '' ) {  $("#divDireccion").addClass('has-error') ; retorno += 1 }else{  $("#divDireccion").removeClass('has-error');  retorno += 0 ;}
                    if( txtTelefono == '' ) {  $("#divTelefono").addClass('has-error') ; retorno += 1 }else{  $("#divTelefono").removeClass('has-error');  retorno += 0 ;}
                    if( txtNacimiento == '' ) {  $("#divNacimiento").addClass('has-error') ; retorno += 1 }else{  $("#divNacimiento").removeClass('has-error');  retorno += 0 ;}
                    if( txtEmail == '' ) {  $("#divEmail").addClass('has-error') ; retorno += 1 }else{  $("#divEmail").removeClass('has-error');  retorno += 0 ;}
                 
                 }
                     
                    
                    return retorno;
            }
            
            function confirmaCli(){

            callMODAL_Bootstrap_Confirma("my_modal_Confirma", "Confirmación", '<h5>¿Desea guardar los datos ingresados?</h5>');
           }
        
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
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" onclick="guardarCliente()" data-dismiss=\"modal\">Guardar</button>';
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" data-dismiss=\"modal\">Cancelar</button>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';

             //alert(modal);

                $("#myModal_total_formularios").html(modal);
                $("#"+id_modal).modal();
            }
             function addMascota(){

            callMODAL_Bootstrap_AddMascota("my_modal_addMascota", "Confirmación", '<h5>Cliente registrado satisfactoriamente. ¿Desea registrar una mascota ahora?</h5>');
           }
        
            function callMODAL_Bootstrap_AddMascota(id_modal,titulo, contenido) {
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
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" onclick="agregarMascota()" data-dismiss=\"modal\">Si</button>';
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" data-dismiss=\"modal\">No</button>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';

             //alert(modal);

                $("#myModal_total_formularios").html(modal);
                $("#"+id_modal).modal();
            }
            
            function  guardarCliente(){
                  var cboTipoDoc = $("#cboTipoDoc").val();       
                var txtDocumento = $("#txtDocumento").val();     
                var txtNombre = $("#txtNombre").val();
                var txtApellidos = $("#txtApellidos").val();
                var txtDireccion = $("#txtDireccion").val();       
                var txtTelefono = $("#txtTelefono").val();     
                var txtNacimiento = $("#txtNacimiento").val();
                var txtEmail = $("#txtEmail").val();
                
                $.ajax({
                type: "POST",
                url: '<?php echo getUrl().'/campania/formCliente';?>',
                data:  {cboTipoDoc:cboTipoDoc,txtDocumento:txtDocumento,txtNombre:txtNombre,txtApellidos:txtApellidos,txtDireccion:txtDireccion,
                        txtTelefono:txtTelefono,txtNacimiento:txtNacimiento,txtEmail:txtEmail},
                dataType: "json",
                success: function(data) {
                    
                    $.each( data, function( key, value ) {
                       // alert('id data :'+data.id)
                     //  alert('id:'+value["id"])
                        //alert('Cliente registrado satisfactoriamente');
                        if(value["id"] > 0){ 
                           $("#idClienteH").val(value["id"]);
                            actualizarCliente();
                        }else{
                             alert('El número de documento ingresado ya existe en el sistema.');                               
                        }
                        
                    });
                   // alert(data)
                    //if(data == '1'){
                      //  alert('Registro guardado satisfactoriamente');
                     /*   $("#txtPauta").val('');
                        $("#cboPeriodo").val('0');
                        $("#cboTipoPauta").val('0');
                        $("#txtOrden").val('');
                    listaPauta(0,10,id);*/
                      
                  //  }
                }
            });
            }
            function actualizarCliente(){ 
            var id= $("#idClienteH").val();
            parent.updateCliente(id)
    }
    
      </script>