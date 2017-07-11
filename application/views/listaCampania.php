<div class="col-xs-12">
    <div class="box">
      <div class="contenido-ficha">
                      <h1 class="text-center">Campañas Activas</h1>
          <br><br><br>
          <div style="font-weight: bold;">
<table id="reloj" border='0'>
<tr>
<td><div id=''>Fecha Actual:&nbsp;&nbsp;27/06/2017&nbsp;&nbsp;</div></td>
<td><div id='hora'></div></td>
<td><div>:</div></td>
<td><div id='minuto'></div></td>
<td><div>:</div></td>
<td><div id='segundo'></div></td>
</tr>
</table>
              </div>
          <br><br>
          <section>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Listado de Campañas</h3>
                    </div>
                    <div class="panel-body">
                        <div id="table-responsive" class="table-responsive">

                            <table id="tblEspera" name="tblEspera" class="table table-striped">
                                <tbody><tr>
                        <th>Nombre de la Campaña</th>
                        <th>Dirección</th>
                        <th>Especie(s)</th>
                        <th>Tipo(s) de Fármaco(s)</th>
                        <th>Seleccionar</th>
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
        listaEspera();
 
     });
     
function listaEspera(){
               
       var tbl = "";
                $.ajax({
                                type: "POST",
                                url: '<?php echo getUrl().'/campania/listaEspera';?>',
                               
                                dataType: "json",
                                success: function(data) {
                                    $("#tblEspera").html('')
                                        tbl +=" <tbody><tr>";
                                        tbl +=" <th>Nombre de la Campaña</th>";
                                        tbl +=" <th>Dirección</th>";
                                        tbl +=" <th>Especie(s)</th>";
                                        tbl +=" <th>Tipo(s) de Fármaco(s)</th>";
                                        tbl +=" <th>Seleccionar</th>    ";                                       
                                       $.each( data, function( key, value ) {
                                           tbl += "<tr >";
                                           tbl += "<td>"+value["nombreCampania"]+"</td>";
                                           tbl += "<td>"+value["direccion"]+"</td>";
                                           tbl += "<td>"+value["DescripcionEspecie"]+"</td>";
                                           tbl += "<td>"+value["tipoFarmaco"]+"</td>";
                                           tbl += "<td><a href=\"<?php echo getUrl(); ?>/campania/atender/&id="+value["id"]+"\" ><span style=\"color: green;\" class=\"glyphicon glyphicon-circle-arrow-up\" data-toggle=\"tooltip\" title=\"Atender Campaña\">&nbsp;</span></a></td>";
                                           });
                                      tbl +=" </tr></tbody>  ";  
                                      $("#tblEspera").html(tbl);
                                    
                                }
                                
                            });

        }
        function atender(id){
            alert(id);
        }
        Reloj();
            function Reloj() {
            var tiempo = new Date();
            var hora = tiempo.getHours();
            var minuto = tiempo.getMinutes();
            var segundo = tiempo.getSeconds();
            document.getElementById('hora').innerHTML = hora;
            document.getElementById('minuto').innerHTML = minuto;
            document.getElementById('segundo').innerHTML = segundo;
            setTimeout('Reloj()', 1000);
            str_hora = new String(hora);
            if (str_hora.length == 1) {
            document.getElementById('hora').innerHTML = '0' + hora;
            }
            str_minuto = new String(minuto);
            if (str_minuto.length == 1) {
            document.getElementById('minuto').innerHTML = '0' + minuto;
            }
            str_segundo = new String(segundo);
            if (str_segundo.length == 1) {
            document.getElementById('segundo').innerHTML = '0' + segundo;
            }
            }
         </script>