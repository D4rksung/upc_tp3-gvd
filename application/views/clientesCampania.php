<div class="col-xs-12">
    <div class="box">
      <div class="contenido-ficha">
                            <section>
                            <h1 class="text-center">Buscar Cliente</h1>
                            <br><br>
                            <form id="frmCalendario" action="main/formcalendario2" method="POST" >
                                <input type="hidden" name="idClienteH" id="idClienteH" value="0" />
                                <input type="hidden" name="tipoBusqueda" id="tipoBusqueda" value="0" />
          <div class="row">
                              <div class="col-md-6" id="divCalendario">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Número de Documento:<font size="2" color="red"> </font></div>
                                    <input type="text" maxlength="11"  class="form-control" id="txtDoc" name="txtDoc" value="">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-3" id="divCalendario">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <input type="button" class="btn btn-danger" id="buscar" name="buscar" value="Buscar"/>&nbsp;&nbsp;
                                    <input type="button" class="btn btn-primary" id="back" name="back" value="Regresar"/>
                                  </div>
                                </div>
                              </div>
                            
                         
             
              </div>
                                
            <div id="datosCliente" style="display: none;">
                <br>
                <section>
                              <fieldset class="scheduler-border">
                               <legend class="scheduler-border">Datos de Cliente</legend>
                                <div class="row">
                              <div class="col-md-12" id="divCalendario">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Nombre:<font size="2" color="red"> </font></div>
                                    <input type="text" maxlength="100" class="form-control" required="" disabled="" id="txtNombrCli" name="txtNombrCli" value="">
                                  </div>
                                </div>
                              </div>
                             </div>
                               <div class="row">
                                <div class="col-md-12" id="divCalendario">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Dirección:<font size="2" color="red"> </font></div>
                                    <input type="text" maxlength="100" class="form-control" required="" disabled="" id="txtDireccion" name="txtDireccion" value="">
                                  </div>
                                </div>
                              </div>
                            </div>
                               
                                <div class="row">
                                <div class="col-md-12" id="divCalendario">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Teléfono:<font size="2" color="red"> </font></div>
                                    <input type="text" maxlength="100" class="form-control" required="" disabled="" id="txtTelefono" name="txtTelefono" value="">
                                  </div>
                                </div>
                              </div>
                                    <div class="col-md-12" id="divCalendario">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">E-mail:<font size="2" color="red"> </font></div>
                                    <input type="text" maxlength="100" class="form-control" required="" disabled="" id="txtEmail" name="txtEmail" value="">
                                  </div>
                                </div>
                              </div>
                            </div>
                               </fieldset >        
                       </section>                    
            </div>
              
                                

                            </form>
          </section>
          <br>
          
          <div class="row" id="agregarCliente" style="display: none;" >                    
            <div class="col-md-6" > 
                <p style="color: red;font-weight: bold;">No se encontraron Resultados</p>
            
            </div>
            </div>
          <div class="row" id="registrarBTN" >                    
            <div class="col-md-6" > 
              <input type="button" class="btn btn-primary" id="addCliente" name="addCliente" value="Registrar Nuevo Cliente"/>
            </div>
          </div><br>
          <div id="divMascota" style="display: none;">
                <section>
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Listado de Mascotas</h3>
                    </div>
                    <div class="panel-body">
                        <div id="table-responsive" class="table-responsive">

                            <table id="tblMascota" name="tblMascota" class="table table-striped">
                    <tbody><tr>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Raza</th>                       
                        <th>Atender</th>
                        </tr>
                    </tbody>
                    
                    </table>
                            <div id="totalReg"></div>
                             <div id="paginacion" >
                                                                
                                 </div>
                    </div>
                    </div>
                    </div>
                    </section>
              <div class="row" id="divAddMascota" >                    
            <div class="col-md-6" > 
                <p style="color: red;font-weight: bold;" id="msgMascota"></p>
              <input type="button" class="btn btn-primary" id="addMascota" name="addMascota" value="Agregar Nueva Mascota"/>
            </div>
            </div>
            </div>
          
          
          <br><br><br>
            
          
          
        <div id="myModal_total_formularios" >
                
        </div>
          
                    <br><br><br><br><br><br>
          </div>
          </div>
    </div>

