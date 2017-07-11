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
    <input type="hidden" name="idCalendarioH" id="idCalendarioH" value="0"/>
<div class="col-xs-12">
    <div class="box">
      <div class="contenido-ficha">
          <section>
              
              <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Listado de Calendarios</h3>
                    </div>
                    <div class="panel-body">
                        <div id="table-responsive" class="table-responsive">

                            <table id="tblCalendario" name="tblCalendario" class="table table-striped">
                                <tbody><tr>
                        <th>Calendario</th>
                        <th>Especie</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Tipo Calendario</th>

                        </tr>
                                </tbody>
                    
                    </table>
                            <div id="totalReg"></div>
                             <div id="paginacion" >
                                                                
                                 </div>
                    </div>
                    </div>
                    </div>
              
              <div class="panel panel-success" id="divVacunas" style="display: none;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Listado de Vacunas</h3>
                    </div>
                    <div class="panel-body">
                        <div id="table-responsive" class="table-responsive">

                            <table id="tblVacunas" name="tblVacunas" class="table table-striped">
                                <tbody><tr>
                        <th>Especie</th>
                        <th>Grupo Fármaco</th>
                        <th>Fármaco</th>
                        <th>Edad Mínima</th>
                        <th>Edad Máxima</th>
                        <th>Vía Aplicación</th>
                        <th>Volumen</th>
                        <th>Und. Medida</th>
                        <th>Efectos</th>
                        <th>Cant. Pautas</th>
                        <th>Opciones</th>

                        </tr>
                                </tbody>
                    
                    </table>
                            <div id="totalRegV"></div>
                             <div id="paginacionV" >
                                                                
                                 </div>
                    </div>
                    </div>
                    </div>
              
                <div class="panel panel-warning" id="divPauta" style="display: none;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Listado de Pautas</h3>
                    </div>
                    <div class="panel-body">
                        <div id="table-responsive" class="table-responsive">

                            <table id="tblPauta" class="table table-striped">
                                <tbody><tr>
                        <th>N° Dosis </th>
                        <th>Pauta</th>
                        <th>Período</th>
                        <th>Tipo de Pauta</th>
                        <th>Opciones</th>
                        </tr></tbody>
                    </tr>
                    </table>
                             <div id="totalReg"></div>
                             <div id="paginacion" >
                                                                
                                 </div>
                    </div>
                    </div>
                    </div>
          </section>
      </div>
    </div>
