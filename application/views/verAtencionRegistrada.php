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
    <form id="frmReultado" action="main/formcalendario2" method="POST" > 
        
                        <div class="row" >
                    <div class="col-md-12" id="dvResultado">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Tipo de Resultado:<font size="2" color="red"> </font></div>
                                        <input type="text" maxlength="100" class="form-control" disabled="" id="txtCalendario" name="txtCalendario" value="<?php echo $getAtencion[0]["tipoResultado"]; ?>">
                                  </div>
                                </div>
                              </div>
                    </div>
        
        <div class="row" id="divAmbito">
                    <div class="col-md-12" id="dvAmbito">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Ambito:<font size="2" color="red"> </font></div>
                                        <input type="text" maxlength="100" class="form-control" disabled="" id="txtCalendario" name="txtCalendario" value="<?php echo $getAtencion[0]["ambito"]; ?>">
                                  </div>
                                </div>
                              </div>
                    </div>
        <?php if($getAtencion[0]["oriRegistro"] != ""){ ?>
        <div class="row" id="divOrigen"  >
                    <div class="col-md-12" id="dvOrigen">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Origen:<font size="2" color="red"> </font></div>
                                        <input type="text" maxlength="100" class="form-control" disabled="" id="txtCalendario" name="txtCalendario" value="<?php echo $getAtencion[0]["oriRegistro"]; ?>">
                                  
                                  </div>
                                </div>
                              </div>
                    </div>
        <?php } ?>
    <div class="row">
        
        <div class="col-md-12" id="dvResultadotxt">
                                <div class="form-group">
                                  <label class="sr-only" for="txtCod_Mod"></label>
                                  <div class="input-group">
                                    <div class="input-group-addon">Descripción Resultado:<font size="2" color="red"> </font></div>
                                        <textarea class="form-control" readonly maxlength="150" rows="5" name="txtResultado" id="txtResultado"><?php echo $getAtencion[0]["desResultado"]; ?></textarea>
                                   
                                  </div>
                                </div>
                              </div>
    </div>
         
              <div class="row" id="divFecApli" > 
                    <div class="col-md-12" id="txtApliacion">
                                <div class="form-group">
                                    <label class="sr-only" for="txtCod_Mod"></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Fecha de Aplicación:<font size="2" color="red"> </font></div>
				<input type="text" readonly class="form-control" name="txtFechaAplicacionOnly" id="txtFechaAplicacionOnly" value="<?php echo $getAtencion[0]["fechaAplicacion"]; ?>">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                   
    </div>

        <div class="row" id="crearCal">
            <div class="col-md-6">
              
            </div>
            
          </div>
         </form> 
     <div id="myModal_total_formularios" >
                
        </div>
    
    <br>
</body>

