<div class="col-xs-12">
    <div class="box">
      <div class="contenido-ficha">
                            <section>
                            <h1 class="text-center">Atención de Servicio Clínico</h1>
                            <br><br>
                            <form id="frmCalendario" action="main/formcalendario2" method="POST" >
                                <input type="hidden" id="idHidden" name="idHidden" value="0"/>
                                <input type="hidden" id="idCalendarioH" name="idCalendarioH" value="0"/>
                           <fieldset class="scheduler-border">
                               <legend class="scheduler-border">Datos de Cliente</legend>
                                <div class="row">
                              <div class="col-md-6" id="divCalendario">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Nombre:<font size="2" color="red"> </font></div>
                                    <input type="text" maxlength="100" class="form-control" required="" disabled="" id="txtNombrCli" name="txtNombrCli" value="">
                                  </div>
                                </div>
                              </div>
                                <div class="col-md-6" id="divCalendario">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Hora de Cita:<font size="2" color="red"> </font></div>
                                    <input type="text" maxlength="100" class="form-control" required="" disabled="" id="txtHora" name="txtHora" value="">
                                  </div>
                                </div>
                              </div>
                            </div>
                               </fieldset >
                               
                               <fieldset class="scheduler-border">
                               <legend class="scheduler-border">Datos de la Mascota</legend>
                                <div class="row">
                                    <div class="col-md-6" id="divEspecie">
                                <div class="form-group">
                                    <label class="sr-only" for="txtCod_Mod"></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Especie:<font size="2" color="red"></font></div>                                   
                                        <input type="text" maxlength="100" class="form-control" disabled="" id="txtEspecie" name="txtEspecie" value="">
                                    </div>
                                </div>
                            </div>
                                   
                              <div class="col-md-6" id="divTipoCalendario">
                                <div class="form-group">
                                    <label class="sr-only" for="txtCod_Mod"></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Sexo:<font size="2" color="red"></font></div>                                   
                                        <input type="text" maxlength="100" class="form-control" disabled="" id="txtSexo" name="txtSexo" value="">
                                    </div>
                                </div>
                            </div>      
                
          </div>


          <div class="row">
              <div class="col-md-6" id="divTipoCalendario">
                                <div class="form-group">
                                    <label class="sr-only" for="txtCod_Mod"></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Raza:<font size="2" color="red"></font></div>                                   
                                        <input type="text" maxlength="100" class="form-control" disabled="" id="txtRaza" name="txtRaza" value="">
                                    </div>
                                </div>
                            </div>                     
          
                                    <div class="col-md-6" id="divTipoCalendario">
                                <div class="form-group">
                                    <label class="sr-only" for="txtCod_Mod"></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Peso:<font size="2" color="red"></font></div>                                   
                                        <input type="text" maxlength="100" class="form-control" disabled=""  id="txtPeso" name="txtPeso" value="">
                                    </div>
                                </div>
                            </div>
            
          </div>
                               <div class="row">
                                   <div class="col-md-6" id="divEspecie">
                                <div class="form-group">
                                    <label class="sr-only" for="txtCod_Mod"></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Nombre:<font size="2" color="red"></font></div>                                   
                                        <input type="text" maxlength="100" class="form-control" disabled="" id="txtNombreMas" name="txtNombreMas" value="">
                                    </div>
                                </div>
                            </div>
                                   <div class="col-md-6" id="divEspecie">
                                <div class="form-group">
                                    <label class="sr-only" for="txtCod_Mod"></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Fecha Nacimiento:<font size="2" color="red"></font></div>                                   
                                        <input type="text" maxlength="100" class="form-control" disabled=""  id="txtNacimiento" name="txtNacimiento" value="">
                                    </div>
                                </div>
                            </div>
                                    
                                    
            
          </div>
                               <div class="row">
                                    <div class="col-md-6" id="divEspecie">
                                <div class="form-group">
                                    <label class="sr-only" for="txtCod_Mod"></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Talla:<font size="2" color="red"></font></div>                                   
                                        <input type="text" maxlength="100" class="form-control" disabled=""  id="txtTalla" name="txtTalla" value="">
                                    </div>
                                </div>
                            </div>
                                    <div class="col-md-6" id="divTipoCalendario">
                                <div class="form-group">
                                    <label class="sr-only" for="txtCod_Mod"></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Edad:<font size="2" color="red"></font></div>                                   
                                        <input type="text" maxlength="100" class="form-control" disabled="" id="txtEdad" name="txtEdad" value="">
                                    </div>
                                </div>
                            </div>
            
                        </div>
		</fieldset >  
          <div class="row" id="crearCal">
            <div class="col-md-6">
              <input type="button" class="btn btn-danger" id="save" name="save" value="Asignar Calendario"/>
            </div>
              
          </div>
                <br>
                <div  id="datosCal" style="display: none;">
                    <fieldset class="scheduler-border">
                               <legend class="scheduler-border">Calendario Asignado</legend>
                                                             
            <div class="row"  >                    
            
                                    <div class="col-md-6" id="divEspecie">
                                <div class="form-group">
                                    <label class="sr-only" for="txtCod_Mod"></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Nombre Calendario:<font size="2" color="red"></font></div>                                   
                                        <input type="text" maxlength="100" class="form-control" disabled=""  id="txtNombrecal" name="txtNombrecal" value="">
                                    </div>
                                </div>
                            </div>
                                    <div class="col-md-6" id="divTipoCalendario">
                                <div class="form-group">
                                    <label class="sr-only" for="txtCod_Mod"></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Fecha de Inicio:<font size="2" color="red"></font></div>                                   
                                        <input type="text" maxlength="100" class="form-control" disabled="" id="txtFechaInicio" name="txtFechaInicio" value="">
                                    </div>
                                </div>
                            </div>
            
                        
            </div>
                    <div class="row"   >                    
            
                                    <div class="col-md-6" id="divEspecie">
                                <div class="form-group">
                                    <label class="sr-only" for="txtCod_Mod"></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Tipo de Calendario:<font size="2" color="red"></font></div>                                   
                                        <input type="text" maxlength="100" class="form-control" disabled=""  id="txtTipoCal" name="txtTipoCal" value="">
                                    </div>
                                </div>
                            </div>
                                    <div class="col-md-6" id="divTipoCalendario">
                                <div class="form-group">
                                    <label class="sr-only" for="txtCod_Mod"></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Fecha Fin :<font size="2" color="red"></font></div>                                   
                                        <input type="text" maxlength="100" class="form-control" disabled="" id="txtFechaFin" name="txtFechaFin" value="">
                                        
                                    </div>
                                </div>
                            </div>
            
                        
            </div>
                               
                               <div class="row"  >
                               <div class="col-md-6">
              <input type="button" class="btn btn-danger" id="cambiarCal" name="cambiarCal" value="Cambiar de Calendario"/>
            </div>
                                   </div>
                               </fieldset>
                    </div>
              
                            </form>
          </section>
          <br><br><br>

           <section>
               
                
                
                <div id="detFarmaco">
              
                </div> 
              
           </section>
          
          <div class="row" id="verProxV" style="display: none" >
                               <div class="col-md-6">
                                   <input type="button" class="btn btn-danger" id="finish" name="finish" value="Finalizar Atención"/>
                                    <input type="button" class="btn btn-success" id="ver" name="ver" value="Ver Próximas Vacunas"/>
            </div>
                                   </div>
        <div id="myModal_total_formularios" >
                
        </div>
          
          <div id="divDetalleSiguientesVacunas" style="display: none"  >
                
        </div>
          
                    <br><br><br><br><br><br>
          </div>
          </div>
    </div>

