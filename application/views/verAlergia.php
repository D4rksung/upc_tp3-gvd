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
      
<section>
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">Lista de alergia / rechazo</h3>
                    </div>
                    <div class="panel-body">
                        <div id="table-responsive" class="table-responsive">

                            <table id="tblalergia" class="table table-striped">
                                <tbody><tr>
                        <th>Fecha Atención </th>
                        <th>Resultado</th>
                        <th>Ámbito</th>
                        <th>Origen</th>
                        <th>Descripción</th>
                        </tr></tbody>
                    
                        <?php
                        foreach($getAlergia as $via2){?>
                               <tr>
                                   <td><?php echo $via2["fecAtencion"]?></td>
                                   <td><?php echo $via2["resultado"]?></td>
                                   <td><?php echo $via2["ambito"]?></td>
                                   <td><?php echo $via2["oriRegistro"]?></td>
                                   <td><?php echo $via2["desResultado"]?></td>
                                </tr>
                                                    
                        <?php }?>
                    
                    </table>
                             <div id="totalReg"></div>
                             <div id="paginacion" >
                                                                
                                 </div>
                    </div>
                    </div>
                    </div>
    
    
                    </section>
</body>

<script type="text/javascript">
    $(document).ready(function() {
  
  

       
        
    });
   
       
        
       
            
            
    
      </script>