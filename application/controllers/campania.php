<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of campania
 *
 * @author DESARROLLADOR04_USI
 */
class campania {
     protected $modelo;
        protected $service;
        protected $upload;
        protected $dao;
	public function __construct () {
       
            $this->modelo = new Modelo();
            $this->dao = new CampaniaDAO();
            //$this->upload = new UploadHandler();
           // $this->service = new nusoap_client(WS_PATH, 'wsdl');
	}
        
          public function listaEspera(){
                         
             $getListaEspera = $this->dao->getListaEspera();             
             echo json_encode($getListaEspera);
         }
         public function clientes(){
           //  $id =  $_SESSION["CAMPANIAATENCION_SESSION"][0]["id"];
             $_SESSION["ENLACE_SESSION"] = "clientesCampania.php";
             Redireccionar(getUrl()."/main/menu");
             //require_once( ROOT . '/application/views/menu.php' );
         }
         
         
          public function atender(){
             $id =  $_GET['id'];
             //echo '>>>>id>> '.$id;
             
              $datosCampania = $this->dao->getDatosCampania($id);
              $turnoCampania = $this->dao->getTurnoCampania($id);
          //   $listaMascota = $this->dao->getEspecie();
            // $listaGrupoFarmaco = $this->modelo->getGrupoFarmaco();
             $_SESSION["ENLACE_SESSION"] = "campania.php";
             
             $_SESSION["CAMPANIAATENCION_SESSION"] = $datosCampania;
             $_SESSION["CAMPANIATURNO_SESSION"] = $turnoCampania;
          //   print_r(_SESSION["CLIENTEATENCION_SESSION"]);
            // $_SESSION["GRUPO_FARMACO_SESSION"] = $listaGrupoFarmaco;
             //print_r($_SESSION["GRUPO_FARMACO_SESSION"]);
             Redireccionar(getUrl()."/main/menu");
             
         }
         public function getCliente(){
             $documento =  $_POST["documento"];
             
             $getCliente = $this->dao->getClienteDoc($documento);
             echo json_encode($getCliente);
             
         }
         
         public function getClienteID(){
             $idCliente =  $_POST["idCliente"];
             
             $getCliente = $this->dao->getClienteID($idCliente);
             echo json_encode($getCliente);
             
         }
         
          public function getMascotaCliente(){
             $idCliente =  $_POST["idCliente"];
             
             $getMascota = $this->dao->getMascotaCli($idCliente);
             echo json_encode($getMascota);
             
         }
         
