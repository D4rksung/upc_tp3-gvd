<?php

require_once (ROOT ."/application/models/factory/DataSource.php");
require_once (ROOT ."/application/models/dto/Usuarios.php");
require_once (ROOT ."/application/models/dao/IAtencion.php");

class AtencionDAO implements IAtencion{
    
    public function getListaEspera() {
            $arrayReturn = array();
            $sql =            
            " select ".
            " 'GVD-'+CONVERT(VARCHAR(10),fecha,112)+'-'+RIGHT('000'+CONVERT(VARCHAR(10),a.idcita),3) as ticket,".
            " NombreCliente+' '+ ApellidoCliente as nombre,DescripcionEspecie  as especie, NombreRaza as raza,".
            " NombreMascota as mascota, hora, a.idcita as id".
            " from [GC_Cita] a ".
            " inner join GCP_Cliente b on a.IdCliente=b.IdCliente ".
            " inner join GCP_Mascota c on a.IdMascota=c.IdMascota ".
            " inner join GCP_Raza d on c.CodigoRaza=d.CodigoRaza".
            " inner join GCP_Especie e on d.CodigoEspecie=e.CodigoEspecie ".
            " inner join GC_DetalleCita f on a.idcita=f.idcita".
            " WHERE a.Estado = 0  and CONVERT(VARCHAR(10),a.fecha,112) = CONVERT(VARCHAR(10),getdate() -'05:00' -'05:00',112) ".
            " and idServicio = 6".
            " order by a.fecha,a.hora";
            $data_source = new DataSource();
            $query = $data_source->getListado($sql);
           // echo '>>> $sql:'.$sql;
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "ticket" => $result["ticket"],
                           "nombre" => $result["nombre"],
                           "especie" => $result["especie"],
                           "raza" => $result["raza"],
                           "mascota" => $result["mascota"],
                           "hora" => $result["hora"],
                            "id" => $result["id"]
                       );
                }
            }
             $data_source->closeConn(); 
            return $arrayReturn;
	}
        
        public function getClienteAtencion($id) {
            $arrayReturn = array();
            $sql =            
                   /*" select 'GVD-'+CONVERT(VARCHAR(10),fechaInicio,112)+'-'+RIGHT('000'+CONVERT(VARCHAR(10),a.id),3) as ticket, ".
                   "  (nombres +' '+ apellidos) as nombre,e.nombre as especie,d.nombre as raza, ".
                   "  c.nombre  as mascota,peso,talla, case when sexo = 'M' then 'Macho' else 'Hembra' end as sexo, LEFT(CONVERT(VARCHAR(10),fechaInicio,108),5) AS hora, a.id,  ".
                   " CONVERT(VARCHAR(10),fecNacimiento,103) as nacimiento, DATEDIFF(year,fecNacimiento,getdate() -'05:00' -'05:00') AS edad , c.id as idMascota,a.id as idCita  from cita a ".
                   "  inner join cliente b on a.cliente=b.id ".
                   "  inner join mascota c on a.mascota=c.id ".
                   "  inner join raza d on c.raza=d.id ".
                   "  inner join especies e on d.especie=e.id ".
                   "  WHERE a.estado = 0 and a.tipo = 1 and CONVERT(VARCHAR(10),fechaInicio,112) = CONVERT(VARCHAR(10),getdate() -'05:00' -'05:00',112) ".
                   "  and a.id = ?";*/
                    "  select ".
                    "  'GVD-'+CONVERT(VARCHAR(10),fecha,112)+'-'+RIGHT('000'+CONVERT(VARCHAR(10),a.idcita),3) as ticket, ".
                    "  NombreCliente+' '+ ApellidoCliente as nombre,DescripcionEspecie  as especie, NombreRaza as raza, ".
                    "  NombreMascota as mascota,  ".
                    "  peso, descripcionTamaño as talla, Genero as sexo,  ".
                    "  hora, a.idcita as id, ".
                    "  CONVERT(VARCHAR(10),c.FechaNacimiento,103) as nacimiento, DATEDIFF(year,c.FechaNacimiento,getdate() -'05:00') AS edad ,  ".
                    "  c.IdMascota as idMascota,a.idcita as idCita   ".
                    "  from [GC_Cita] a  ".
                    "  inner join GCP_Cliente b on a.IdCliente=b.IdCliente  ".
                    "  inner join GCP_Mascota c on a.IdMascota=c.IdMascota  ".
                    "  inner join GCP_Raza d on c.CodigoRaza=d.CodigoRaza ".
                    "  inner join GCP_Especie e on d.CodigoEspecie=e.CodigoEspecie  ".
                    "  inner join GC_DetalleCita f on a.idcita=f.idcita ".
                    "  inner join GCP_Tamaño g on g.idTamaño=c.idTamaño ".
                    "  WHERE a.Estado = 0  and CONVERT(VARCHAR(10),a.fecha,112) = CONVERT(VARCHAR(10),getdate() -'05:00',112)  ".
                    "  and idServicio = 6 and a.idcita = ? ";
            
            $params = array($id);
   
            $data_source = new DataSource();
            $query = $data_source->getListado($sql,$params);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "ticket" => $result["ticket"],
                           "nombre" => $result["nombre"],
                           "especie" => $result["especie"],
                           "raza" => $result["raza"],
                           "mascota" => $result["mascota"],
                           "peso" => $result["peso"],
                           "talla" => $result["talla"],
                           "sexo" => $result["sexo"],
                           "hora" => $result["hora"],
                            "id" => $result["id"],
                            "nacimiento" => $result["nacimiento"],
                            "edad" => $result["edad"],
                          "idMascota" => $result["idMascota"],
                        "idCita" => $result["idCita"]
                       );
                }
            }
             $data_source->closeConn(); 
            return $arrayReturn;
	}
        
        public function  registrarCalMascota($idMascota,$id){
            
            $sql = "insert into GVD_Mascota_Clendario (mascota,calendario,fechaRegistro,estado) values (?,?,getdate() -'05:00',1)";
            $params = array( $idMascota,$id);
          //  echo '>>> $sql'.$sql;
           // print_r($params);
            $data_source = new DataSource();
            $query = $data_source->insertRow($sql,$params);
            $data_source->closeConn();
        }
        
        public function getDatosCalendarioMascota($idMascota) {
            $arrayReturn = array();
            $sql =            
                    " select a.mascota,a.calendario,b.nombre as nomCalendario,d.nombre as tipoCalendario ".
                    " ,CONVERT(VARCHAR(10),b.fechaInicio,103) as fechaInicio, ".
                    " CONVERT(VARCHAR(10),b.fechaFin,103) as fechaFin ".
                    " from GVD_Mascota_Clendario a ".
                    " inner join  GVD_calendarios b on a.calendario=b.id ".
                    " left join GVD_maestra d on b.tipoCalendario = d.id and d.campo = 'cboTipoCalendario' ".
                    " where mascota = ? and a.estado = 1 ";
            
            $params = array($idMascota);
         //   echo '>>$sql'.$sql;
           // print_r($params);
            $data_source = new DataSource();
            $query = $data_source->getListado($sql,$params);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "mascota" => $result["mascota"],
                           "calendario" => $result["calendario"],
                           "nomCalendario" => $result["nomCalendario"],
                           "tipoCalendario" => $result["tipoCalendario"],
                           "fechaInicio" => $result["fechaInicio"],
                           "fechaFin" => $result["fechaFin"]
                       );
                }
            }
             $data_source->closeConn(); 
            return $arrayReturn;
	}
        
        public function getDatosAlergicos($idCalendario,$idMascota,$idPauta) {
            $arrayReturn = array();
            $sql =            
                    " select CONVERT(VARCHAR(10),fechaAplicacion,103) fecAtencion,isnull(b.nombre,'-') as resultado,isnull(c.nombre,'-') as  ambito,
                        isnull(d.nombre,'-') as oriRegistro,desResultado
                       from GVD_atencion_servicio_clinico  a
                       left join GVD_maestra b on a.tipoResultado=b.id and b.campo = 'cboReultado'
                       left join GVD_maestra c on a.ambito=c.id and c.campo = 'cboAmbito'
                       left join GVD_maestra d on a.oriRegistro=d.id and d.campo = 'cboOrigen'
                       where calendario = ? and mascota = ? and pauta = ? and tiporesultado != 41 ";
            
            $params = array($idCalendario,$idMascota,$idPauta);
            //echo '>>$sql'.$sql;
           // print_r($params);
            $data_source = new DataSource();
            $query = $data_source->getListado($sql,$params);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "fecAtencion" => $result["fecAtencion"],
                           "resultado" => $result["resultado"],
                           "ambito" => $result["ambito"],
                           "oriRegistro" => $result["oriRegistro"],
                           "desResultado" => $result["desResultado"]
                       );
                }
            }
             $data_source->closeConn(); 
            return $arrayReturn;
	}
        public function getDetalleCalendarioMascota($calendario,$mascota) {
            $arrayReturn = array();
            $sql =                 
            " select distinct a.calendario,DENSE_RANK() OVER(ORDER BY a.farmaco_especie) as rank, a.farmaco_especie,e.id as id_tipo_especie,e.nombre as tipo_especie, ".
            " d.nombre as nomFarmaco , emin.nombre as edad_minima, emax.nombre as edad_maxima , vapl.nombre as via_aplicacion, ".
            " b.volumen, umed.nombre as und_medidad, b.efectos, ".
            " c.id as idPauta , orden as ordenPauta,c.pauta, ped.nombre as periodo, tpau.nombre as tipoPauta, ".
            " m.FechaNacimiento, ".
            " isnull(CASE WHEN tpau.id = 39 then convert(varchar(15),DATEADD(DAY,CAST(c.pauta AS INT),m.FechaNacimiento),103) else ".
            " CASE WHEN len(isnull(aser.fechaAplicacion,'')) =0 THEN convert(varchar(15),' ') ELSE ".
            " convert(varchar(15),DATEADD(week,CAST(c.pauta AS INT), ".
            " (SELECT fechaAplicacion FROM GVD_atencion_servicio_clinico gvdat where gvdat.calendario = a.calendario and gvdat.mascota = m.IdMascota and gvdat.pauta in ( ".
            " select gvdpa.id from GVD_pautas gvdpa  where gvdpa.farmaco_especie = b.id and gvdpa.orden in ".
            " ((select gvdpaOr.orden from GVD_pautas gvdpaOr where gvdpaOr.farmaco_especie = b.id and gvdpaOr.id = c.id) - 1))) ".
            " ),103) END END ,'') as fechaProgramada, ISNULL(aser.id,0) as idAtencion ". 
            " ,isnull(convert(varchar(15),aser.fechaAplicacion,103),'') as fecAplicacion, ". 
            " case when orden = 1 then ". 
            " case when ISNULL(aser.id,0) = 0 then '1' else '0' end ".
            " else ".
            "         case when ISNULL(aser.id,0) = 0 then ".
            "  case when  (select count(id) as id from GVD_atencion_servicio_clinico ".
            "                                 where a.calendario= calendario and  m.IdMascota = mascota and  pauta = ( ".
            "                                 select id from GVD_pautas where farmaco_especie = b.id and orden =( ".
            "                                 select orden from GVD_pautas where farmaco_especie = b.id and id = c.id) - 1) ) = 0 then '0' else '1' end ".
            "                                 else '0' end ".
            " end as habilitado ,  case when aserNo.id > 0 then 1 else 0 end as flag_Alergico".
            " from GVD_calendario_farmaco_especie a ".
           
            " inner join GVD_farmaco_especie b on a.farmaco_especie = b.id ".
            " inner join GVD_farmacos d on b.farmaco =d.id ".
            " inner join GVD_tipo_farmaco e on d.tipo_farmaco=e.id ".
            " left join GVD_maestra emin on emin.id=b.edad_minima and emin.campo = 'cboEdadMinima' ".
            " left join GVD_maestra emax on emax.id=b.edad_maxima and emax.campo = 'cboEdadMinima' ".
            " left join GVD_maestra vapl on vapl.id=b.via_aplicacion and vapl.campo = 'cboAplicacion' ".
          //  "  left join GVD_maestra vol on vol.id=b.volumen and vol.campo = 'cboVolumen' ".
            " left join GVD_maestra umed on umed.id=b.und_medidad and umed.campo = 'cboUndMedida' ".
            " inner join GVD_pautas c on b.id=c.farmaco_especie ".
            " left join GVD_maestra ped on ped.id=c.periodo and ped.campo = 'cboPeriodo' ".
            " left join GVD_maestra tpau on tpau.id=c.tipoPauta and tpau.campo = 'cboTipoPauta' ".
            " inner join GVD_Mascota_Clendario mc on mc.calendario = a.calendario ".
            " inner join GCP_Mascota m on mc.mascota=m.IdMascota ".
            " left join GVD_atencion_servicio_clinico aser on aser.pauta=c.id and a.calendario= a.calendario and m.IdMascota = aser.mascota and aser.tipoResultado = 41".
            " left join GVD_atencion_servicio_clinico aserNo on aserNo.pauta=c.id and a.calendario= a.calendario and m.IdMascota = aserNo.mascota  and aserNo.tipoResultado != 41".
            " where a.calendario = ? and mc.mascota = ? and mc.estado = 1 ".
            " order by a.calendario,a.farmaco_especie,orden ";
            
             //echo '>>sql:'.$sql;
            $params = array($calendario,$mascota);
            // print_r($params);
            $data_source = new DataSource();
            $query = $data_source->getListado($sql,$params);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "calendario" => $result["calendario"],
                        "rank" => $result["rank"],
                           "farmaco_especie" => $result["farmaco_especie"],
                           "id_tipo_especie" => $result["id_tipo_especie"],
                           "tipo_especie" => $result["tipo_especie"],
                           "nomFarmaco" => $result["nomFarmaco"],                        
                        "edad_minima" => $result["edad_minima"],
                        "edad_maxima" => $result["edad_maxima"],
                        "via_aplicacion" => $result["via_aplicacion"],
                        "volumen" => $result["volumen"],
                        "und_medidad" => $result["und_medidad"],
                        "efectos" => $result["efectos"],
                        "idPauta" => $result["idPauta"],
                        "ordenPauta" => $result["ordenPauta"],
                        "pauta" => $result["pauta"],
                        "periodo" => $result["periodo"],
                        "tipoPauta" => $result["tipoPauta"],
                        "fecNacimiento" => $result["FechaNacimiento"],
                        "fechaProgramada" => $result["fechaProgramada"],
                        "idAtencion" => $result["idAtencion"],
                        "fecAplicacion" => $result["fecAplicacion"],
                        "habilitado" => $result["habilitado"],
                        "flag_Alergico" => $result["flag_Alergico"]
                            
                       );
                }
            }
             $data_source->closeConn(); 
            return $arrayReturn;
	}
        
