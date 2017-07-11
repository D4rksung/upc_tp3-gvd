<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>

-->
<script src="<?php echo getUrl(); ?>/js/jquery-1.11.3.min.js"></script>
 <link href="<?php echo getUrl(); ?>/lib/bootstrap-3/css/bootstrap-datepicker.min.css" rel="stylesheet">
 <link href="<?php echo getUrl(); ?>/lib/bootstrap-3/css/bootstrap.min.css" rel="stylesheet">
 <script src="<?php echo getUrl(); ?>/lib/bootstrap-3/js/bootstrap.min.js"></script>



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

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">PetCenter</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Gestión de Hospedaje</a></li>
        <li class="active"><a href="#">Gestión de Vacunación y Desparasitación</a></li>
        <li><a href="#">Gestión de Clínicas de Referencia</a></li>
        <li><a href="#">Gestión de Peluquería</a></li>
        <li><a href="#">Sistema</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo getUrl(); ?>/main/salir"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>

    
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
        <div class="bs-example" data-example-id="simple-nav-stacked"> 
    <ul class="nav nav-pills nav-stacked nav-pills-stacked-example"> 
        <?php foreach($listaMenu as $menu){?>
         <li role="presentation" class=""><a href="<?php echo getUrl()."/main/".$menu["enlace"]?>"><?php echo $menu["nombrePermiso"]?></a></li>             
         <?php }?>
    </ul> 
</div>
       
         
    </div>
    <div class="col-sm-9 text-left"> 
    <br><br><br>
    
    <?php 
    
    if(isset($_SESSION["ENLACE_SESSION"])){
        include $_SESSION["ENLACE_SESSION"];
        }else{ ?>
    Bienvenido(a) al sistema: <?php echo $_SESSION["PERSONA_SESSION"][0]["nombres"].' '.$_SESSION["PERSONA_SESSION"][0]["apellidos"] ?>
        <?php }?>
    </div>
 
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>

</body>
</html>

<script type="text/javascript">
    $(document).ready(function() {
      
  
});
 </script>