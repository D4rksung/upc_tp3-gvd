
<body>
    <input type="hidden" name="idMascota" id="idMascota"  value="0" />
    <fieldset class="scheduler-border">
                <legend class="scheduler-border">Datos del Cliente</legend>
                       <section>
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title"></h3>
                    </div>
                    <div class="panel-body">
                        <div id="table-responsive" class="table-responsive">

                            <table id="tblCliente" name="tblCliente" class="table table-striped">
                                <tbody><tr>
                        <th>Nombre</th>
                        <th>Número de Documento</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>E-mail</th>
                        </tr></tbody>
                                
                  </table>
                             <div id="totalReg"></div>
                             <div id="paginacion" >
                                                                
                                 </div>
                            
                    </div>
                    </div>
                    </div>
                    </section>        
                               
		</fieldset>
                <fieldset class="scheduler-border">
                               <legend class="scheduler-border">Datos de la Mascota</legend>
                               <section>
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title"></h3>
                    </div>
                    <div class="panel-body">
                        <div id="table-responsive" class="table-responsive">

                            <table id="tblMascota" name="tblMascota" class="table table-striped">
                                <tbody><tr>
                        <th>Nombre</th>
                        <th>Especie</th>
                        <th>Raza</th>
                        <th>Género</th>
                        <th>Tamaño</th>
                        <th>FechaNacimiento</th>
                        <th>Peso (Kg)</th>
                        <th>Acciones</th>
                        </tr></tbody>
                                
                  </table>
                             <div id="totalReg"></div>
                             <div id="paginacion" >
                                                                
                                 </div>
                            
                    </div>
                    </div>
                    </div>
                    </section> 
                               
		</fieldset>
    <div id="detProximaVacuna">
                
    </div> <br>
    <div class="row" id="crearCal">
            <div class="col-md-6">
              <input type="button" class="btn btn-danger" id="save" name="save" value="Registrar Seguimiento"/>
            </div>
              
    </div> <br>
    </body>
<div id="myModal_total_formularios">
</div>

  

