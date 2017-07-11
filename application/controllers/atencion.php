<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of atencion
 *
 * @author desarrollador04_usi
 */
class atencion {
    
    protected $modelo;
        protected $service;
        protected $upload;
        protected $dao;
	public function __construct () {
       
            $this->modelo = new Modelo();
            $this->dao = new AtencionDAO();
            //$this->upload = new UploadHandler();
           // $this->service = new nusoap_client(WS_PATH, 'wsdl');
	}
    
    public function listaEspera(){
                         
             $getListaEspera = $this->dao->getListaEspera();             
             echo json_encode($getListaEspera);
         }
         
         public function atender(){
             $id =  $_GET['id'];
             //echo '>>>>id>> '.$id;
             
              $listaCliente = $this->dao->getClienteAtencion($id);
          //   $listaMascota = $this->dao->getEspecie();
            // $listaGrupoFarmaco = $this->modelo->getGrupoFarmaco();
             $_SESSION["ENLACE_SESSION"] = "atencion.php";
             $_SESSION["CLIENTEATENCION_SESSION"] = $listaCliente;
          //   print_r(_SESSION["CLIENTEATENCION_SESSION"]);
            // $_SESSION["GRUPO_FARMACO_SESSION"] = $listaGrupoFarmaco;
             //print_r($_SESSION["GRUPO_FARMACO_SESSION"]);
             Redireccionar(getUrl()."/main/menu");
             
         }
         
         public function listacalendario(){
             $inicio =  $_POST["inicio"];
             $fin =  $_POST["fin"];
             $idMascota =  $_POST["id"];
           //  echo '$inicio:'. $inicio.'-'.$fin;
             $getCalendario = $this->modelo->getCalendarioAtencion($inicio,$fin,$idMascota);
             $getCalendarioTT = $this->modelo->getCalendarioAtencion('0','0',$idMascota);
            // echo '$getCalendarioTT:'.count($getCalendarioTT);
             $ArryCalTT =  array('total' => count($getCalendarioTT));
             $ArryCalReg =  array('registros' => $getCalendario);
              $arregloCalendario = array_merge($ArryCalTT, $ArryCalReg);
             echo json_encode($arregloCalendario);
         }
         
          public function asignarCal(){
             $id =  $_GET['id'];
             //echo '>>$id: '.$id;
             //$getCalendarioID  = $this->dao->getCalendarioID($id);
             
             //$nameCalendario = $getCalendarioID[0]["nombre"];
             //$especieCalendario = $getCalendarioID[0]["especie"];
              require_once( ROOT . '/application/views/asignarCalendario.php' );
         }
         
         public function listaAsociarVacuna(){
             $inicio =  $_POST["inicio"];
             $fin =  $_POST["fin"];
             $calendario =  $_POST["id"];
       
            
             //echo '>>>>$especie: '.$especie;
           //  echo '$inicio:'. $inicio.'-'.$fin;
             $getCalendario = $this->modelo->getVacunaCalendario($inicio,$fin,$calendario);
             $getCalendarioTT = $this->modelo->getVacunaCalendario('0','0',$calendario);
            // echo '$getCalendarioTT:'.count($getCalendarioTT);
             $ArryCalTT =  array('total' => count($getCalendarioTT));
             $ArryCalReg =  array('registros' => $getCalendario);
              $arregloCalendario = array_merge($ArryCalTT, $ArryCalReg);
             echo json_encode($arregloCalendario);
         }
         
         public function listaPauta(){
             $inicio =  $_POST["inicio"];
             $fin =  $_POST["fin"];
             $id =  $_POST["id"];
             
           //  echo '$inicio:'. $inicio.'-'.$fin;
             $getCalendario = $this->modelo->getPauta($inicio,$fin,$id);
             $getCalendarioTT = $this->modelo->getPauta('0','0',$id);
            // echo '$getCalendarioTT:'.count($getCalendarioTT);
             $ArryCalTT =  array('total' => count($getCalendarioTT));
             $ArryCalReg =  array('registros' => $getCalendario);
             $arregloCalendario = array_merge($ArryCalTT, $ArryCalReg);
             echo json_encode($arregloCalendario);
         }
         
         public function registraCalendarioMascota(){
             $id =  $_POST["id"];
             $idMascota =  $_POST["idMascota"];
             
             $this->dao->registrarCalMascota($idMascota,$id);
            // echo '>>$id:'.$id.'>>$idMascota:'.$idMascota;
              $setMensaje = '1';
             echo json_encode($setMensaje);
         }
         public function consultaCalAsignado(){
             $idMascota =  $_POST["idMascota"];
             
             $getCalendarioAsignado = $this->dao->getDatosCalendarioMascota($idMascota);
             echo json_encode($getCalendarioAsignado);
         }
         