<script type="text/javascript">
   
	$(document).ready(function() {
            $("#txtNombrCli").val('<?php echo $_SESSION["CLIENTEATENCION_SESSION"][0]["nombre"];?>');
            $("#txtHora").val('<?php echo $_SESSION["CLIENTEATENCION_SESSION"][0]["hora"];?>');
            $("#txtEspecie").val('<?php echo $_SESSION["CLIENTEATENCION_SESSION"][0]["especie"];?>');
            $("#txtRaza").val('<?php echo $_SESSION["CLIENTEATENCION_SESSION"][0]["raza"];?>');
            $("#txtNombreMas").val('<?php echo $_SESSION["CLIENTEATENCION_SESSION"][0]["mascota"];?>');
            $("#txtPeso").val('<?php echo $_SESSION["CLIENTEATENCION_SESSION"][0]["peso"];?>');
            $("#txtTalla").val('<?php echo $_SESSION["CLIENTEATENCION_SESSION"][0]["talla"];?>');
            $("#txtSexo").val('<?php echo $_SESSION["CLIENTEATENCION_SESSION"][0]["sexo"];?>');
            $("#txtNacimiento").val('<?php echo $_SESSION["CLIENTEATENCION_SESSION"][0]["nacimiento"];?>');
            $("#txtEdad").val('<?php echo $_SESSION["CLIENTEATENCION_SESSION"][0]["edad"];?> años');
        
        
            $("#save").click(function (){
                var id = '<?php echo $_SESSION["CLIENTEATENCION_SESSION"][0]["idMascota"];?>';
                callMODAL_Bootstrap_formularios("my_modal_asignarCal", "Asignar Calendario de  Vacunas / Desparacitadores", '<iframe src="<?php echo getUrl(); ?>/atencion/asignarCal/&id='+id+'" width="1100px" height="550px" scrolling="yes" frameBorder="0" ></iframe>');
            });
            
            valCal();
            
            $("#ver").click(function (){
                var idMascota = '<?php echo $_SESSION["CLIENTEATENCION_SESSION"][0]["idMascota"];?>';
                var idCalendario = $("#idCalendarioH").val();
                 callMODAL_Bootstrap_formulariosProximo("my_modal_ProximaVacunas", "Detalle de Próxima(s) Vacuna(s)", '<iframe src="<?php echo getUrl(); ?>/atencion/verProxVac/&idMascota='+idMascota+'&idCalendario='+idCalendario+'" width="950" height="550" scrolling="yes" frameBorder="0" ></iframe>');
            });
            $("#finish").click(function (){
                
                confirmaFinalizacion();
                });
            
          });
             
             function callMODAL_Bootstrap_formularios(id_modal,titulo, contenido) {
            
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
            
            function  cerrarModalAsignado(id){
               //  listaCalendario(0,10);
                $("#crearCal").hide();
                $("#datosCal").show();
                $("#verProxV").show();               
                $("#my_modal_asignarCal").modal('hide');
                listaDetalle(id);
            }
            function  cerrarModal(id){
               //  listaCalendario(0,10);
                           
                $("#my_modal_asignarCal").modal('hide');
                listaDetalle(id);
            }
            function  cerrarModalR(id){
               //  listaCalendario(0,10);
                $("#my_modal_addSer").modal('hide');
                listaDetalle(id);
            }
            
            
           
            function valCal(){
                var id = '<?php echo $_SESSION["CLIENTEATENCION_SESSION"][0]["idMascota"];?>';
                $.ajax({
                                type: "POST",
                                url: '<?php echo getUrl().'/atencion/consultaCalAsignado';?>',
                                data:  {idMascota:id},
                                dataType: "json",
                                success: function(data) {
                                        
                                    
                                      
                                        
                                        if(data.length > 0){
                                            
                                            $("#crearCal").hide();
                                            $("#datosCal").show();
                                            
                                            $.each( data, function( key, value ) {
                                                $("#txtNombrecal").val(value["nomCalendario"]);
                                                $("#txtFechaInicio").val(value["fechaInicio"]);
                                                $("#txtTipoCal").val(value["tipoCalendario"]);
                                                $("#txtFechaFin").val(value["fechaFin"]);
                                                $("#idCalendarioH").val(value["calendario"]);
                                                listaDetalle(value["calendario"]);
                                                
                                            });
                                            
                                            $("#verProxV").show();
                                        }
                                        
                                    
                                }
                        
                });
            }
            
            function listaDetalle(calendario){
          //  alert('1')
            var idMascota = '<?php echo $_SESSION["CLIENTEATENCION_SESSION"][0]["idMascota"];?>';
            var tbl = ' ';
            var count = 1;
            var tblPauta = ' ';
            
             $.ajax({
                                type: "POST",
                                url: '<?php echo getUrl().'/atencion/detalleCalendarioMascota';?>',
                                data:  {idCalendario:calendario,idMascota:idMascota},
                                async:false,
                                cache:false,
                                dataType: "json",
                                success: function(data) {
                                    $("#detFarmaco").html('');
                                    var farmaco_especie = '0';
                                    tbl += "<fieldset class=\"scheduler-border\">";
                                    tbl += "<legend class=\"scheduler-border\">Detalle de Farmaco(s)</legend>";
                                    $.each( data, function( key, value ) {
                                        
                                        var val = value["farmaco_especie"];
                                 //alert('val:' +val + ' var:' + farmaco_especie)
                                    
                                        if(val != farmaco_especie){
                                          
                                            tbl += "<div class=\"panel panel-success\">";
                                            tbl += "<div class=\"panel-heading\">";
                                            tbl += "<h3 class=\"panel-title\">Indicaciones Fármaco: "+count+" </h3>";
                                            tbl += "</div>";
                                            tbl += "<div class=\"panel-body\">";
                                            tbl += "<div id=\"table-responsive\" class=\"table-responsive\">";
                                            tbl += "<div class=\"row\">";
                                            tbl += "<div class=\"col-sm-6\" style=\"padding-left: 50px\">";
                                            tbl += "<div class=\"row\">";
                                            tbl += "<div class=\"col-sm-3\">";
                                            tbl += "<p> <strong>Grupo Fármaco:</strong></p>";
                                            tbl += "<p> <strong>Fármaco:</strong></p>";
                                            tbl += "<p> <strong>Edad Mínima:</strong></p>";
                                            tbl += "<p> <strong>Edad Máxima:</strong></p>";
                                            tbl += "</div>";
                                            tbl += "<div class=\"col-sm-3\">";
                                            tbl += "<p> "+value["tipo_especie"]+" </p>";
                                            tbl += "<p> "+value["nomFarmaco"]+" </p>";
                                            tbl += "<p> "+value["edad_minima"]+" </p>";
                                            tbl += "<p> "+value["edad_maxima"]+" </p>";
                                            tbl += "</div>";
                                            tbl += "</div>";
                                            tbl += "</div>";
                                            tbl += "<div class=\"col-sm-6\" >";
                                            tbl += "<div class=\"row\">";
                                            tbl += "<div class=\"col-sm-3\">";
                                            tbl += "<p> <strong>Vía de Aplicación:</strong></p>";
                                            tbl += "<p> <strong>Volumen:</strong></p>";
                                            tbl += "<p> <strong>Und. Medida:</strong></p>";
                                            tbl += "<p> <strong>Efectos:</strong></p>";
                                            tbl += "</div>";
                                            tbl += "<div class=\"col-sm-3\">";
                                            tbl += "<p> "+value["via_aplicacion"]+" </p>";
                                            tbl += "<p> "+value["volumen"]+" </p>";
                                            tbl += "<p> "+value["und_medidad"]+" </p>";
                                            tbl += "<p> "+value["efectos"]+" </p>";
                                            tbl += "</div>";
                                            tbl += "</div>";
                                            tbl += "</div>";
                                            tbl += "</div>";
                                            tbl += "<br>";
                                            tbl += "<table id=\"tblCalendario"+count+"\" name=\"tblCalendario\" class=\"table table table-striped \">";
                                            
                                            tbl += "</table>";
                                            tbl += "</div>";
                                            tbl += "</div>";
                                            tbl += "</div>";
                                            
                                            //////////////////
                                           count ++
                                           }
                                            //alert(value["ordenPauta"])
                                            
                                            
                                            //////////////////
                                           
                                             
                           
                              
                               farmaco_especie = val;
                               
                             });
                           //  tbl += "<legend >";
                             $("#detFarmaco").html(tbl);
                                for (var i=1; i<=count; i++) {
                                    // alert('count: '+i)
                                    $("#tblCalendario"+i).html('');
                                            tblPauta += "<tbody>   <tr>";
                                            tblPauta += "<th>N° Dosis </th>";
                                            tblPauta += "<th>Pauta</th>";
                                            tblPauta += "<th>Período</th>";
                                            tblPauta += "<th>Tipo de Pauta</th>";
                                            tblPauta += "<th>Fecha Programada</th>";
                                            tblPauta += "<th>Fecha Aplicación</th>";
                                            tblPauta += "<th>Acciones</th>";
                                            tblPauta += "</tr> ";
                                     $.each( data, function( key, value ) {
                                         
                                       //   alert('i:'+i+'rank: '+value["rank"]);
                                        
                                        // alert('key:'+ key)
                                         if(i == value["rank"]){
                                            tblPauta += "<tr>";
                                            tblPauta += "<th scope=\"row\">"+value["ordenPauta"]+"</th>";
                                            tblPauta += "<td>"+value["pauta"]+"</td>";
                                            tblPauta += "<td>"+value["periodo"]+"</td>";
                                            tblPauta += "<td>"+value["tipoPauta"]+"</td>";
                                            tblPauta += "<td>"+value["fechaProgramada"]+"</td>";
                                            tblPauta += "<td>"+value["fecAplicacion"]+"</td>";
                                            tblPauta += "<td>";
                                            if(value["idAtencion"] == 0 ){
                                                if(value["habilitado"] == 1){
                                                tblPauta += "<a href='#' onclick=addSer('"+idMascota+"','"+calendario+"','"+value["farmaco_especie"]+"','"+value["idPauta"]+"')><span style=\"color: green;\" class=\"glyphicon glyphicon-circle-arrow-up\" data-toggle=\"tooltip\" title=\"Registrar Atencion\"></span></a>";
                                               
                                            }else{
                                                  //tblPauta += "<td></td>";  
                                                }    
                                            }else{
                                                tblPauta += "<a href='#' onclick=verAtencion('"+value["idAtencion"]+"') data-toggle=\"tooltip\" title=\"Ver atención\" ><span class=\"glyphicon glyphicon-eye-open\" >&nbsp;</span></a>";
                                                
                                            }
                                            if(value["flag_Alergico"] > 0 ){
                                                tblPauta += "&nbsp;&nbsp;<a href='#' style=\"color: red;\" onclick=verAlergia("+calendario+","+idMascota+","+value["idPauta"]+") data-toggle=\"tooltip\" title=\"Ver Alergias / rechazos\" ><span class=\"glyphicon glyphicon-warning-sign\" >&nbsp;</span></a>";
                                            }
                                            tblPauta += "</td></tr>";
                                        }
                                       
                                     });
                                            
                                            tblPauta += "</tbody>";
                                    //        alert(tblPauta);
                                      $("#tblCalendario"+i).html(tblPauta);
                                      tblPauta= ' '
                                }
           
                                            
                                            
            
            
          //  $("#tblCalendario1").html(tbl3);
                                }
                    });
                
            }
            function verAlergia(calendario,mascota,pauta){
               callMODAL_Bootstrap_formulariosResulAleria("my_modal_AtencionAlergia", "Ver alergia / rechazo", '<iframe src="<?php echo getUrl(); ?>/atencion/verAlergia/&idCalendario='+calendario+'&idMascota='+mascota+'&idPauta='+pauta+' " width="650" height="450" scrolling="no" frameBorder="0" ></iframe>');
       
            }
            
             function callMODAL_Bootstrap_formulariosResulAleria(id_modal,titulo, contenido) {
            
                var modal = '';
                modal += '<div class="modal fade" id="'+id_modal+'\" data-backdrop="static"  data-keyboard="false"  tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">';
                modal += '<div class="modal-dialog\" style=\"width:700px;height:500px;\" role=\"document\">';
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
            
            function verAtencion(idAtencion){
               callMODAL_Bootstrap_formulariosResulAtend("my_modal_AtencionReg", "Ver Atención registrada", '<iframe src="<?php echo getUrl(); ?>/atencion/verAtencion/&idAtencion='+idAtencion+' " width="650" height="450" scrolling="no" frameBorder="0" ></iframe>');
       
            }
            
            function callMODAL_Bootstrap_formulariosResulAtend(id_modal,titulo, contenido) {
            
                var modal = '';
                modal += '<div class="modal fade" id="'+id_modal+'\" data-backdrop="static"  data-keyboard="false"  tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">';
                modal += '<div class="modal-dialog\" style=\"width:700px;height:500px;\" role=\"document\">';
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
            
            function addSer(idMascota,idCalendario,farmaco_especie,pauta){
               callMODAL_Bootstrap_formulariosResul("my_modal_addSer", "Registrar Resultado", '<iframe src="<?php echo getUrl(); ?>/atencion/addServicio/&idMascota='+idMascota+'&idCalendario='+idCalendario+'&farmaco_especie='+farmaco_especie+'&pauta='+pauta+' " width="650" height="450" scrolling="no" frameBorder="0" ></iframe>');
       
            }
            
            function callMODAL_Bootstrap_formulariosResul(id_modal,titulo, contenido) {
            
                var modal = '';
                modal += '<div class="modal fade" id="'+id_modal+'\" data-backdrop="static"  data-keyboard="false"  tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">';
                modal += '<div class="modal-dialog\" style=\"width:700px;height:500px;\" role=\"document\">';
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
            
            function addSer(idMascota,idCalendario,farmaco_especie,pauta){
               callMODAL_Bootstrap_formulariosResul("my_modal_addSer", "Registrar Resultado", '<iframe src="<?php echo getUrl(); ?>/atencion/addServicio/&idMascota='+idMascota+'&idCalendario='+idCalendario+'&farmaco_especie='+farmaco_especie+'&pauta='+pauta+' " width="650" height="450" scrolling="no" frameBorder="0" ></iframe>');
       
            }
            
            function callMODAL_Bootstrap_formulariosProximo(id_modal,titulo, contenido) {
            
                var modal = '';
                modal += '<div class="modal fade" id="'+id_modal+'\" data-backdrop="static"  data-keyboard="false"  tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">';
                modal += '<div class="modal-dialog\" style=\"width:1000px;height:600px;\" role=\"document\">';
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
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" onclick="" data-dismiss=\"modal\">Enviar por Correo</button>';
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\"  ><a href="javascript:imprSelec(\'divDetalleSiguientesVacunas\')" style=\"color: white;\">Imprimir</a></button>';
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" onclick="cerrarModal()" data-dismiss=\"modal\">Salir</button>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';

             //alert(modal);

                $("#myModal_total_formularios").html(modal);
                $("#"+id_modal).modal();
            }
            
         function imprSelec(nombre) {
                var ficha = document.getElementById(nombre);
            //    alert('ficha'+ficha)
                var ventimp = window.open(' ', 'popimpr');
                ventimp.document.write( ficha.innerHTML );
                ventimp.document.close();
                ventimp.print( );
                ventimp.close();
                
               
              }     
         
         
         function llenardiv(div1){
           // alert(div1);
          //  var htm = $("#divDetalleSiguientesVacunas").parent().html();
           $("#divDetalleSiguientesVacunas").html('');
           $("#divDetalleSiguientesVacunas").html(div1);
           
    }
    
    function confirmaFinalizacion(){

            callMODAL_Bootstrap_Finalizacion("my_modal_Finalizacion", "Confirmación", '<h5>¿Desea finalizar la atención?</h5>');
           }
           
             function callMODAL_Bootstrap_Finalizacion(id_modal,titulo, contenido) {
            
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
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" onclick="finalizarAtencion()" data-dismiss=\"modal\">Guardar</button>';
                modal += '<button type=\"button\" class=\"btn btn-primary\" id=\"modal_aceptar\" name=\"modal_aceptar\" onclick="cerrarModal()" data-dismiss=\"modal\">Cancelar</button>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';
                modal += '</div>';

             //alert(modal);

                $("#myModal_total_formularios").html(modal);
                $("#"+id_modal).modal();
            }
            
            function finalizarAtencion() {
                var idCita = '<?php echo $_SESSION["CLIENTEATENCION_SESSION"][0]["idCita"];?>';
                $.ajax({
                                type: "POST",
                                url: '<?php echo getUrl().'/atencion/finalizaAtencion';?>',
                                data:  {cita:idCita},
                                async:false,
                                cache:false,
                                dataType: "json",
                                success: function(data) {
                                    if(data == '1'){
                                    alert('Se atendio la cita satisfactoriamente.');
                                    RegresarListaEspera();
                                    }
                                }
                    });
            }
            
            function RegresarListaEspera(){
                window.location = '<?php echo getUrl().'/main/menu';?>';
            }
            

    
            
        </script>