</div>
</body>


 <script type="text/javascript">
	$(document).ready(function() {
            listaCalendario(0,10,<?php echo $id ;?>);
            
               $('#tblCalendario').on('click', '.clickable-row', function(event) {
                //$(this).addClass('selected').siblings().removeClass('selected');
                $(this).css("background", "lightcoral").siblings().removeAttr("style")
              }); 
              
              $('#tblVacunas').on('click', '.clickable-row', function(event) {
                //$(this).addClass('selected').siblings().removeClass('selected');
                $(this).css("background", "lightgreen").siblings().removeAttr("style")
              }); 
              
             
         
            
           /* $('#tblCalendario tr').click(function (event) {
                    //alert($(this).attr('id')); //trying to alert id of the clicked row          
                        alert('aaa')
               });
               
                $("tblCalendario").delegate("tr.rows", "click", function(){
                    alert("Click!");
                });
                 $('.table > tbody > tr').click(function() {
                // row was clicked
                alert('aaass')
            });*/
        });

 function listaCalendario(inicio,fin,id){
               
        var tbl = "";
        var tblPag = "";
        var pag = (inicio/10)+1;
                $.ajax({
                                type: "POST",
                                url: '<?php echo getUrl().'/atencion/listacalendario';?>',
                                data:  {inicio:inicio,fin:fin,id:id},
                                dataType: "json",
                                success: function(data) {
                                    //$('#gridAdminServicio').data('kendoGrid').dataSource.read();
                                 //   alert(data.total)
                                    
                                    $("#tblCalendario").html('')
                                    $("#paginacion").html('')
                                    $("#divVacunas").hide()
                                    $("#divPauta").hide()
                                    
                                       tbl +=" <tbody><tr>";
                                       tbl +=" <th width=\"25%\">Calendario</th>";
                                       tbl +=" <th>Especie</th>";
                                       tbl +=" <th>Fecha Inicio</th>";
                                       tbl +=" <th>Fecha Fin</th>";
                                       tbl +=" <th>Tipo Calendario</th>";
                                       tbl +="<th>Opciones</th>";
                                       
                                    $.each( data.registros, function( key, value ) {
                                        tbl += "<tr id="+key+" class=\"clickable-row\"> ";
                                        tbl += "<td>"+value["nombre"]+"</td>";
                                        tbl += "<td>"+value["especie"]+"</td>";
                                        tbl += "<td>"+value["fechaInicio"]+"</td>";
                                        tbl += "<td>"+value["fechaFin"]+"</td>";
                                        tbl += "<td>"+value["tipoCalendario"]+"</td>";
                                                                               
                                        if(value["flag_fecha"] > '20170620' ){
                                        tbl += "<td><a href='#' onclick=verVacunas('"+value["id"]+"') data-toggle=\"tooltip\" title=\"Ver vacunas\" ><span class=\"glyphicon glyphicon-eye-open\" >&nbsp;</span></a>";
                                        tbl += "<a href='#' onclick=asignarCal('"+value["id"]+"') ><span style=\"color: black;\" class=\"glyphicon glyphicon-saved\" data-toggle=\"tooltip\" title=\"Asignar Calendario\">&nbsp;</span></a></td>";
                                       }else{
                                           tbl += "<td>"; 
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
       
        
           function verVacunas(id){
               
        var tbl = "";
        var tblPag = "";
        var pag = (0/10)+1;
                $.ajax({
                                type: "POST",
                                url: '<?php echo getUrl().'/atencion/listaAsociarVacuna';?>',
                                data:  {inicio:0,fin:10,id:id},
                                dataType: "json",
                                success: function(data) {
                                    //$('#gridAdminServicio').data('kendoGrid').dataSource.read();
                                 //   alert(data.total)
                                    
                                    $("#tblVacunas").html('')
                                    $("#paginacionV").html('')
                                    $("#divPauta").hide()
                                    
                                        tbl +=" <tbody><tr>";
                                        tbl +="<th>Especie</th>";
                                        tbl +="<th>Grupo Fármaco</th>";
                                        tbl +="<th>Fármaco</th>";
                                        tbl +="<th>Edad Mínima</th>";
                                        tbl +="<th>Edad Máxima</th>";
                                        tbl +="<th>Vía Aplicación</th>";
                                        tbl +="<th>Volumen</th>";
                                        tbl +="<th>Und. Medida</th>";
                                        tbl +="<th>Efectos</th>";
                                        tbl +="<th>Cant. Pautas</th>";
                                       tbl +="<th>Opciones</th>";
                                                    
                                    $.each( data.registros, function( key, value ) {
                                        tbl += "<tr class=\"clickable-row\">";
                                        tbl += "<td>"+value["especie"]+"</td>";
                                        tbl += "<td>"+value["tipo_farmaco"]+"</td>";
                                        tbl += "<td>"+value["farmaco"]+"</td>";
                                        tbl += "<td>"+value["edad_minima"]+"</td>";
                                        tbl += "<td>"+value["edad_maxima"]+"</td>";
                                        tbl += "<td>"+value["via_aplicacion"]+"</td>";
                                        tbl += "<td>"+value["volumen"]+"</td>";
                                        tbl += "<td>"+value["und_medidad"]+"</td>";
                                        tbl += "<td>"+value["efectos"]+"</td>";
                                        tbl += "<td>"+value["cant_pautas"]+"</td>";
                                        tbl += "<td><a href='#' onclick=listaPauta('"+value["id"]+"') data-toggle=\"tooltip\" title=\"Editar\" ><span class=\"glyphicon glyphicon-eye-open\" >&nbsp;</span></a></td>";
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
                                      
                                      $("#totalRegV").html("<h5>Total de registros: "+data.total+" </h5>");
                                       $("#tblVacunas").html(tbl);
                                       $("#paginacionV").html(tblPag);
                                       $("#divVacunas").show();
                                }
                            });
                            
            
            
        }
        
         function listaPauta(id){
               
        var tbl = "";
        var tblPag = "";
        var pag = (0/10)+1;
                $.ajax({
                                type: "POST",
                                url: '<?php echo getUrl().'/atencion/listapauta';?>',
                                data:  {inicio:0,fin:10,id:id},
                                dataType: "json",
                                success: function(data) {
                                    //$('#gridAdminServicio').data('kendoGrid').dataSource.read();
                                 //   alert(data.total)
                                    
                                    $("#tblPauta").html('')
                                    $("#paginacion").html('')
                                    
                                       tbl +=" <tbody><tr>";
                                       tbl +=" <th>N° Dosis</th>";
                                       tbl +=" <th>Pauta</th>";
                                       tbl +=" <th>Período</th>";
                                       tbl +=" <th>Tipo de Pauta</th>";
                                       
                                    $.each( data.registros, function( key, value ) {
                                        tbl += "<tr class=\"clickable-row\">";
                                        tbl += "<td>"+value["num"]+"</td>";
                                        tbl += "<td>"+value["pauta"]+"</td>";
                                        tbl += "<td>"+value["periodo"]+"</td>";
                                        tbl += "<td>"+value["tipoPauta"]+"</td>";    tbl += "</tr>";
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
                                       $("#tblPauta").html(tbl);
                                       $("#paginacion").html(tblPag);
                                       $("#divPauta").show();
                                }
                            });
                            
            
            
        }
        
        function asignarCal(id){
        var idMascota = '<?php echo $id ;?>';
        
             $.ajax({
                                type: "POST",
                                url: '<?php echo getUrl().'/atencion/registraCalendarioMascota';?>',
                                data:  {id:id,idMascota:idMascota},
                                dataType: "json",
                                success: function(data) {
                                        
                                    if(data == '1'){
                                        alert('Calendario asignado satisfactoriamente');
                                        parent.cerrarModalAsignado(id);
                                    }
                                }
                        
                });
        
        }
        
         </script>