         public function detalleCalendarioMascota(){
             $idCalendario =  $_POST["idCalendario"];
             $idMascota =  $_POST["idMascota"];
             $getCalendarioAsignado = $this->dao->getDetalleCalendarioMascota($idCalendario,$idMascota);
             echo json_encode($getCalendarioAsignado);
         }
         
        
         
         public function addServicio(){             
             $idMascota =  $_GET['idMascota'];
             $idCalendario =  $_GET['idCalendario'];
             $farmaco_especie =  $_GET['farmaco_especie'];
             $pauta =  $_GET['pauta'];
             $getResultado = $this->dao->getMaestra('cboReultado');
             $getAmbito = $this->dao->getMaestra('cboAmbito');
             $getOrigen = $this->dao->getMaestra('cboOrigen');
             
             //echo '>>$id: '.$id;
           //  $getCalendarioID  = $this->dao->getCalendarioID($id);
             
           //  $nameCalendario = $getCalendarioID[0]["nombre"];
           //  $especieCalendario = $getCalendarioID[0]["especie"];
              require_once( ROOT . '/application/views/resultadoAtencion.php' );
         }
         
          public function verAtencion(){             
             $idAtencion =  $_GET['idAtencion'];
             
             //echo '>>$id: '.$id;
             $getAtencion  = $this->dao->getServicioAtendido($idAtencion);
             
           //  $nameCalendario = $getCalendarioID[0]["nombre"];
           //  $especieCalendario = $getCalendarioID[0]["especie"];
              require_once( ROOT . '/application/views/verAtencionRegistrada.php' );
         }
         
         public function verAlergia(){             
             $idCalendario =  $_GET['idCalendario'];
             $idMascota =  $_GET['idMascota'];
             $idPauta =  $_GET['idPauta'];
             
             //echo '>>$id: '.$id;
             $getAlergia  = $this->dao->getDatosAlergicos($idCalendario,$idMascota,$idPauta);
          //   print_r($getAlergia);
           //  $nameCalendario = $getCalendarioID[0]["nombre"];
           //  $especieCalendario = $getCalendarioID[0]["especie"];
              require_once( ROOT . '/application/views/verAlergia.php' );
         }
         
        public function registraResultado(){
             $idMascota =  $_POST['idMascota'];
             $idCalendario =  $_POST['idCalendario'];
             $farmaco_especie =  $_POST['farmaco_especie'];
             $pauta =  $_POST['pauta'];
             $cboReultado =  $_POST['cboReultado'];
             $cboAmbito =  $_POST['cboAmbito'];
             $cboOrigen =  $_POST['cboOrigen'];
             $txtResultado =  $_POST['txtResultado'];
             $txtFechaAplicacionOnly =  $_POST['txtFechaAplicacionOnly'];
             $txtFechaAplicacionDate =  $_POST['txtFechaAplicacionDate'];
             $idCita =  $_POST['idCita'];
             $txtFechaAplicacionOnly = substr($txtFechaAplicacionOnly,6, 4).substr($txtFechaAplicacionOnly,3, 2).substr($txtFechaAplicacionOnly,0, 2);
             $txtFechaAplicacionDate = substr($txtFechaAplicacionDate,6, 4).substr($txtFechaAplicacionDate,3, 2).substr($txtFechaAplicacionDate,0, 2);
             
             $txtFechaAplicacion = $txtFechaAplicacionOnly;
             if($cboAmbito != 44){
                $txtFechaAplicacion = $txtFechaAplicacionDate;
             }
                     
           /*  echo '$cboReultado:'.$cboReultado;
             echo '$cboAmbito:'.$cboAmbito;
             echo '$cboOrigen:'.$cboOrigen;
             echo '$txtResultado:'.$txtResultado;
             echo '$txtFechaAplicacion:'.$txtFechaAplicacion;*/
             
             $this->dao->registrarResultadoAtencion($idMascota,$idCalendario,$farmaco_especie,$pauta,$txtFechaAplicacion,$cboReultado,$cboAmbito,$cboOrigen,$txtResultado,$idCita);
            // echo '>>$id:'.$id.'>>$idMascota:'.$idMascota;
              $setMensaje = '1';
             echo json_encode($setMensaje);
        }
        
        public function verProxVac(){
            $idMascota =  $_GET['idMascota'];
            $idCalendario =  $_GET['idCalendario'];
         //   echo '$idMascota:'.$idMascota;
          //  echo '$idCalendario:'.$idCalendario;
            require_once( ROOT . '/application/views/detalleProximasVacunas.php' );
        }
                
        public function finalizaAtencion(){
            $cita =  $_POST['cita'];            
            $this->dao->updateCita($cita);
            
            $_SESSION["ENLACE_SESSION"] = "listaEspera.php";
            
            $setMensaje = '1';
             echo json_encode($setMensaje);
            // Redireccionar(getUrl()."/main/menu");
        }
         
}
