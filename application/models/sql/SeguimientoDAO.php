<?php
require_once (ROOT ."/application/models/factory/DataSource.php");
require_once (ROOT ."/application/models/dto/Usuarios.php");
require_once (ROOT ."/application/models/dao/ISeguimiento.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Seguimiento
 *
 * @author JAIRO
 */
class SeguimientoDAO implements ISeguimiento{
   
    public function getSeguimientoServicio($inicio,$fin,$txtFechaInicio,$txtFechaFin) {
            $arrayReturn = array();
            $strPag = " ";
            if($inicio == '0' && $fin =='0'){
                $strPag = " ";
            }else{
                $strPag = " OFFSET ".$inicio." ROWS FETCH NEXT ".$fin." ROWS ONLY ";
            }
            $sql =                 
            "  select idCliente,NombreCliente+' '+ApellidoCliente as NombreCliente,NumeroDocumento,Direccion,
                FechaNacimientoCliente,Telefono,email, count(Distinct IdMascota) as CantidadMascota, count(fechaProgramada) cantidadDosis
                from GVD_VIEW_Seguimiento_Atenciones
                where idAtencion = 0 and right(fechaProgramada,4)+SUBSTRING(fechaProgramada,4,2)+left(fechaProgramada,2) >= ?
                and convert(varchar(15),fechaProgramada,112) <= ? and 
		idCliente not in (select distinct cliente from GVD_Seguimiento_servicio where convert(varchar(15),fechaRegistro,112)
		 = convert(varchar(15),getdate() - '05:00',112))
                group by idCliente,NombreCliente,ApellidoCliente,NumeroDocumento,Direccion,FechaNacimientoCliente,Telefono,email order by NombreCliente ".$strPag;

            
            $params = array($txtFechaInicio,$txtFechaFin);
           //  echo '>>sql:'.$sql;
           //  print_r($params);
            $data_source = new DataSource();
            $query = $data_source->getListado($sql,$params);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "idCliente" => $result["idCliente"],
                        "NombreCliente" => $result["NombreCliente"],
                           "NumeroDocumento" => $result["NumeroDocumento"],
                           "Direccion" => $result["Direccion"],
                           "FechaNacimientoCliente" => $result["FechaNacimientoCliente"],
                           "Telefono" => $result["Telefono"],                        
                        "email" => $result["email"],
                        "CantidadMascota" => $result["CantidadMascota"],
                        "cantidadDosis" => $result["cantidadDosis"]                            
                       );
                }
            }
             $data_source->closeConn(); 
            return $arrayReturn;
	}
                       
        public function getSeguimientoRegistrado($idMascota) {
            $arrayReturn = array();
       
            $sql =                 
            "   select  
                convert(varchar(15),fecharegistro,103) as fecharegistro,
                case resultado when 1 then 'Cita' when 2 then 'No contactado' else 'No Desea' end as resultado ,
                detalle,case when a.cita > 0 then 'Si' else 'No' end as cita,
                isnull(convert(varchar(15),b.fecha,103),'-') as fechaCita,isnull(b.hora,'-') as horaCita, 
                case when a.cita > 0 then 
                        case when estado = 1 then 'Atendido' else 
                                case when fecha < getdate() then 'No atendido' else 'Pendiente' end end 
                                else '-' end as estadoCita
                from [dbo].[GVD_Seguimiento_servicio]  a
                left join GC_Cita b on a.cita = b.idCita
                where mascota = ? ";

            
            $params = array($idMascota);
           //  echo '>>sql:'.$sql;
           //  print_r($params);
            $data_source = new DataSource();
            $query = $data_source->getListado($sql,$params);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "fecharegistro" => $result["fecharegistro"],
                        "resultado" => $result["resultado"],
                           "detalle" => $result["detalle"],
                           "cita" => $result["cita"],
                           "fechaCita" => $result["fechaCita"],
                           "horaCita" => $result["horaCita"],                        
                        "estadoCita" => $result["estadoCita"]                          
                       );
                }
            }
             $data_source->closeConn(); 
            return $arrayReturn;
	}
        
        public function getSeguimientoCliente($idCliente) {
            $arrayReturn = array();
       
            $sql =                 
            "  select idCliente,NombreCliente+' '+ApellidoCliente as NombreCliente,NumeroDocumento,Direccion,
                FechaNacimientoCliente,Telefono,email
                from GVD_VIEW_Seguimiento_Atenciones
                where idCliente = ?
                group by idCliente,NombreCliente,ApellidoCliente,NumeroDocumento,Direccion,FechaNacimientoCliente,Telefono,email order by NombreCliente ";

            
            $params = array($idCliente);
           //  echo '>>sql:'.$sql;
           //  print_r($params);
            $data_source = new DataSource();
            $query = $data_source->getListado($sql,$params);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "idCliente" => $result["idCliente"],
                        "NombreCliente" => $result["NombreCliente"],
                           "NumeroDocumento" => $result["NumeroDocumento"],
                           "Direccion" => $result["Direccion"],
                           "FechaNacimientoCliente" => $result["FechaNacimientoCliente"],
                           "Telefono" => $result["Telefono"],                        
                        "email" => $result["email"]                          
                       );
                }
            }
             $data_source->closeConn(); 
            return $arrayReturn;
	}
        
        public function getSeguimientoMascota($idCliente) {
            $arrayReturn = array();
       
            $sql =                 
            "   select calendario,idCliente,IdMascota,NombreMascota,Genero,DescripcionTamaño as DescripcionTamanio,DescripcionEspecie,NombreRaza,convert(varchar(15),FechaNacimientoMascota,103) as FechaNacimientoMascota,peso 
                from GVD_VIEW_Seguimiento_Atenciones
                where idCliente = ?
                group by calendario,idCliente,IdMascota,NombreMascota,Genero,DescripcionTamaño,DescripcionEspecie,NombreRaza,convert(varchar(15),FechaNacimientoMascota,103),peso ";

            
            $params = array($idCliente);
           //  echo '>>sql:'.$sql;
           //  print_r($params);
            $data_source = new DataSource();
            $query = $data_source->getListado($sql,$params);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "calendario" => $result["calendario"],
                           "idCliente" => $result["idCliente"],
                        "IdMascota" => $result["IdMascota"],
                           "NombreMascota" => $result["NombreMascota"],
                        "Genero" => $result["Genero"],
                           "DescripcionTamanio" => $result["DescripcionTamanio"],
                           "DescripcionEspecie" => $result["DescripcionEspecie"],
                           "NombreRaza" => $result["NombreRaza"],                        
                        "FechaNacimientoMascota" => $result["FechaNacimientoMascota"],     
                           "peso" => $result["peso"]      
                       );
                }
            }
             $data_source->closeConn(); 
            return $arrayReturn;
	}
        
        
           public function  registrarDetalleCita($idCita,$txtServicio){
            
            $sql = "insert into GC_DetalleCita (idCita,idServicio,Estado) values (?,?,0)";
            $params = array($idCita,$txtServicio);
            //echo '>>> $sql'.$sql;
           // print_r($params);
            $data_source = new DataSource();
            $query = $data_source->insertRow($sql,$params);
            $data_source->closeConn();
        }
        
        public function  registrarSeguimientoCita($IdMascota,$cboResultadoSeguimiento,$idCita,$txtComentarios,$IdCliente){
            
            $sql = "insert into GVD_Seguimiento_servicio (mascota,resultado,cita,detalle,cliente,fechaRegistro) values (?,?,?,?,?,getdate() - '05:00')";
            $params = array($IdMascota,$cboResultadoSeguimiento,$idCita,$txtComentarios,$IdCliente);
            //echo '>>> $sql'.$sql;
           // print_r($params);
            $data_source = new DataSource();
            $query = $data_source->insertRow($sql,$params);
            $data_source->closeConn();
        }
         public function  registrarSeguimiento($IdMascota,$cboResultadoSeguimiento,$txtComentarios,$IdCliente){
             
            $sql = "insert into GVD_Seguimiento_servicio (mascota,resultado,detalle,cliente,fechaRegistro) values (?,?,?,?,getdate() - '05:00')";
            $params = array($IdMascota,$cboResultadoSeguimiento,$txtComentarios,$IdCliente);
          //  echo '>>> $sql'.$sql;
         //   print_r($params);
        //    exit();
            $data_source = new DataSource();
            $query = $data_source->insertRow($sql,$params);
            $data_source->closeConn();
        }
        
}
