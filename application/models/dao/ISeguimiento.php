<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author JAIRO
 */
interface ISeguimiento {
    public function getSeguimientoServicio($inicio,$fin,$txtFechaInicio,$txtFechaFin);
    public function getSeguimientoCliente($idCliente);
    public function getSeguimientoMascota($idCliente);
    public function  registrarDetalleCita($idCita,$txtServicio);
    public function  registrarSeguimientoCita($IdMascota,$cboResultadoSeguimiento,$idCita,$txtComentarios,$IdCliente);
    public function  registrarSeguimiento($IdMascota,$cboResultadoSeguimiento,$txtComentarios,$IdCliente);      
    public function getSeguimientoRegistrado($idMascota);
}
