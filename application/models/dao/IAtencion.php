<?php

interface IAtencion {
    public function getListaEspera();
    public function getClienteAtencion($id);
    public function  registrarCalMascota($idMascota,$id);
    public function getDatosCalendarioMascota($idMascota);
    public function getDetalleCalendarioMascota($calendario,$mascota);
    public function getMaestra($combo);
    public function registrarResultadoAtencion($idMascota,$idCalendario,$farmaco_especie,$pauta,$txtFechaAplicacion,$cboReultado,$cboAmbito,$cboOrigen,$txtResultado,$idCita);
    public function updateCita($cita);
    public function getServicioAtendido($idAtencion);
    public function getDatosAlergicos($idCalendario,$idMascota,$idPauta);
    
}