         public function addcliente(){
            //$id =  $_GET['id'];
            //echo '>>$id: '.$id;
            //  $getCalendarioID  = $this->dao->getCalendarioID($id);
             
            // $nameCalendario = $getCalendarioID[0]["nombre"];
            //  $especieCalendario = $getCalendarioID[0]["especie"];
              require_once( ROOT . '/application/views/agregarCliente.php' );
         }
         public function addMascota(){
            //$idEspecie =  $_POST['idEspecie'];
            $id =  $_GET['id'];
            //echo '>>$id: '.$id;
              $getEspecie = $this->dao-> getEspecie();
             
            // $nameCalendario = $getCalendarioID[0]["nombre"];
            //  $especieCalendario = $getCalendarioID[0]["especie"];
              require_once( ROOT . '/application/views/agregarMascota.php' );
         }
        public function getRaza(){
         $idEspecie =  $_POST['idEspecie'];
         $getRaza = $this->dao-> getRaza($idEspecie);
         echo json_encode($getRaza);
        }
         public function formCliente(){
             $cboTipoDoc =  $_POST["cboTipoDoc"];
             $txtDocumento =  $_POST["txtDocumento"];
             $txtNombre =  $_POST["txtNombre"];
             $txtApellidos =  $_POST["txtApellidos"];
             $txtDireccion =  $_POST["txtDireccion"];
             $txtTelefono =  $_POST["txtTelefono"];
             $txtNacimiento =  $_POST["txtNacimiento"];
             $txtEmail =  $_POST["txtEmail"];
             
             $txtNacimiento = substr($txtNacimiento,6, 4).substr($txtNacimiento,3, 2).substr($txtNacimiento,0, 2);
             $getExisteCli = $this->dao-> getExisteCliente($txtDocumento);
             $getInsert = Array('id' => '0');
                     
             if(count($getExisteCli) == 0){
             $getInsert = $this->modelo->registrarCliente($cboTipoDoc,$txtDocumento,$txtNombre,$txtApellidos,$txtDireccion,$txtTelefono,$txtNacimiento,$txtEmail);
            // echo '>>>>$setMensaje: '.$setMensaje;
          //  print_r($getInsert);
             //echo json_encode($getInsert);             
             }
             echo json_encode($getInsert);
         }
          public function formMascota(){
                
            // $cboEspecie =  $_POST["cboEspecie"];
             $cboRaza =  $_POST["cboRaza"];
             $txtNombre =  $_POST["txtNombre"];
             $cboGenero =  $_POST["cboGenero"];
             $cboTamaño =  $_POST["cboTamaño"];
             $txtPeso =  $_POST["txtPeso"];
             $txtNacimiento =  $_POST["txtNacimiento"];
             $idCliente =  $_POST["idCliente"];
             
             $txtNacimiento = substr($txtNacimiento,6, 4).substr($txtNacimiento,3, 2).substr($txtNacimiento,0, 2);
                            
           //  $getInsert = 
            $this->dao->registrarMascota($txtNombre,$cboGenero,$txtNacimiento,$idCliente,$cboTamaño,$cboRaza,$txtPeso);
            // echo '>>$id:'.$id.'>>$idMascota:'.$idMascota;
              $setMensaje = '1';
             echo json_encode($setMensaje);
         }
         
           public function atenderCliente(){
             $idCliente =  $_GET['idCliente'];
             $IdMascota =  $_GET['IdMascota'];
             //echo '>>>>id>> '.$id;
             
              $listaCliente = $this->dao->getClienteAtencionCampania($idCliente,$IdMascota);
          //   $listaMascota = $this->dao->getEspecie();
            // $listaGrupoFarmaco = $this->modelo->getGrupoFarmaco();
             $_SESSION["ENLACE_SESSION"] = "atencionCampania.php";
             $_SESSION["CLIENTEATENCION_SESSION"] = $listaCliente;
          //   print_r(_SESSION["CLIENTEATENCION_SESSION"]);
            // $_SESSION["GRUPO_FARMACO_SESSION"] = $listaGrupoFarmaco;
             //print_r($_SESSION["GRUPO_FARMACO_SESSION"]);
          //   exit();
             Redireccionar(getUrl()."/main/menu");
             
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
              require_once( ROOT . '/application/views/resultadoAtencionCampania.php' );
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
             $idCampania =  $_POST['idCampania'];
             $txtFechaAplicacionOnly = substr($txtFechaAplicacionOnly,6, 4).substr($txtFechaAplicacionOnly,3, 2).substr($txtFechaAplicacionOnly,0, 2);
             $txtFechaAplicacionDate = substr($txtFechaAplicacionDate,6, 4).substr($txtFechaAplicacionDate,3, 2).substr($txtFechaAplicacionDate,0, 2);
             
             $txtFechaAplicacion = $txtFechaAplicacionOnly;
             if($cboAmbito != 44){
                $txtFechaAplicacionDate = $txtFechaAplicacionDate;
             }
                     
           /*  echo '$cboReultado:'.$cboReultado;
             echo '$cboAmbito:'.$cboAmbito;
             echo '$cboOrigen:'.$cboOrigen;
             echo '$txtResultado:'.$txtResultado;
             echo '$txtFechaAplicacion:'.$txtFechaAplicacion;*/
             
             $this->dao->registrarResultadoAtencion($idMascota,$idCalendario,$farmaco_especie,$pauta,$txtFechaAplicacion,$cboReultado,$cboAmbito,$cboOrigen,$txtResultado,$idCampania);
            // echo '>>$id:'.$id.'>>$idMascota:'.$idMascota;
              $setMensaje = '1';
             echo json_encode($setMensaje);
        }
        
          
         
}