<script type="text/javascript">
   
	$(document).ready(function() {
            cargaDatos()
                $("#buscar").click(function (){
                    var doc = $("#txtDoc").val()
                    if(doc == ''){
                        alert('Ingrese un número de documento');
                    }else if (doc.length < 8) {
                        alert('Ingrese como mínimo 8 caracteres');
                    }else{
                        BuscarCliente()
                    }
                   
             });
             $("#addCliente").click(function (){
                   callMODAL_Bootstrap_formularios("my_modal_addCli", "Registrar Nuevo Cliente ", '<iframe src="<?php echo getUrl(); ?>/campania/addcliente" width="800" height="550" scrolling="yes" frameBorder="0" ></iframe>');
             });
             $("#addMascota").click(function (){
                var idCliente = $("#idClienteH").val();
                   callMODAL_Bootstrap_formulariosMascota("my_modal_addMascotaCli", "Registrar Mascota", '<iframe src="<?php echo getUrl(); ?>/campania/addMascota/&id='+idCliente+'" width="800" height="550" scrolling="yes" frameBorder="0" ></iframe>');
          });
           $("#back").click(function (){
                    window.location = '<?php echo getUrl().'/campania/atender/&id='.$_SESSION["CAMPANIAATENCION_SESSION"][0]["id"]; ?>';
                });
     
        }); 
        
        function cargaDatos(){
            var tipoBusqueda = $("#tipoBusqueda").val();
            var idClienteH = $("#idClienteH").val();
            var documento = $("#txtDoc").val();
            if(tipoBusqueda == 0){
                return null
            }else if (tipoBusqueda == 1){
                if(documento != ''){
                    BuscarCliente()
                }else{
                    return null
                }
            }else if (tipoBusqueda == 2){
                if(idClienteH != 0){
                BuscarClienteID(idClienteH)
                }else{
                    return null
                    }
            }else{
                return null
            }
        }
        
        function BuscarCliente (){
            var documento = $("#txtDoc").val()
                     $.ajax({
                                     type: "POST",
                                     url: '<?php echo getUrl().'/campania/getCliente';?>',
                                     data:  {documento:documento},
                                     dataType: "json",
                                     success: function(data) {

                                         if(data.length > 0 ){
                                             $("#datosCliente").show(); 
                                             $("#agregarCliente").hide(); 
                                             $("#registrarBTN").hide(); 
                                            $.each( data, function( key, value ) {

                                               $("#txtNombrCli").val(value["nombres"]);
                                               $("#txtDireccion").val(value["Direccion"]);
                                               $("#txtTelefono").val(value["Telefono"]);
                                               $("#txtEmail").val(value["Email"]);
                                               $("#idClienteH").val(value["idCliente"]);
                                                $("#tipoBusqueda").val('1');
                                                 });
                                            BuscarMascota($("#idClienteH").val());
                                         }else{
                                             $("#datosCliente").hide(); 
                                             $("#agregarCliente").show(); 
                                             $("#registrarBTN").show(); 
                                              $("#idClienteH").val('0');
                                              $("#divMascota").hide()  
                                              $("#tblMascota").html('') 
                                         }

                                 }
                 });
        }
         function BuscarClienteID (idCliente){
            
                     $.ajax({
                                     type: "POST",
                                     url: '<?php echo getUrl().'/campania/getClienteID';?>',
                                     data:  {idCliente:idCliente},
                                     dataType: "json",
                                     success: function(data) {

                                         if(data.length > 0 ){
                                             $("#datosCliente").show(); 
                                             $("#agregarCliente").hide(); 
                                             $("#registrarBTN").hide(); 
                                            $.each( data, function( key, value ) {

                                               $("#txtNombrCli").val(value["nombres"]);
                                               $("#txtDireccion").val(value["Direccion"]);
                                               $("#txtTelefono").val(value["Telefono"]);
                                               $("#txtEmail").val(value["Email"]);
                                               $("#idClienteH").val(value["idCliente"]);

                                                 });
                                            BuscarMascota($("#idClienteH").val());
                                            $("#tipoBusqueda").val('2');
                                         }else{
                                             $("#datosCliente").hide(); 
                                             $("#agregarCliente").show(); 
                                             $("#registrarBTN").show(); 
                                              $("#idClienteH").val('0');
                                              $("#divMascota").hide()  
                                              $("#tblMascota").html('') 
                                         }

                                 }
                 });
        }
        function BuscarMascota (idCliente){
        var tbl = ' ';
    $.ajax({
                                     type: "POST",
                                     url: '<?php echo getUrl().'/campania/getMascotaCliente';?>',
                                     data:  {idCliente:idCliente},
                                     dataType: "json",
                                     success: function(data) {
                                         $("#tblMascota").html('')   
                                       tbl +=" <tbody><tr>";
                                       tbl +=" <th>Nombre</th>";
                                       tbl +=" <th>Especie</th>";
                                       tbl +=" <th>Raza</th>";
                                       tbl +=" <th>Atender</th>";
                                         if(data.length > 0 ){                                          
                                       
                                    $.each( data, function( key, value ) {
                                        tbl += "<tr>";
                                        tbl += "<td>"+value["mascota"]+"</td>";
                                        tbl += "<td>"+value["especie"]+"</td>";
                                        tbl += "<td>"+value["raza"]+"</td>";
                                        
                                        tbl += "<td><a href=\"<?php echo getUrl(); ?>/campania/atenderCliente/&idCliente="+idCliente+"&IdMascota="+value["IdMascota"]+"\" ><span style=\"color: green;\" class=\"glyphicon glyphicon-circle-arrow-up\" data-toggle=\"tooltip\" title=\"Atender Mascota\">&nbsp;</span></a></td>";
                                          
                                        tbl += "</tr>";
                                      });
                                      
                                          $("#divMascota").show()                                            
                                          $("#msgMascota").html('')   
                                         }else{
                                         $("#divMascota").show() 
                                           $("#msgMascota").html('No se encontraron Mascotas')       
                                         }
                                         tbl +=" </tr></tbody>  ";  
                                         $("#tblMascota").html(tbl) 
                                     }
                             });
    }
    
    
        function callMODAL_Bootstrap_formularios(id_modal,titulo, contenido) {
            $("#myModal_total_formularios").html('');
                var modal = '';
                modal += '<div class="modal fade" id="'+id_modal+'\" data-backdrop="static"  data-keyboard="false"  tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">';
                modal += '<div class="modal-dialog\" style=\"width:850px;height:600px;\" role=\"document\">';
                modal += '<div class="modal-content">';
                modal += '<div class="modal-header">';
                modal += '<button type=\"button\" class="close" data-dismiss=\"modal\" aria-label=\"Close\" ><span aria-hidden=\"true\" onclick="cerrarModal('+id_modal+')">&times;</span></button>';
                modal += '<div class="modal-header">';
                modal += '<h4 class="modal-title" id=\"myModalLabel\">'+titulo+'</h4>';
                modal += '</div>';
                modal += '<div class="modal-body">';//style="max-height: 720px;overflow-y:auto;"
                modal += contenido;
                modal += '</div>';
                modal += '<div class=\"modal-footer\">';
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" onclick="cerrarModal('+id_modal+')" data-dismiss=\"modal\">Salir</button>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';

             //alert(modal);

                $("#myModal_total_formularios").html(modal);
                $("#"+id_modal).modal();
            }
            
            function updateCliente(idCliente){
                $("#my_modal_addCli").modal('hide')
                BuscarClienteID(idCliente);
               // agregarMascota(idCliente);
            }
            function agregarMascota(idCliente){
            callMODAL_Bootstrap_formulariosMascota("my_modal_addMascotaCli", "Registrar Mascota", '<iframe src="<?php echo getUrl(); ?>/campania/addMascota/&id='+idCliente+'" width="800" height="550" scrolling="yes" frameBorder="0" ></iframe>');
        }
        
        function callMODAL_Bootstrap_formulariosMascota(id_modal,titulo, contenido) {
            $("#myModal_total_formularios").html('');
                var modal = '';
                modal += '<div class="modal fade" id="'+id_modal+'\" data-backdrop="static"  data-keyboard="false"  tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">';
                modal += '<div class="modal-dialog\" style=\"width:850px;height:600px;\" role=\"document\">';
                modal += '<div class="modal-content">';
                modal += '<div class="modal-header">';
                modal += '<button type=\"button\" class="close" data-dismiss=\"modal\" aria-label=\"Close\" ><span aria-hidden=\"true\" onclick="cerrarModal('+id_modal+')">&times;</span></button>';
                modal += '<div class="modal-header">';
                modal += '<h4 class="modal-title" id=\"myModalLabel\">'+titulo+'</h4>';
                modal += '</div>';
                modal += '<div class="modal-body">';//style="max-height: 720px;overflow-y:auto;"
                modal += contenido;
                modal += '</div>';
                modal += '<div class=\"modal-footer\">';
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" onclick="cerrarModal('+id_modal+')" data-dismiss=\"modal\">Salir</button>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';

             //alert(modal);

                $("#myModal_total_formularios").html(modal);
                $("#"+id_modal).modal();
            }
            
          function  cerrarModal(modalName){
                $("#"+modalName).modal('toggle');
                
            }
            
          function  updateMascota(idCliente){
              $("#my_modal_addMascotaCli").modal('hide')
              BuscarMascota(idCliente);
          }
        
</script>