public function getMaestra($combo) {
            $arrayReturn = array();
            $sql = "select id,nombre from GVD_maestra where campo = ? and estado = 1  ";
            $params = array($combo);
            $data_source = new DataSource();
            $query = $data_source->getListado($sql,$params);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "id" => $result["id"],
                           "nombre" => $result["nombre"]
                       );
                }
            }
            $data_source->closeConn();
            return $arrayReturn;
	}
        
    public function registrarResultadoAtencion($idMascota,$idCalendario,$farmaco_especie,$pauta,$txtFechaAplicacion,$cboReultado,$cboAmbito,$cboOrigen,$txtResultado,$idCita){
        
         $sql =
          " insert into GVD_atencion_servicio_clinico (mascota,calendario,farmaco_especie,pauta, ".
          " fechaAplicacion,tipoResultado,ambito,oriRegistro, ".
          " desResultado,fechaRegistro,cita) values (?,?,?,?,?,?,?,?,?,getdate() -'05:00',?)";
            $params = array( $idMascota,$idCalendario,$farmaco_especie,$pauta,$txtFechaAplicacion,$cboReultado,$cboAmbito,$cboOrigen,$txtResultado,$idCita);
            $data_source = new DataSource();
            $query = $data_source->insertRow($sql,$params);
            $data_source->closeConn();
    }
       public function updateCita($cita){
            $sql = "update GC_Cita set estado = 1 where idcita = ?";
            $params = array($cita);
            $data_source = new DataSource();
            $query = $data_source->editRow($sql,$params);
            $data_source->closeConn();
            
        }
        
        public function getServicioAtendido($idAtencion) {
            $arrayReturn = array();
            $sql =            
                " select b.nombre as tipoResultado,d.nombre as ambito,isnull(e.nombre,'') as oriRegistro, ".
                " desResultado, convert(varchar(15),fechaAplicacion,103) as fechaAplicacion ".
                " from [dbo].[GVD_atencion_servicio_clinico] a ".
                " left join GVD_maestra b on a.tipoResultado = b.id  and b.campo = 'cboReultado' ".
                " left join GVD_maestra d on a.ambito = d.id  and d.campo = 'cboAmbito' ".
                " left join GVD_maestra e on a.oriRegistro = e.id  and e.campo = 'cboOrigen' ".
                " where a.id = ?";
            
            $params = array($idAtencion);
            
            $data_source = new DataSource();
            $query = $data_source->getListado($sql,$params);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "tipoResultado" => $result["tipoResultado"],
                           "ambito" => $result["ambito"],
                           "oriRegistro" => $result["oriRegistro"],
                           "desResultado" => $result["desResultado"],
                           "fechaAplicacion" => $result["fechaAplicacion"]
                       );
                }
            }
             $data_source->closeConn(); 
            return $arrayReturn;
	}
        
    
}
