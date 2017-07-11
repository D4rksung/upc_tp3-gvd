<div class="col-xs-12">
    <div class="box">
      <div class="contenido-ficha">922334676
                            <section>
                            <h1 class="text-center">Crear Calendario</h1>
                            <br><br>
                            <form id="frmCalendario" action="main/formcalendario2" method="POST" >
                                <input type="hidden" id="idHidden" name="idHidden" value="0"/>
          <div class="row">
                              <div class="col-md-12" id="divCalendario">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Nombre de Calendario:<font size="2" color="red"> </font></div>
                                    <input type="text" maxlength="100" class="form-control" disabled="" id="txtCalendario" name="txtCalendario" value="">
                                  </div>
                                </div>
                              </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6" id="divEspecie">
                                <div class="form-group">
                                    <label class="sr-only" for="txtCod_Mod"></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Especie:<font size="2" color="red"></font></div>                                   
                                        <select required="" class="form-control" name="cboEspecie" id="cboEspecie">
                                            <option value="0">Seleccione</option>
                                             <?php
                                                    foreach($_SESSION["EPECIE_SESSION"] as $via){?>
                                                    <option value="<?php echo $via["id"]?>"><?php echo $via["nombre"]?></option>
                                             <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                                    <div class="col-md-6" id="divTipoCalendario">
                                <div class="form-group">
                                    <label class="sr-only" for="txtCod_Mod"></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Tipo Calendario:<font size="2" color="red"></font></div>                                   
                                        <select required="" class="form-control" name="cboTipoCalendario" id="cboTipoCalendario">
                                            <option value="0">Seleccione</option>
                                             <?php
                                                    foreach($_SESSION["TIPOCALENDARIO_SESSION"] as $via2){?>
                                                    <option value="<?php echo $via2["id"]?>"><?php echo $via2["nombre"]?></option>
                                             <?php }?>
                                        </select>
                                    </div>
                                </div>
                            </div>
            
          </div>


          <div class="row">
                              <div class="col-md-6" id="divFechaInicio">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Fecha Inicio:<font size="2" color="red"> </font></div>
				<input type="text" readonly class="form-control" data-provide="datepicker" name="txtFechaInicio" id="txtFechaInicio">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                 
								 </div>
                                </div>
                              </div>
            <div class="col-md-6" id="divFechaFin">
                                <div class="form-group">
                                    <label class="sr-only" for="txtCod_Mod"></label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">Fecha Fin:<font size="2" color="red"></font></div>                                   
                                       
                                        <input type="text" readonly class="form-control" data-provide="datepicker" name="txtFechaFin" id="txtFechaFin">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                   
                                    </div>
                                </div>
                            </div>
          </div>
		  
          <div class="row" id="crearCal">
            <div class="col-md-6">
              <input type="button" class="btn btn-danger" id="save" name="save" value="Crear"/>
            </div>
              
          </div>
            <div class="row" id="editarCalendario" style="display: none" >                    
            <div class="col-md-6" >
              <input type="button" class="btn btn-danger" id="edit" name="edit" value="Guardar Cambios"/>
              <input type="button" class="btn btn-danger" id="cancel" name="cancel" value="Cancelar"/>
            </div>
            </div>
              
                            </form>
          </section>
          <br><br><br>

          <section>
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Listado de Calendarios</h3>
                    </div>
                    <div class="panel-body">
                        <div id="table-responsive" class="table-responsive">

                            <table id="tblCalendario" name="tblCalendario" class="table table-striped">
                                <tbody><tr>
                        <th width="25%">Calendario</th>
                        <th>Especie</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Opciones</th>
                        </tr></tbody>
                    
                    </table>
                            <div id="totalReg"></div>
                             <div id="paginacion" >
                                                                
                                 </div>
                    </div>
                    </div>
                    </div>
                    </section>
          
          
        <div id="myModal_total_formularios" >
                
        </div>
          
                    <br><br><br><br><br><br>
          </div>
          </div>
    </div>

    
    
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
           
            // alert('dia:'+dia);
            
          
            listaCalendario(0,10);            
            $('#txtFechaFin').datepicker({
                format: 'dd/mm/yyyy',
                language: 'es',
                autoclose: true
            });
            $('#txtFechaInicio').datepicker({
                format: 'dd/mm/yyyy',
                language: 'es',
                autoclose: true
            });
           
            $("#cboEspecie").change(function (){
                nombreCal()         
              });
              $("#cboTipoCalendario").change(function (){
                nombreCal()         
              });
            
            $("#txtFechaFin").change(function() {
               var ini = $("#txtFechaInicio").val();
               var fin = $("#txtFechaFin").val(); 
               var fin2 = $("#txtFechaFin").val(); 
                 ini = ini.substring(6,10) + ini.substring(3,5) + ini.substring(0,2) 
                 fin = fin.substring(6,10) + fin.substring(3,5) + fin.substring(0,2)
                 
                if(ini > fin){
                    
                    alert('la fecha fin no puede ser menor a la de inicio')
                    $("#txtFechaFin").val('');
                    return null;
                }
                if( fin < dia){
                    alert('la fecha fin no puede ser menor a la fecha actual')
                    $("#txtFechaFin").val('');
                     return null;
                }
               
                if( fin > '20181231'){
                    alert('la fecha fin no puede ser mayor a 1 año de la fecha actual')
                    $("#txtFechaFin").val('');
                     return null;
                }
                    
                    nombreCal();
            });
            
            
            $("#txtFechaInicio").change(function() {
               var ini = $("#txtFechaInicio").val();
               var fin = $("#txtFechaFin").val(); 
               var ini2 = $("#txtFechaInicio").val();
                 ini = ini.substring(6,10) + ini.substring(3,5) + ini.substring(0,2) 
                 fin = fin.substring(6,10) + fin.substring(3,5) + fin.substring(0,2)
               if(fin.length > 0){
                    if(ini > fin){

                        alert('la fecha inicio no puede ser mayor a la de fin')
                        $("#txtFechaInicio").val('');
                        return null;
                    } 
                    return null;
                }
                
                if( ini < '20160622'){
                    alert('la fecha de Inicio no puede ser menor a 1 año de la fecha actual')
                    $("#txtFechaInicio").val('');
                    return null;
                }
                 nombreCal();
            });
            
            $("#save").click(function (){
               
               var val = validar(1);
               if(val == 0){
                                  
                //guardarCal();
                confirmaCal();
            }else{
            alert('Ingresar datos indicados')
            }
            });
            
            $("#edit").click(function (){
            
                        

                var val = validar(2);
               if(val == 0){
                confirmaeditarCalendario();
            }else{
                alert('Ingresar datos indicados')
            }
            });
          
                 
             $("#cancel").click(function (){
                        $("#txtCalendario").val('');
                        $("#cboEspecie").val('0');
                        $("#txtCalendario").prop('disabled', false);
                        $("#cboEspecie").prop('disabled', false);
                        $("#cboTipoCalendario").val('0');
                        $("#txtFechaInicio").val('');
                        $("#txtFechaFin").val('');
                        
                        $("#divCalendario").removeClass('has-error');
                        $("#divEspecie").removeClass('has-error');
                        $("#divTipoCalendario").removeClass('has-error');
                        $("#divFechaInicio").removeClass('has-error');
                        $("#divFechaFin").removeClass('has-error');

                        
                        $("#editarCalendario").hide();
                        $("#crearCal").show();
                });
                 
                
                $('[data-toggle="tooltip"]').tooltip()
});


        function listaCalendario(inicio,fin){
         var hoy = new Date();
            var dd = '00'+(hoy.getDate());
            var mm = '00'+(hoy.getMonth()+1); //hoy es 0!
            var yyyy = hoy.getFullYear();
          //  alert("diaaaa: " +dd)
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
            
        var tbl = "";
        var tblPag = "";
        var pag = (inicio/10)+1;
                $.ajax({
                                type: "POST",
                                url: '<?php echo getUrl().'/main/listacalendario';?>',
                                data:  {inicio:inicio,fin:fin},
                                dataType: "json",
                                success: function(data) {
                                    //$('#gridAdminServicio').data('kendoGrid').dataSource.read();
                                 //   alert(data.total)
                                    
                                    $("#tblCalendario").html('')
                                    $("#paginacion").html('')
                                    
                                       tbl +=" <tbody><tr>";
                                       tbl +=" <th width=\"25%\">Calendario</th>";
                                       tbl +=" <th>Especie</th>";
                                       tbl +=" <th>Fecha Inicio</th>";
                                       tbl +=" <th>Fecha Fin</th>";
                                       tbl +=" <th>Tipo Calendario</th>";
                                       tbl +=" <th>Cant. Vacunas</th>";
                                       tbl +="<th>Opciones</th>";
                                       
                                    $.each( data.registros, function( key, value ) {
                                        tbl += "<tr>";
                                        tbl += "<td>"+value["nombre"]+"</td>";
                                        tbl += "<td>"+value["especie"]+"</td>";
                                        tbl += "<td>"+value["fechaInicio"]+"</td>";
                                        tbl += "<td>"+value["fechaFin"]+"</td>";
                                        tbl += "<td>"+value["tipoCalendario"]+"</td>";
                                        tbl += "<td>"+value["vacunas"]+"</td>";
                                       // alert(value["flag_fecha"] + ' dd:'+dia)
                                        if(value["flag_mascota"] == 0){
                                            if(value["flag_fecha"] > dia ){
                                            tbl += "<td><a href='#' onclick=findCal('"+value["id"]+"') data-toggle=\"tooltip\" title=\"Editar Calendario\" ><span class=\"glyphicon glyphicon-pencil\" >&nbsp;</span></a>";
                                            tbl += "<a href='#' onclick=eliminarCal('"+value["id"]+"') ><span style=\"color: black;\" class=\"glyphicon glyphicon-trash\" data-toggle=\"tooltip\" title=\"Eliminar Calendario\">&nbsp;</span></a>";
                                            tbl += "<a href='#' onclick=addVac('"+value["id"]+"')><span style=\"color: green;\" class=\"glyphicon glyphicon-circle-arrow-up\" data-toggle=\"tooltip\" title=\"Agregar Vacunas\">&nbsp;</span></a></td>";
                                           }else{
                                               tbl += "<td>Fecha fin expirada</td>"; 
                                           }
                                           }else{
                                               tbl += "<td>Calendario asignado a Mascota(s)</td>"; 
                                           }
                                        tbl += "</tr>";
                                      });
                                      tbl +=" </tr></tbody>  ";  
                                      
                                      
                                      
                                      tblPag += "<div align=\"center\">";
                                      
                                      tblPag += "<ul id=\"pagination-recurso\" class=\"pagination\">";
                                      if(pag != 1){
                                      tblPag += "<li class=\"\" ><a  onclick=\"paginat('0','"+data.total+"')\">« Primero</a></li>";
                                      tblPag += "<li class=\"\" ><a  onclick=\"paginat('"+(pag-1)+"','"+data.total+"')\">Anterior</a></li>";
                                        }
                                      tblPag += "<li class=\"active\"><a>"+pag+"</a></li>";
                                      
                                        var ultF = parseFloat(data.total/10)
                                        var ultI = parseInt(data.total/10)

                                        if((ultF - ultI) != 0){
                                           ultI= ultI + 1
                                        }
               
                                      if(data.total > 10 && (pag+1) <= ultI){
                                      tblPag += "<li class=\"\"><a  onclick=\"paginat('"+(pag+1)+"','"+data.total+"')\">Siguiente</a></li>";
                                      tblPag += "<li class=\"\" ><a  onclick=\"paginat('-1','"+data.total+"')\">Último »</a></li>";
                                     }
                                      tblPag += "</ul>";
                                      tblPag += "</div>";  
                                      
                                      $("#totalReg").html("<h5>Total de registros: "+data.total+" </h5>");
                                       $("#tblCalendario").html(tbl);
                                       $("#paginacion").html(tblPag);
                                }
                            });
                            
            
            
        }
        
        function eliminarCal(id){
            $.ajax({        
                                type: "POST",
                                url: '<?php echo getUrl().'/main/eliminarCalendario';?>',
                                data:  {id:id},
                                dataType: "json",
                                success: function(data) {
                                    
                                    if(data == '1'){
                                        alert('Calendario eliminado satisfactoriamente');
                                        listaCalendario(0,10);
                                    }else{
                                        alert('No puede eliminar el registro, debido a que se encuentra vacunas asignadas');
                                    }
                                    }
                        
                                });
        }
        
        function findCal(id){
            $("#divCalendario").removeClass('has-error');
                        $("#divEspecie").removeClass('has-error');
                        $("#divTipoCalendario").removeClass('has-error');
                        $("#divFechaInicio").removeClass('has-error');
                        $("#divFechaFin").removeClass('has-error');
                        $.ajax({        
                                type: "POST",
                                url: '<?php echo getUrl().'/main/busquedaCalendario';?>',
                                data:  {id:id},
                                dataType: "json",
                                success: function(data) {
                                    $.each( data, function( key, value ) {
                                        $("#txtCalendario").val(value["nombre"]);
                                        $("#cboEspecie").val(value["especie"]);
                                        $("#txtCalendario").prop('disabled', true);
                                         $("#cboEspecie").prop('disabled', true);
                                        $("#cboTipoCalendario").val(value["tipoCalendario"]);
                                        $("#txtFechaInicio").val(value["fechaInicio"]);
                                        $("#txtFechaFin").val(value["fechaFin"]);
                                        $("#editarCalendario").show();
                                        $("#crearCal").hide();
                                        $("#idHidden").val(value["id"]);
                                    });
                                 //   
                                }
                        
                                });
            }
            
         
            
        function paginat(page,total){
           if(page == 0){
                listaCalendario(0,10);
           }else if(page == -1){
               var ultF = parseFloat(total/10)
               var ultI = parseInt(total/10)
               
               if((ultF - ultI) != 0){
                  ultI= ultI + 1
               }
               var paginas = (ultI-1)*10;
             
               listaCalendario((ultI-1)*10,10);
            }else{
                listaCalendario((page-1)*10,10);
            }
            
        }
            
        function addVac(id){

            callMODAL_Bootstrap_formularios("my_modal_addCal", "Agregar Vacunas / Desparasitadores", '<iframe src="<?php echo getUrl(); ?>/main/addvacuna/&id='+id+'" width="1100" height="550" scrolling="yes" frameBorder="0" ></iframe>');
        }
        function callMODAL_Bootstrap_formularios(id_modal,titulo, contenido) {
            $("#myModal_total_formularios").html('');
                var modal = '';
                modal += '<div class="modal fade" id="'+id_modal+'\" data-backdrop="static"  data-keyboard="false"  tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">';
                modal += '<div class="modal-dialog\" style=\"width:1150px;height:600px;\" role=\"document\">';
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
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" onclick="cerrarModal()" data-dismiss=\"modal\">Salir</button>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';

             //alert(modal);

                $("#myModal_total_formularios").html(modal);
                $("#"+id_modal).modal();
            }
            
            function confirmaCal(){

            callMODAL_Bootstrap_Confirma("my_modal_Confirma", "Confirmación", '<h5>¿Desea guardar los cambios realizados?</h5>');
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
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" onclick="guardarCal()" data-dismiss=\"modal\">Guardar</button>';
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" onclick="cerrarModal()" data-dismiss=\"modal\">Cancelar</button>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';

             //alert(modal);

                $("#myModal_total_formularios").html(modal);
                $("#"+id_modal).modal();
            }
            
            function confirmaeditarCalendario(){

            callMODAL_Bootstrap_Edita("my_modal_edita", "Confirmación", '<h5>¿Desea guardar los cambios realizados?</h5>');
           }
        
            function callMODAL_Bootstrap_Edita(id_modal,titulo, contenido) {
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
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" onclick="editarCale()" data-dismiss=\"modal\">Guardar</button>';
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" onclick="cerrarModal()" data-dismiss=\"modal\">Cancelar</button>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';

             //alert(modal);

                $("#myModal_total_formularios").html(modal);
                $("#"+id_modal).modal();
            }
            function editarCale(){
               
                
                var idHidden = $("#idHidden").val();
                var txtCalendario = $("#txtCalendario").val();
                var cboEspecie = $("#cboEspecie").val();
                var txtFechaInicio = $("#txtFechaInicio").val();
                var txtFechaFin = $("#txtFechaFin").val();
                var cboTipoCalendario = $("#cboTipoCalendario").val();
                
                $.ajax({
                type: "POST",
                url: '<?php echo getUrl().'/main/editcalendario';?>',
                data:  {idHidden:idHidden,txtCalendario:txtCalendario,cboEspecie:cboEspecie,txtFechaInicio:txtFechaInicio,txtFechaFin:txtFechaFin,cboTipoCalendario:cboTipoCalendario},
                dataType: "json",
                success: function(data) {
                    
                    if(data == '1'){
                        alert('Se actualizó satisfactoriamente');
                        $("#txtCalendario").val('');
                        $("#cboEspecie").val('0');
                        $("#txtCalendario").prop('disabled', false);
                        $("#cboEspecie").prop('disabled', false);
                        $("#cboTipoCalendario").val('0');
                        $("#txtFechaInicio").val('');
                        $("#txtFechaFin").val('');
                        $("#editarCalendario").hide();
                        $("#crearCal").show();
                        listaCalendario(0,10);
                    }else{
                        alert('No se pudo grabar, ya existe un calendario con los datos ingresados');
                    }
                }
            });
            }
            function guardarCal(){
               
                   var txtCalendario = $("#txtCalendario").val();
                   var cboEspecie = $("#cboEspecie").val();
                   var cboTipoCalendario = $("#cboTipoCalendario").val();
                   var txtFechaInicio = $("#txtFechaInicio").val();
                   var txtFechaFin = $("#txtFechaFin").val();
                        
                $.ajax({
                type: "POST",
                url: '<?php echo getUrl().'/main/formcalendario';?>',
                data:  {txtCalendario:txtCalendario,cboEspecie:cboEspecie,cboTipoCalendario:cboTipoCalendario,txtFechaInicio:txtFechaInicio,txtFechaFin:txtFechaFin},
                dataType: "json",
                success: function(data) {
                    
                    if(data == '1'){
                        alert('Registro guardado satisfactoriamente');
                        $("#txtCalendario").val('');
                        $("#cboEspecie").val('');
                        $("#cboTipoCalendario").val('');
                        $("#txtFechaInicio").val('');
                        $("#txtFechaFin").val('');
                        listaCalendario(0,10);
                    }else{
                             alert('Existe un calendario con los datos ingresados');
                        }
                    
                    
                }
            });
            
            }
            function  cerrarModal (){
                 listaCalendario(0,10);
                $("#my_modal_addCal").modal('hide');
            }
            function validar(flag){
                        
                        
                var txtCalendario = $("#txtCalendario").val();
                var cboEspecie = $("#cboEspecie").val();
                var cboTipoCalendario = $("#cboTipoCalendario").val();
                var txtFechaInicio = $("#txtFechaInicio").val();
                var txtFechaFin = $("#txtFechaFin").val();
               // alert(txtCalendario.length+"-"+cboEspecie+"-"+cboTipoCalendario+"-"+txtFechaInicio.length+"-"+txtFechaFin.length)
                var retorno = 0;
                
                        
                        
                if(flag == '1'){
                  
                   
                    if( txtCalendario.length == 0 ) { $("#divCalendario").addClass('has-error') ; retorno += 1 }else{  $("#divCalendario").removeClass('has-error');  retorno += 0 ;}
                    if( cboEspecie == '0' ) { $("#divEspecie").addClass('has-error') ; retorno += 1 }else{  $("#divEspecie").removeClass('has-error');  retorno += 0 ;}
                    
                    if( cboTipoCalendario == '0' ) {  $("#divTipoCalendario").addClass('has-error') ; retorno += 1 }else{  $("#divTipoCalendario").removeClass('has-error');  retorno += 0 ;}
                    if( txtFechaInicio.length == 0 ) { $("#divFechaInicio").addClass('has-error') ; retorno += 1 }else{  $("#divFechaInicio").removeClass('has-error');  retorno += 0 ;}
                    if( txtFechaFin.length == 0 ) { $("#divFechaFin").addClass('has-error') ; retorno += 1 }else{  $("#divFechaFin").removeClass('has-error');  retorno += 0 ;}
                    
                 }else if(flag == '2'){
                   
                    if( cboTipoCalendario == '0' ) {  $("#divTipoCalendario").addClass('has-error') ; retorno += 1 }else{  $("#divTipoCalendario").removeClass('has-error');  retorno += 0 ;}
                    if( txtFechaInicio.length == 0 ) { $("#divFechaInicio").addClass('has-error') ; retorno += 1 }else{  $("#divFechaInicio").removeClass('has-error');  retorno += 0 ;}
                    if( txtFechaFin.length == 0 ) { $("#divFechaFin").addClass('has-error') ; retorno += 1 }else{  $("#divFechaFin").removeClass('has-error');  retorno += 0 ;}
                    
                 }
                     
                    
                    return retorno;
            }
            
            function nombreCal(){
            
              var especie =  $("#cboEspecie").val()
              var desEspecie =  '';
              
              var TipoCalendario =  $("#cboTipoCalendario").val()
              var desTipoCalendario =  '';
              
              var txtFechaInicio =  $("#txtFechaInicio").val()
             
              
              var txtFechaFin =  $("#txtFechaFin").val()
           
              
              if(especie != 0){
                desEspecie = $("#cboEspecie").find(":selected").text()
              }
              if(TipoCalendario != 0 ){
                  desTipoCalendario =  $("#cboTipoCalendario").find(":selected").text()
                }
              
                
                
              $("#txtCalendario").val('CALENDARIO - '+desEspecie.toUpperCase()+' - '+desTipoCalendario.toUpperCase()+' - '+txtFechaInicio+' - '+txtFechaFin)
            }
            
        </script>