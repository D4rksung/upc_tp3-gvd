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
    <div id="detProximaVacuna">
                
    </div> 
    
    </body>


  

<script type="text/javascript">
    var divGrl =  ' ';
    
	$(document).ready(function() {
             
            listaDetalleProximaVacuna();
        });
        
        function listaDetalleProximaVacuna(){
            var idMascota = '<?php echo $idMascota;?>';
            var calendario =  '<?php echo $idCalendario;?>';
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
            parent.llenardiv(div1);
                                            
                                            
            
            
          //  $("#tblCalendario1").html(tbl3);
                                }
                    });
                    
                
            }
            
           
            
      
        
     </script>
    