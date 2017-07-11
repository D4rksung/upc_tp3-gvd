<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of seguimiento
 *
 * @author JAIRO
 */
class seguimiento {
     protected $modelo;
        protected $service;
        protected $upload;
        protected $dao;
	public function __construct () {
       
            $this->modelo = new Modelo();
            $this->dao = new SeguimientoDAO();
            //$this->upload = new UploadHandler();
           // $this->service = new nusoap_client(WS_PATH, 'wsdl');
	}
         public function verProxVac(){
         //   $idMascota =  $_GET['idMascota'];
            $idCliente =  $_GET['idCliente'];
         //   echo '$idMascota:'.$idMascota;
          //  echo '$idCalendario:'.$idCalendario;
        //    require_once( ROOT . '/application/views/detalleProximasVacunas.php' );
            
              $_SESSION["ENLACE_SESSION"] = "detalleProximasVacunasSeguimiento.php";
              $_SESSION["CLIENTESEGUIMIENTO_SESSION"] = $idCliente;
          //   print_r(_SESSION["CLIENTEATENCION_SESSION"]);
            // $_SESSION["GRUPO_FARMACO_SESSION"] = $listaGrupoFarmaco;
             //print_r($_SESSION["GRUPO_FARMACO_SESSION"]);
             Redireccionar(getUrl()."/main/menu");
        }
        public function addSeguimiento (){
            $idMascota =  $_GET['idMascota'];
            
              require_once( ROOT . '/application/views/registrarSeguimiento.php' );
        }
        
         public function getSeguimiento (){
             
             $inicio =  $_POST["inicio"];
             $fin =  $_POST["fin"];
             $txtFechaInicio =  $_POST["txtFechaInicio"];
             $txtFechaFin =  $_POST["txtFechaFin"];
             
             $_SESSION["SEGUIMIENTOINICIO_SESSION"] = $txtFechaInicio;
             $_SESSION["SEGUIMIENTOFIN_SESSION"] = $txtFechaFin;
             
             $txtFechaInicio = substr($txtFechaInicio,6, 4).substr($txtFechaInicio,3, 2).substr($txtFechaInicio,0, 2);
             $txtFechaFin = substr($txtFechaFin,6, 4).substr($txtFechaFin,3, 2).substr($txtFechaFin,0, 2);
           
            
              $getSeguimiento = $this->dao->getSeguimientoServicio($inicio,$fin,$txtFechaInicio,$txtFechaFin);
             $getSeguimientoTT = $this->dao->getSeguimientoServicio('0','0',$txtFechaInicio,$txtFechaFin);
            // echo '$getCalendarioTT:'.count($getCalendarioTT);
             $ArryCalTT =  array('total' => count($getSeguimientoTT));
             $ArryCalReg =  array('registros' => $getSeguimiento);
              $listaSeguimiento = array_merge($ArryCalTT, $ArryCalReg);
             echo json_encode($listaSeguimiento);
             
            
             
         }
         public function getCliente(){
             $idCliente =  $_POST["idCliente"];
             $getSeguimiento = $this->dao->getSeguimientoCliente($idCliente);
              echo json_encode($getSeguimiento);
         }
         
          public function getMascota(){
             $idCliente =  $_POST["idCliente"];
             $getSeguimiento = $this->dao->getSeguimientoMascota($idCliente);
              echo json_encode($getSeguimiento);
         }
          public function registroSeguimientoServ(){
               
                   
             $cboResultadoSeguimiento =  $_POST["cboResultadoSeguimiento"];
             $txtSede =  $_POST["txtSede"];
             $txtArea =  $_POST["txtArea"];
             $txtServicio =  $_POST["txtServicio"];
             $txtFechaInicio =  $_POST["txtFechaInicio"];
             $txtTurno =  $_POST["txtTurno"];
             $txtComentarios =  $_POST["txtComentarios"];
             $IdMascota =  $_POST["IdMascota"];
             $IdCliente =  $_POST["IdCliente"];
             $idCita = null;
             $txtFechaInicio = substr($txtFechaInicio,6, 4).substr($txtFechaInicio,3, 2).substr($txtFechaInicio,0, 2);
             
             if($cboResultadoSeguimiento == 1){                 
                    $idCita = $this->modelo->registrarCita($IdCliente,$IdMascota,$txtFechaInicio,$txtTurno,$txtSede); 
                  //  print_r($idCita);
                   // echo '>>$idCita:'.;
                    $this->dao->registrarDetalleCita($idCita[0]["id"],$txtServicio);   
                    $this->dao->registrarSeguimientoCita($IdMascota,$cboResultadoSeguimiento,$idCita[0]["id"],$txtComentarios,$IdCliente);
              }else{
                  $this->dao->registrarSeguimiento($IdMascota,$cboResultadoSeguimiento,$txtComentarios,$IdCliente);
              }
               
              $setMensaje = '1';
              echo json_encode($setMensaje);
         }
         
        public function verSeguimiento(){             
             $idMascota =  $_GET['idMascota'];
             
             //echo '>>$id: '.$id;
             $getSeguimiento  = $this->dao->getSeguimientoRegistrado($idMascota);
             
           //  $nameCalendario = $getCalendarioID[0]["nombre"];
           //  $especieCalendario = $getCalendarioID[0]["especie"];
              require_once( ROOT . '/application/views/verSeguimiento.php' );
         }         
}
