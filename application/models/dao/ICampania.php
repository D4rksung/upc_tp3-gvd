<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author DESARROLLADOR04_USI
 */
interface ICampania {
    public function getListaEspera();
    public function getDatosCampania($id);
    public function getTurnoCampania($id) ;
    public function getClienteDoc($documento);
    public function getClienteID($idCliente);
     public function getEspecie();
     public function getRaza($idEspecie);
     public function  registrarMascota($txtNombre,$cboGenero,$txtNacimiento,$idCliente,$cboTamaño,$cboRaza,$txtPeso);
     public function getClienteAtencionCampania($IdCliente,$IdMascota);
     public function registrarResultadoAtencion($idMascota,$idCalendario,$farmaco_especie,$pauta,$txtFechaAplicacion,$cboReultado,$cboAmbito,$cboOrigen,$txtResultado,$idCampania);
public function getMaestra($combo);
public function getExisteCliente($documento);
     
}
