<?php
require_once (ROOT ."/application/models/factory/DataSource.php");
require_once (ROOT ."/application/models/dto/Usuarios.php");
require_once (ROOT ."/application/models/dao/ICampania.php");

class CampaniaDAO implements ICampania {
    
     public function getListaEspera() {
            $arrayReturn = array();
            $sql =            
            " select a.id,a.nombre AS nombreCampania,direccion,  ".
            " case a.estado when 0 then 'Por Aprobar'  ".
            "          when 1 then 'Activo'  ".
            "          when 2 then 'Pendiente'  ".
            "          else 'Culminado' end as estadoCampania,Especie.DescripcionEspecie,tipoFarmaco ".
            " from [dbo].[GVD_Campania] a ".
            " inner join (SELECT DISTINCT campania, (SELECT STUFF((SELECT ', ' + DescripcionEspecie ".
            " FROM ( ".
            " select campania,DescripcionEspecie from GVD_Campania_especie a ".
            " inner join GCP_Especie b on b.CodigoEspecie =a.especie) A ".
            " where campania = B.campania ".
            "  FOR XML PATH('')),1,1,'')) AS DescripcionEspecie ".
            " FROM (select campania,DescripcionEspecie from GVD_Campania_especie a ".
            " inner join GCP_Especie b on b.CodigoEspecie =a.especie) B) as Especie on a.id= Especie.campania ".
            " inner join (SELECT DISTINCT campania, (SELECT STUFF((SELECT ', ' + nombre ". 
            " FROM ( ".
            " select campania,nombre from GVD_Campania_tipo_farmaco a ".
            " inner join GVD_tipo_farmaco b on b.ID =a.tipo_farmaco) A ".
            " where campania = B.campania ".
            "  FOR XML PATH('')),1,1,'')) AS tipoFarmaco ".
            " FROM (select campania,nombre from GVD_Campania_tipo_farmaco a ".
            " inner join GVD_tipo_farmaco b on b.ID =a.tipo_farmaco) B) tipo_farmaco on a.id= tipo_farmaco.campania ".
            " where a.estado = 1 ";
            
            $data_source = new DataSource();
            $query = $data_source->getListado($sql);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "id" => $result["id"],
                           "nombreCampania" => $result["nombreCampania"],
                           "direccion" => $result["direccion"],
                           "estadoCampania" => $result["estadoCampania"],
                           "DescripcionEspecie" => $result["DescripcionEspecie"],
                           "tipoFarmaco" => $result["tipoFarmaco"]
                       );
                }
            }
             $data_source->closeConn(); 
            return $arrayReturn;
	}
        
        public function getDatosCampania($id) {
            $arrayReturn = array();
            $sql =            
            " select a.id,a.nombre AS nombreCampania,direccion,  ".
            " case a.estado when 0 then 'Por Aprobar'  ".
            "          when 1 then 'Activo'  ".
            "          when 2 then 'Pendiente'  ".
            "          else 'Culminado' end as estadoCampania,Especie.DescripcionEspecie,tipoFarmaco ".
            " from [dbo].[GVD_Campania] a ".
            " inner join (SELECT DISTINCT campania, (SELECT STUFF((SELECT ', ' + DescripcionEspecie ".
            " FROM ( ".
            " select campania,DescripcionEspecie from GVD_Campania_especie a ".
            " inner join GCP_Especie b on b.CodigoEspecie =a.especie) A ".
            " where campania = B.campania ".
            "  FOR XML PATH('')),1,1,'')) AS DescripcionEspecie ".
            " FROM (select campania,DescripcionEspecie from GVD_Campania_especie a ".
            " inner join GCP_Especie b on b.CodigoEspecie =a.especie) B) as Especie on a.id= Especie.campania ".
            " inner join (SELECT DISTINCT campania, (SELECT STUFF((SELECT ', ' + nombre ". 
            " FROM ( ".
            " select campania,nombre from GVD_Campania_tipo_farmaco a ".
            " inner join GVD_tipo_farmaco b on b.ID =a.tipo_farmaco) A ".
            " where campania = B.campania ".
            "  FOR XML PATH('')),1,1,'')) AS tipoFarmaco ".
            " FROM (select campania,nombre from GVD_Campania_tipo_farmaco a ".
            " inner join GVD_tipo_farmaco b on b.ID =a.tipo_farmaco) B) tipo_farmaco on a.id= tipo_farmaco.campania ".
            " where a.estado = 1 and a.id=?";
            $params = array($id);
            $data_source = new DataSource();
            $query = $data_source->getListado($sql,$params);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "id" => $result["id"],
                           "nombreCampania" => $result["nombreCampania"],
                           "direccion" => $result["direccion"],
                           "estadoCampania" => $result["estadoCampania"],
                           "DescripcionEspecie" => $result["DescripcionEspecie"],
                           "tipoFarmaco" => $result["tipoFarmaco"]
                       );
                }
            }
             $data_source->closeConn(); 
            return $arrayReturn;
	}
        
        
          public function getExisteCliente($documento) {
            $arrayReturn = array();
            $sql =            
            "select  idCliente from GCP_Cliente where numeroDocumento = ? ";
            $params = array($documento);
            $data_source = new DataSource();
            $query = $data_source->getListado($sql,$params);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "idCliente" => $result["idCliente"]
                       );
                }
            }
             $data_source->closeConn(); 
            return $arrayReturn;
	}
        
          public function getTurnoCampania($id) {
            $arrayReturn = array();
            $sql =            
            " select  ".
            " campania as id, convert(varchar(15), fechaInicio, 103) +' '+left(convert(varchar(15), fechaInicio, 108),5) as fechaInicio, ".
            " convert(varchar(15), fechaFin, 103) +' '+left(convert(varchar(15), fechaFin, 108),5) as fechaFin ,".
            " case when convert(varchar(15), fechaFin, 112) < convert(varchar(15), getdate() - '05:00', 112) then 'Finalizado' ".
            " when convert(varchar(15), fechaFin, 112) = convert(varchar(15), getdate() - '05:00', 112) then 'En Curso' else 'Pendiente'  end as estado ".
            " from [dbo].[GVD_Campania_turno] where campania = ? ". 
            " order by fechaInicio ";
            $params = array($id);
            $data_source = new DataSource();
            $query = $data_source->getListado($sql,$params);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "id" => $result["id"],
                           "fechaInicio" => $result["fechaInicio"],
                           "fechaFin" => $result["fechaFin"],
                           "estado" => $result["estado"]
                       );
                }
            }
             $data_source->closeConn(); 
            return $arrayReturn;
	}
        
        public function getClienteDoc($documento) {
            $arrayReturn = array();
            $sql =            
            "select idCliente,nombreCliente +' '+ApellidoCliente as nombres, Direccion,Telefono,Email from [dbo].[GCP_Cliente] where NumeroDocumento = ? ";
            $params = array($documento);
            $data_source = new DataSource();
            $query = $data_source->getListado($sql,$params);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "idCliente" => $result["idCliente"],
                           "nombres" => $result["nombres"],
                           "Direccion" => $result["Direccion"],
                           "Telefono" => $result["Telefono"],
                           "Email" => $result["Email"]
                       );
                }
            }
             $data_source->closeConn(); 
            return $arrayReturn;
	}
        public function getClienteID($idCliente) {
            $arrayReturn = array();
            $sql =            
            "select idCliente,nombreCliente +' '+ApellidoCliente as nombres, Direccion,Telefono,Email from [dbo].[GCP_Cliente] where idCliente = ? ";
            $params = array($idCliente);
            $data_source = new DataSource();
            $query = $data_source->getListado($sql,$params);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "idCliente" => $result["idCliente"],
                           "nombres" => $result["nombres"],
                           "Direccion" => $result["Direccion"],
                           "Telefono" => $result["Telefono"],
                           "Email" => $result["Email"]
                       );
                }
            }
             $data_source->closeConn(); 
            return $arrayReturn;
	}
         public function getMascotaCli($idCliente) {
            $arrayReturn = array();
            $sql =            
            " select ".
            " IdMascota,NombreMascota as mascota,DescripcionEspecie  as especie, NombreRaza as raza ".
            " from GCP_Mascota c ".
            " inner join GCP_Raza d on c.CodigoRaza=d.CodigoRaza ".
            " inner join GCP_Especie e on d.CodigoEspecie=e.CodigoEspecie  ".
            " WHERE idCliente = ?";
            
            $params = array($idCliente);
            $data_source = new DataSource();
            $query = $data_source->getListado($sql,$params);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "IdMascota" => $result["IdMascota"],
                           "mascota" => $result["mascota"],
                           "especie" => $result["especie"],
                           "raza" => $result["raza"]
                       );
                }
            }
             $data_source->closeConn(); 
            return $arrayReturn;
	}
        
        public function  registrarCliente($cboTipoDoc,$txtDocumento,$txtNombre,$txtApellidos,$txtDireccion,$txtTelefono,$txtNacimiento,$txtEmail){
            
            $sql = " insert into GCP_Cliente (TipoDocumento,NumeroDocumento,NombreCliente,ApellidoCliente,Direccion,Telefono,FechaNacimiento,Email) values (?,?,?,?,?,?,?,?); SELECT @@IDENTITY as id;";
            $params = array($cboTipoDoc,$txtDocumento,$txtNombre,$txtApellidos,$txtDireccion,$txtTelefono,$txtNacimiento,$txtEmail);
          //  echo '>>> $sql'.$sql;
           // print_r($params);
            $data_source = new DataSource();
            $result = sqlsrv_query($data_source,$sql,$params);
           // $query = $data_source->insertRow($sql,$params);
            
            $next_result = sqlsrv_next_result($result); 
            $row = sqlsrv_fetch_array($result);
                    
            echo '>>$next_result:'.$next_result;           
            echo '>>$next_result:'.$row;           
            
            
        }
        
         public function getEspecie() {
            $arrayReturn = array();
            $sql = "select CodigoEspecie,DescripcionEspecie from GCP_Especie ";
           
            $data_source = new DataSource();
            $query = $data_source->getListado($sql);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "id" => $result["CodigoEspecie"],
                           "nombre" => $result["DescripcionEspecie"]
                       );
                }
            }
             $data_source->closeConn(); 
            return $arrayReturn;
	}
        
         public function getRaza($idEspecie) {
            $arrayReturn = array();
            $sql = "select CodigoRaza,NombreRaza from GCP_Raza where CodigoEspecie = ? ";
            $params = array($idEspecie);
          //  echo '$sql:'.$sql;
          //  print_r($params);
            $data_source = new DataSource();
            $query = $data_source->getListado($sql,$params);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "id" => $result["CodigoRaza"],
                           "nombre" => $result["NombreRaza"]
                       );
                }
            }
             $data_source->closeConn(); 
            return $arrayReturn;
	}
        
          public function  registrarMascota($txtNombre,$cboGenero,$txtNacimiento,$idCliente,$cboTamaño,$cboRaza,$txtPeso){
            
            $sql = "insert into GCP_Mascota (NombreMascota,Genero,FechaNacimiento,IdCliente,idTamaño,CodigoRaza,peso) values (?,?,?,?,?,?,?)";
            $params = array($txtNombre,$cboGenero,$txtNacimiento,$idCliente,$cboTamaño,$cboRaza,$txtPeso);
            //echo '>>> $sql'.$sql;
           // print_r($params);
            $data_source = new DataSource();
            $query = $data_source->insertRow($sql,$params);
            $data_source->closeConn();
        }
        
         public function getClienteAtencionCampania($IdCliente,$IdMascota) {
            $arrayReturn = array();
            $sql =  
                /*    "  select ".
                    "  'GVD-'+CONVERT(VARCHAR(10),fecha,112)+'-'+RIGHT('000'+CONVERT(VARCHAR(10),a.idcita),3) as ticket, ".
                    "  NombreCliente+' '+ ApellidoCliente as nombre,DescripcionEspecie  as especie, NombreRaza as raza, ".
                    "  NombreMascota as mascota,  ".
                    "  peso, descripcionTamaño as talla, Genero as sexo,  ".
                    "  hora, a.idcita as id, ".
                    "  CONVERT(VARCHAR(10),c.FechaNacimiento,103) as nacimiento, DATEDIFF(year,c.FechaNacimiento,getdate() - '05:00') AS edad ,  ".
                    "  c.IdMascota as idMascota,a.idcita as idCita   ".
                    "  from [GC_Cita] a  ".
                    "  inner join GCP_Cliente b on a.IdCliente=b.IdCliente  ".
                    "  inner join GCP_Mascota c on a.IdMascota=c.IdMascota  ".
                    "  inner join GCP_Raza d on c.CodigoRaza=d.CodigoRaza ".
                    "  inner join GCP_Especie e on d.CodigoEspecie=e.CodigoEspecie  ".
                    "  inner join GC_DetalleCita f on a.idcita=f.idcita ".
                    "  inner join GCP_Tamaño g on g.idTamaño=c.idTamaño ".
                    "  WHERE a.Estado = 0  and CONVERT(VARCHAR(10),a.fecha,112) = CONVERT(VARCHAR(10),getdate() - '05:00',112)  ".
                    "  and idServicio = 6 and b.IdCliente = ? and c.IdMascota = ? ";
            */
                   " select ".
                   "  NombreCliente+' '+ ApellidoCliente as nombre,DescripcionEspecie as especie, NombreRaza as raza, ".
                   "  NombreMascota as mascota, peso, descripcionTamaño as talla, Genero as sexo,  ".
                   "  CONVERT(VARCHAR(10),c.FechaNacimiento,103) as nacimiento, DATEDIFF(year,c.FechaNacimiento,getdate() - '05:00') AS edad , ".
                   "   c.IdMascota as idMascota , b.IdCliente as IdCliente".
                   "   from  GCP_Cliente b  ".
                   "   inner join GCP_Mascota c on b.IdCliente=c.IdCliente ".
                   "   inner join GCP_Raza d on c.CodigoRaza=d.CodigoRaza ".
                   "   inner join GCP_Especie e on d.CodigoEspecie=e.CodigoEspecie ".
                   "   inner join GCP_Tamaño g on g.idTamaño=c.idTamaño ".
                   "   WHERE  b.IdCliente = ? and c.IdMascota = ? ";
            $params = array($IdCliente,$IdMascota);
          //  echo '>>sql:'.$sql;
           // print_r($params);
            $data_source = new DataSource();
            $query = $data_source->getListado($sql,$params);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           //"ticket" => $result["ticket"],
                           "nombre" => $result["nombre"],
                           "especie" => $result["especie"],
                           "raza" => $result["raza"],
                           "mascota" => $result["mascota"],
                           "peso" => $result["peso"],
                           "talla" => $result["talla"],
                           "sexo" => $result["sexo"],
                          // "hora" => $result["hora"],
                          //  "id" => $result["id"],
                            "nacimiento" => $result["nacimiento"],
                            "edad" => $result["edad"],
                          "idMascota" => $result["idMascota"],
                        "IdCliente" => $result["IdCliente"]
                       );
                }
            }
             $data_source->closeConn(); 
            return $arrayReturn;
	}
        
        public function registrarResultadoAtencion($idMascota,$idCalendario,$farmaco_especie,$pauta,$txtFechaAplicacion,$cboReultado,$cboAmbito,$cboOrigen,$txtResultado,$idCampania){
        
         $sql =
          " insert into GVD_atencion_servicio_clinico (mascota,calendario,farmaco_especie,pauta, ".
          " fechaAplicacion,tipoResultado,ambito,oriRegistro, ".
          " desResultado,fechaRegistro,campania) values (?,?,?,?,?,?,?,?,?,getdate() - '05:00',?)";
            $params = array( $idMascota,$idCalendario,$farmaco_especie,$pauta,$txtFechaAplicacion,$cboReultado,$cboAmbito,$cboOrigen,$txtResultado,$idCampania);
           // echo ">>> $sql:".$sql;
          //  print_r($params);
          //  exit();
            $data_source = new DataSource();
            $query = $data_source->insertRow($sql,$params);
            $data_source->closeConn();
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
        
}
