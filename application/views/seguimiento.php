<div class="col-xs-12">
    <div class="box">
      <div class="contenido-ficha">
                            <section>
                            <h1 class="text-center">Seguimiento y Control de Servicio Clínico</h1>
                            <br><br>
                            <form id="frmCalendario" action="main/formcalendario2" method="POST" >
                                <input type="hidden" id="idHidden" name="idHidden" value="0"/>
          


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
              <input type="button" class="btn btn-danger" id="buscar" name="buscar" value="Buscar"/>
            </div>
              
          </div>
          
              
                            </form>
          </section>
          <br><br><br>

          <section>
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Listado de Próximas Atenciones</h3>
                    </div>
                    <div class="panel-body">
                        <div id="table-responsive" class="table-responsive">

                            <table id="tblSeguimiento" name="tblSeguimiento" class="table table-striped">
                                <tbody><tr>
                        <th>Nombre Cliente</th>
                        <th>Telefóno</th>
                        <th>Dirección</th>
                        <th>E-mail</th>
                        <th>Cantidad de Mascotas</th>
                        <th>Nº Dosis Pendientes</th>
                       
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
          
          
        <div id="myModal_total_formularios" >
                
        </div>
          
                    <br><br><br><br><br><br>
          </div>
          </div>
    </div>

 <script type="text/javascript">
	$(document).ready(function() {
            cargaSeguimiento();
            
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
 
            $("#buscar").click(function (){
                var txtFechaInicio = $("#txtFechaInicio").val();
                var txtFechaFin = $("#txtFechaFin").val();
                
                if(txtFechaInicio == "" || txtFechaFin == ""){
                    alert("Debe ingresar un rango de fechas validas")
                }else{
                BusquedaSeguimiento(0,10,txtFechaInicio,txtFechaFin)                
                }
            })
            
            
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
          
            
            $("#txtFechaFin").change(function() {
               var ini = $("#txtFechaInicio").val();
               var fin = $("#txtFechaFin").val(); 
               var fin2 = $("#txtFechaFin").val(); 
            //   alert('dia:'+dia)
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
               
                if( fin > 20190627){
                    alert('la fecha fin no puede ser mayor a 2 año de la fecha actual')
                    $("#txtFechaFin").val('');
                     return null;
                }
                    
                   
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
               
            });
             });
            function BusquedaSeguimiento(inicio,fin,txtFechaInicio,txtFechaFin){
               
                var tbl = '';
                var tblPag = '';
                var pag = (inicio/10)+1;
                $.ajax({
                                type: "POST",
                                url: '<?php echo getUrl().'/seguimiento/getSeguimiento';?>',
                                data:  {inicio:inicio,fin:fin,txtFechaInicio:txtFechaInicio,txtFechaFin:txtFechaFin},
                                dataType: "json",
                                success: function(data) {
                                
                                    $("#tblSeguimiento").html('')
                                    $("#paginacion").html('')
                                    tbl +=" <tbody><tr>";
                                    tbl +=" <th>Nombre Cliente</th>";
                                    tbl +=" <th>Teléfono</th>";
                                    tbl +=" <th>Dirección</th>";
                                    tbl +=" <th>E-mail</th>";
                                    tbl +=" <th>Cantidad de Mascotas</th>";
                                    tbl +=" <th>Nº Dosis Pendientes</th>     ";                  
                                    tbl +=" <th>Acciones</th>";
                                    tbl +=" </tr></tbody>";
                                    
                                      if(data.total == '0'){
                                         
                                      tbl +=" <tr>" ;
                                           tbl +="<td style=\"color: red;font-weight: bold;\">No se encontraron resultados </td>";
                                           tbl +=" </tr>" ;
                                      }
                                    $.each( data.registros, function( key, value ) {
                                        tbl += "<tr>";
                                        tbl += "<td>"+value["NombreCliente"]+"</td>";
                                        tbl += "<td>"+value["Telefono"]+"</td>";
                                        tbl += "<td>"+value["Direccion"]+"</td>";
                                        tbl += "<td>"+value["email"]+"</td>";          
                                        tbl += "<td>"+value["CantidadMascota"]+"</td>";   
                                        tbl += "<td>"+value["cantidadDosis"]+"</td>";
                                        tbl += "<td><a href='<?php echo getUrl(); ?>/seguimiento/verProxVac/&idCliente="+value["idCliente"]+"' ><span class=\"glyphicon glyphicon-ok-sign\" data-toggle=\"tooltip\" title=\"Realizar Seguimiento\">&nbsp;</span></a></td>";
                                        
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
                                       $("#tblSeguimiento").html(tbl);
                                       $("#paginacion").html(tblPag);
                                }
                            
                                        
                                    
                                
                        
                });
            }
            
       
        
        function paginat(page,total){
           if(page == 0){
                BusquedaSeguimiento(0,10);
           }else if(page == -1){
               var ultF = parseFloat(total/10)
               var ultI = parseInt(total/10)
               
               if((ultF - ultI) != 0){
                  ultI= ultI + 1
               }
               var paginas = (ultI-1)*10;
             
               BusquedaSeguimiento((ultI-1)*10,10);
            }else{
                BusquedaSeguimiento((page-1)*10,10);
            }
            
        }
        
        function cargaSeguimiento(){
          var f_inicio =  '<?php 
          
          if(isset($_SESSION['SEGUIMIENTOINICIO_SESSION'])){                
              echo $_SESSION["SEGUIMIENTOFIN_SESSION"];
          }else {
              echo'0';
          }?>';
          var f_fin =    '<?php 
          
          if(isset($_SESSION['SEGUIMIENTOFIN_SESSION'])){                
              echo $_SESSION["SEGUIMIENTOFIN_SESSION"];
          }else {
              echo'0';
          }?>';
          
          if (f_inicio != '0' && f_fin != '0' ){
               $("#txtFechaInicio").val(f_inicio);
              $("#txtFechaFin").val(f_fin);
              BusquedaSeguimiento(0,10,f_inicio,f_fin)
             
            }
        }
              </script>