<script type="text/javascript">
    var divGrl =  ' ';
    
	$(document).ready(function() {
             
            //listaDetalleProximaVacuna();
            BusquedaCliente('<?php echo $_SESSION["CLIENTESEGUIMIENTO_SESSION"];?>')
            BusquedaMascota('<?php echo $_SESSION["CLIENTESEGUIMIENTO_SESSION"];?>')
            $("#save").click( function () {
                var idMascota= $("#idMascota").val();
            callMODAL_Bootstrap_formularios("my_modal_addCal", "Registrar Resultado de Seguimiento", '<iframe src="<?php echo getUrl(); ?>/seguimiento/addSeguimiento/&idMascota='+idMascota+'" width="1100" height="550" scrolling="yes" frameBorder="0" ></iframe>');
            })
            
        });
        
        
        
        function listaDetalleProximaVacuna(idMascota,calendario){
            var tbl = ' ';
            var count = 1;
            var tblPauta = ' ';
            $("#idMascota").val(idMascota);
                    
                       $.ajax({
                                type: "POST",
                                url: '<?php echo getUrl().'/atencion/detalleCalendarioMascota';?>',
                                data:  {idCalendario:calendario,idMascota:idMascota},
                                async:false,
                                cache:false,
                                dataType: "json",
                                success: function(data) {
                                    $("#detProximaVacuna").html('');
                                    var farmaco_especie = '0';
                                   
                                    $.each( data, function( key, value ) {
                                        
                                        var val = value["farmaco_especie"];
                                 //alert('val:' +val + ' var:' + farmaco_especie)
                                    
                                        if(val != farmaco_especie){
                                          
                                            tbl += "<div class=\"panel panel-primary\">";
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
                                            tbl += "</div>";
                                            tbl += "<div class=\"col-sm-3\">";
                                            tbl += "<p> "+value["tipo_especie"]+" </p>";
                                            tbl += "</div>";
                                            tbl += "</div>";
                                            tbl += "</div>";
                                            tbl += "<div class=\"col-sm-6\" >";
                                            tbl += "<div class=\"row\">";
                                            tbl += "<div class=\"col-sm-3\">";
                                            tbl += "<p> <strong>Fármaco:</strong></p>";
                                            tbl += "</div>";
                                            tbl += "<div class=\"col-sm-3\">";
                                            tbl += "<p> "+value["nomFarmaco"]+" </p>";
                                            tbl += "</div>";
                                            tbl += "</div>";
                                            tbl += "</div>";
                                            tbl += "</div>";
                                            tbl += "<br>";
                                            tbl += "<table id=\"tblProxima"+count+"\" name=\"tblProxima\" class=\"table table table-striped \">";
                                            
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
                             $("#detProximaVacuna").html(tbl);
                                for (var i=1; i<=count; i++) {
                                    // alert('count: '+i)
                                    $("#tblProxima"+i).html('');
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
                                         
                                      //    alert('i:'+i+'rank: '+value["rank"]);
                                        
                                        // alert('key:'+ key)
                                         if(i == value["rank"]){
                                            tblPauta += "<tr>";
                                            tblPauta += "<th scope=\"row\">"+value["ordenPauta"]+"</th>";
                                            tblPauta += "<td>"+value["pauta"]+"</td>";
                                            tblPauta += "<td>"+value["periodo"]+"</td>";
                                            tblPauta += "<td>"+value["tipoPauta"]+"</td>";
                                            tblPauta += "<td>"+value["fechaProgramada"]+"</td>";
                                            tblPauta += "<td>"+value["fecAplicacion"]+"</td>";
                                            
                                           
                                            if(value["idAtencion"] != 0 ){
                                                tblPauta += "<td>Atendido</td>";  
                                            }else{
                                                if(value["fechaProgramada"] != '' ){
                                                    tblPauta += "<td>Pendiente</td>";  
                                                }else{
                                                    tblPauta += "<td>Por Programar</td>";  
                                                }
                                            }
                                            
                                            tblPauta += "</tr>";
                                        }
                                       
                                     });
                                            
                                            tblPauta += "</tbody>";
                                    //        alert(tblPauta);
                                      $("#tblProxima"+i).html(tblPauta);
                                      tblPauta= ' '
                                }
             var   div1 = $("#detProximaVacuna").html();                         
        //    parent.llenardiv(div1);
                                            
                                            
            
            
          //  $("#tblCalendario1").html(tbl3);
                                }
                    });
                    
                
            }
            
             function addVac(id){

            callMODAL_Bootstrap_formularios("my_modal_addCal", "Registrar Resultado de Seguimiento", '<iframe src="<?php echo getUrl(); ?>/seguimiento/addSeguimiento/&id='+id+'" width="1100" height="550" scrolling="yes" frameBorder="0" ></iframe>');
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
            
           
           function  finalizaRegistro(){
               $("#my_modal_addCal").modal('hide');
             window.location = '<?php echo getUrl().'/main/seguimiento'; ?>';
           }
           
           function BusquedaCliente(idCliente){
              
                var tbl = '';
                $.ajax({
                                type: "POST",
                                url: '<?php echo getUrl().'/seguimiento/getCliente';?>',
                                data:  {idCliente:idCliente},
                                dataType: "json",
                                success: function(data) {
                                
                                    $("#tblCliente").html('')
                                   
                                    tbl +=" <tbody><tr>";
                                    tbl +=" <th>Nombre</th>";
                                    tbl +=" <th>Número de Documento</th>";
                                    tbl +=" <th>Teléfono</th>";
                                    tbl +=" <th>Dirección</th>";
                                    tbl +=" <th>E-mail</th>"; 
                                    tbl +=" </tr></tbody>";
                                      
                                    $.each( data, function( key, value ) {
                                        tbl += "<tr>";
                                        tbl += "<td>"+value["NombreCliente"]+"</td>";
                                        tbl += "<td>"+value["NumeroDocumento"]+"</td>";
                                        tbl += "<td>"+value["Telefono"]+"</td>";
                                        tbl += "<td>"+value["Direccion"]+"</td>";
                                        tbl += "<td>"+value["email"]+"</td>";  
                                        tbl += "</tr>";
                                      });
                                      tbl +=" </tr></tbody>  ";  
                                      
                                      $("#tblCliente").html(tbl);
                                    
                                }
                            
                                        
                                    
                                
                        
                });
            }
               
               function BusquedaMascota(idCliente){
              
                var tbl = '';
                $.ajax({
                                type: "POST",
                                url: '<?php echo getUrl().'/seguimiento/getMascota';?>',
                                data:  {idCliente:idCliente},
                                dataType: "json",
                                success: function(data) {
                                
                                    $("#tblMascota").html('')
                                   
                                    tbl +=" <tbody><tr>";
                                    tbl +=" <th>Nombre</th>";
                                    tbl +=" <th>Especie</th>";
                                    tbl +=" <th>Raza</th>";
                                    tbl +=" <th>Género</th>";
                                    tbl +=" <th>Tamaño</th>"; 
                                    tbl +=" <th>Fecha de Nacimiento</th>"; 
                                    tbl +=" <th>Peso (Kg)</th>"; 
                                    tbl +=" <th>Acciones</th>"; 
                                    tbl +=" </tr></tbody>";
                                      
                                    $.each( data, function( key, value ) {
                                        tbl += "<tr>";
                                        tbl += "<td>"+value["NombreMascota"]+"</td>";
                                        tbl += "<td>"+value["DescripcionEspecie"]+"</td>";
                                        tbl += "<td>"+value["NombreRaza"]+"</td>";
                                        tbl += "<td>"+value["Genero"]+"</td>";
                                        tbl += "<td>"+value["DescripcionTamanio"]+"</td>";  
                                        tbl += "<td>"+value["FechaNacimientoMascota"]+"</td>";
                                        tbl += "<td>"+value["peso"]+"</td>";
                                        tbl += "<td> <a href='#' onclick=listaDetalleProximaVacuna('"+value["IdMascota"]+"','"+value["calendario"]+"')><span style=\"color: green;\" class=\"glyphicon glyphicon-circle-arrow-up\" data-toggle=\"tooltip\" title=\"ver Vacunas\"></span></a>&nbsp;";
                                        tbl += "<a href='#' onclick=verSeguimientoRe('"+value["IdMascota"]+"') data-toggle=\"tooltip\" title=\"Historial de Seguimiento\" ><span class=\"glyphicon glyphicon-eye-open\" >&nbsp;</span></a></td>";
                                        tbl += "</tr>";
                                      });
                                      tbl +=" </tr></tbody>  ";  
                                      
                                      $("#tblMascota").html(tbl);
                                    
                                }
                            
                                        
                                    
                                
                        
                });
            }
            
      function verSeguimientoRe(idMascota){
               callMODAL_Bootstrap_formulariosResulSeguimiento("my_modal_AtencionReg", "Ver Atención registrada", '<iframe src="<?php echo getUrl(); ?>/seguimiento/verSeguimiento/&idMascota='+idMascota+' " width="850" height="450" scrolling="no" frameBorder="0" ></iframe>');
            }
            
            function callMODAL_Bootstrap_formulariosResulSeguimiento(id_modal,titulo, contenido) {
            
                var modal = '';
                modal += '<div class="modal fade" id="'+id_modal+'\" data-backdrop="static"  data-keyboard="false"  tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">';
                modal += '<div class="modal-dialog\" style=\"width:900px;height:500px;\" role=\"document\">';
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
        
     </script>
    