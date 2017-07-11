<?php 
require_once (ROOT ."/application/models/factory/DataSource.php");
require_once (ROOT ."/application/models/dto/Usuarios.php");
class Modelo {

	private $conexionDB;
        
        

	public function __construct () {
            
            $serverName=DB_HOST;
            $conectionInfo =array("Database"=>DB_NAME,"UID"=>DB_USER,"PWD"=>DB_PASS,"CharacterSet"=>"UTF-8");
           // $conn_sis = sqlsrv_connect($serverName,$conectionInfo);

          /*  if($conn_sis){
                    echo "conexion exitosa";
            }else{
                    echo "fallo conexion";
                    die(print_r(sqlsrv_errors(),true));
            }*/
		$this->conexionDB = sqlsrv_connect($serverName,$conectionInfo);
               // $this->conexionDB->stmt_init();
 		//$this->conexionDB->query("set character_set_results='utf8'");
                
		/*if ( $this->conexionDB->sqlsrv_errors ) {
			echo "Error de conexión con la base de datos, por favor, revisen los datos de configuración";
			exit;
		}*/
                
                if($this->conexionDB){
                  //  echo "conexion exitosa";
                  }else{
                    echo "fallo conexion";
                    die(print_r(sqlsrv_errors(),true));
            }
	}
        
        
        //----------------------------------------
        
             
        
        
    /*    public function getUsuario($login_username,$login_password) {
            $arrayReturn = array();
            $sql = "select a.id,a.nombres,a.apellidos,b.rol from usuarios a inner join usuarios_roles b on a.id=b.usuario where a.usuario = ? and a.clave= ? and a.estado = 1 ";
            $params = array($login_username, $login_password);
            $query = sqlsrv_query( $this->conexionDB, $sql,$params);
            if($query){
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    $arrayReturn[] = $db = array(
                           "id" => $result["id"],
                           "nombre" => $result["nombres"],
                           "apellido" => $result["apellidos"],
                           "rol" => $result["rol"]
                       );
                }
            }
           // sqlsrv_close($this->conexionDB);
           
            return $arrayReturn;
	} */
        
      /*  public function getUsuario($login_username,$login_password) {
            $arrayReturn = array();
            $data_source = new DataSource();
            $sql = "select a.id,a.nombres,a.apellidos,b.rol from usuarios a inner join usuarios_roles b on a.id=b.usuario where a.usuario = ? and a.clave= ? and a.estado = 1 ";
            //$data_table = $data_source->ejecutarConsulta("select a.id,a.nombres,a.apellidos,b.rol from usuarios a inner join usuarios_roles b on a.id=b.usuario where a.usuario = ".$login_username." and a.clave= ".$login_password." and a.estado = 1 ");
           $params = array($login_username, $login_password);
            $data_table = $data_source->getConsulta($sql,$params);
            
           //// $usuario = null;
            $usuarios = array();
            
            if(count($data_table) > 0){
                    foreach ($data_table as $table => $valor) {
                        $usuarios = new Usuarios();
                        $usuarios->setId($data_table[$table]["id"]);
                        $usuarios->setNombres($data_table[$table]["nombres"]);
                        $usuarios->setApellidos($data_table[$table]["apellidos"]);
                        $usuarios->setRol($data_table[$table]["rol"]);
                    }
            }     
            echo 'modelo>';
            print_r($usuarios);////////
            $data_source->closeConn();            
            return $data_table;
	} */
        
        
    /*    public function getMenu($rol) {
            $arrayReturn = array();
            $sql = "select id,nombre,enlace from permisos where rol = ? and estado = 1 ";
            $params = array($rol);
            $query = sqlsrv_query( $this->conexionDB, $sql,$params);
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "id" => $result["id"],
                           "nombre" => $result["nombre"],
                           "enlace" => $result["enlace"]
                       );
                }
            }
         //   sqlsrv_close($this->conexionDB);
            return $arrayReturn;
	}*/
        
       /* public function getEspecie() {
            $arrayReturn = array();
            $sql = "select id,nombre from especie where estado = 1 ";
           
            $query = sqlsrv_query( $this->conexionDB, $sql);
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
         //   sqlsrv_close($this->conexionDB);
            return $arrayReturn;
	}*/
       /* public function getTipoCalendario($tipo) {
            $arrayReturn = array();
            $sql = "select id,nombre from maestra where estado = 1 and campo = '".$tipo."'";
           
            $query = sqlsrv_query( $this->conexionDB, $sql);
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
         //   sqlsrv_close($this->conexionDB);
            return $arrayReturn;
	}*/
        
       /* public function getCalendario_Farmaco_Cal($id) {
            $arrayReturn = array();
            $sql = "select id,calendario,vacuna from calendario_farmaco where  calendario = '".$id."'";
           
            $query = sqlsrv_query( $this->conexionDB, $sql);
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "id" => $result["id"],
                           "calendario" => $result["calendario"],
                           "vacuna" => $result["vacuna"]
                       );
                }
            }
         //   sqlsrv_close($this->conexionDB);
            return $arrayReturn;
	}*/
       /* public function getCalendario_Farmaco($id) {
            $arrayReturn = array();
            $sql = "select id,calendario,vacuna from calendario_farmaco where  vacuna = '".$id."'";
           
            $query = sqlsrv_query( $this->conexionDB, $sql);
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "id" => $result["id"],
                           "calendario" => $result["calendario"],
                           "vacuna" => $result["vacuna"]
                       );
                }
            }
         //   sqlsrv_close($this->conexionDB);
            return $arrayReturn;
	}*/
       /* public function getGrupoFarmaco($especie) {
            $arrayReturn = array();
            $sql = "select id,nombre from tipo_farmaco where especie like '%".$especie."%' ";
           // $param = array($especie);
            $query = sqlsrv_query( $this->conexionDB, $sql);
            
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
            //sqlsrv_close($this->conexionDB);
            return $arrayReturn;
	}*/
        
      /*  public function getFarmaco($especie,$GrpoFarmaco) {
            $arrayReturn = array();
            $sql = "select id,nombre from farmaco where tipo_farmaco = ".$GrpoFarmaco."  and especie like '%".$especie."%' ";
            //$param = array($GrpoFarmaco);
            $query = sqlsrv_query( $this->conexionDB, $sql);
            
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
            //sqlsrv_close($this->conexionDB);
            return $arrayReturn;
	}*/
        
      
        
       /* public function getMaestra($combo) {
            $arrayReturn = array();
            $sql = "select id,nombre from maestra where campo = '".$combo."' and estado = 1  ";
            //$param = array($GrpoFarmaco);
            $query = sqlsrv_query( $this->conexionDB, $sql);
            
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
            //sqlsrv_close($this->conexionDB);
            return $arrayReturn;
	}*/
        
      /*  public function registrarAsociarVacuna  ($cboEspecie, $cboGrpoFarmaco, $cboFarmaco,$cboEdadMinima,$cboEdadMaxima,$cboAplicacion,$cboVolumen,$cboUndMedida,$efectos){
            
            $sql = "insert into asociar_farmaco (especie,tipo_farmaco,farmaco,edad_minima,edad_maxima,via_aplicacion,volumen,und_medidad,efectos,fechaCreacion,estado) values  (?,?,?,?,?,?,?,?,?,getdate() - '05:00',1)";
            $params = array($cboEspecie, $cboGrpoFarmaco, $cboFarmaco,$cboEdadMinima,$cboEdadMaxima,$cboAplicacion,$cboVolumen,$cboUndMedida,$efectos);
           // echo '>>>$sql:'.$sql;
            $query = sqlsrv_query( $this->conexionDB, $sql,$params);
            //sqlsrv_close($this->conexionDB);
        }
        */
        /*public function editarAsociarVacuna ($cboEdadMinima,$cboEdadMaxima,$cboAplicacion,$cboVolumen,$cboUndMedida,$efectos,$id){
            
            
             $sql = "update asociar_farmaco set edad_minima = ?, edad_maxima = ?,via_aplicacion =?,volumen=?, und_medidad=?, efectos = ?, fechaActualizacion = getdate() - '05:00' where id = ?";
             
            $params = array($cboEdadMinima,$cboEdadMaxima,$cboAplicacion,$cboVolumen,$cboUndMedida,$efectos,$id);
           // echo '>>>$sql:'.$sql;
            $query = sqlsrv_query( $this->conexionDB, $sql,$params);
            //sqlsrv_close($this->conexionDB);
        }*/
        /*public function agregarVacunaCalendario  ($calendario,$farmacoAsociado ){
            
            $sql = "insert into calendario_farmaco (calendario,vacuna,fechaCreacion) values  (?,?,getdate() - '05:00')";
            $params = array($calendario,$farmacoAsociado );
           // echo '>>>$sql:'.$sql;
            $query = sqlsrv_query( $this->conexionDB, $sql,$params);
            //sqlsrv_close($this->conexionDB);
        }
        public function eliminarVacunaCalendario  ($calendario,$farmacoAsociado ){
            
            $sql = "delete from calendario_farmaco where calendario =? and vacuna = ?";
            $params = array($calendario,$farmacoAsociado );
           // echo '>>>$sql:'.$sql.'-$calendario:'.$calendario.'-$farmacoAsociado:'.$farmacoAsociado;
            $query = sqlsrv_query( $this->conexionDB, $sql,$params);
            //sqlsrv_close($this->conexionDB);
        }    */
       
            
     /*   public function  registrarPauta( $id,$txtPauta, $cboPeriodo, $cboTipoPauta){
            
            $sql = "insert into pauta (asociar_farmaco,pauta,periodo,tipoPauta,fechaCreacion,estado) values (?,?,?,?,getdate() - '05:00',1)";
            $params = array( $id,$txtPauta, $cboPeriodo, $cboTipoPauta);
            $query = sqlsrv_query( $this->conexionDB, $sql,$params);
            //sqlsrv_close($this->conexionDB);
        }*/
        
        /*public function  registrarCalendario($txtCalendario, $cboEspecie, $txtFechaInicio,$txtFechaFin,$cboTipoCalendario){
            
            $sql = "insert into calendario (nombre,especie,fechaInicio,fechaFin,tipoCalendario,fechaCreacion,estado) values (?,?,?,?,?,getdate() - '05:00',1)";
            $params = array($txtCalendario,$cboEspecie,$txtFechaInicio,$txtFechaFin,$cboTipoCalendario);
            $query = sqlsrv_query( $this->conexionDB, $sql,$params);
            //sqlsrv_close($this->conexionDB);
        }*/
        
        
        
        
        
        
        /* public function getCalendarioID($id){
          
            $arrayReturn = array();
            $strPag = " ";

            $sql =
             " select a.id,a.nombre,a.especie as especie,CONVERT(VARCHAR(10),fechaInicio,103) as fechaInicio,CONVERT(VARCHAR(10),fechaFin,103) as fechaFin,fechaCreacion,tipoCalendario ".
            " from calendario a ".
            " inner join especie b on a.especie = b.id ".
            " where a.id = ? and a.estado = 1 order by a.id ";
            $params = array($id);            
            $query = sqlsrv_query( $this->conexionDB, $sql,$params);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "id" => $result["id"],
                           "nombre" => $result["nombre"],
                            "especie" => $result["especie"],
                           "fechaInicio" => $result["fechaInicio"],
                            "fechaFin" => $result["fechaFin"],
                           "fechaCreacion" => $result["fechaCreacion"],
                        "tipoCalendario" => $result["tipoCalendario"]
                        
                       );
                }
            }
          //  sqlsrv_close($this->conexionDB);
          //  print_r($arrayReturn);
            return $arrayReturn;
        }*/
        
         /*public function getVacunaID($id){
          
            $arrayReturn = array();          
            $sql =
                    " select a.id,a.especie,a.tipo_farmaco,a.farmaco,a.edad_minima ,a.edad_maxima  ,  ".
                    " a.via_aplicacion ,a.volumen ,a.und_medidad , a.efectos , a.fechaCreacion , c.nombre as des_tipo_farmaco , z.nombre as des_farmaco".
                    " from asociar_farmaco a  ".
                     " inner join tipo_farmaco c on a.tipo_farmaco =c.id  ".
                    " inner join farmaco z on a.farmaco =z.id  ".
                    " where a.estado = 1 and a.id=".$id.
                    " order by a.id desc ";
           // echo '>>>$sql:'.$sql;
                       
            $query = sqlsrv_query( $this->conexionDB, $sql);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                            "id" => $result["id"],
                            "especie" => $result["especie"],
                            "tipo_farmaco" => $result["tipo_farmaco"],
                            "farmaco" => $result["farmaco"],
                            "edad_minima" => $result["edad_minima"],
                            "edad_maxima" => $result["edad_maxima"],
                            "via_aplicacion" => $result["via_aplicacion"],
                            "volumen" => $result["volumen"],
                            "und_medidad" => $result["und_medidad"],
                            "efectos" => $result["efectos"],
                            "fechaCreacion" => $result["fechaCreacion"],
                            "des_tipo_farmaco" => $result["des_tipo_farmaco"],
                            "des_farmaco" => $result["des_farmaco"]
                        
                       );
                }
            }
          //  sqlsrv_close($this->conexionDB);
          //  print_r($arrayReturn);
            return $arrayReturn;
        }*/
        
       /* public function actualizaCalendario( $txtFechaInicio,$txtFechaFin,$cboTipoCalendario,$id){
            $sql = "update calendario set fechaInicio =?,fechaFin=?, fechaActualizacion = getdate() - '05:00' , tipoCalendario = ? where id = ?";
            $params = array($txtFechaInicio,$txtFechaFin,$cboTipoCalendario,$id);
            $query = sqlsrv_query( $this->conexionDB, $sql,$params);
            
        }*/
        
         /*public function eliminarCalendario($id){
            $sql = "delete from calendario where id = ?";
            $params = array($id);
            $query = sqlsrv_query( $this->conexionDB, $sql,$params);
            
        }*/
        
       /*  public function eliminarPauta($id){
            $sql = "delete from pauta where id = ?";
            $params = array($id);
            $query = sqlsrv_query( $this->conexionDB, $sql,$params);
            
        }*/
        
        /* public function eliminarVacuna($id){
            $sql = "delete from asociar_farmaco where id = ?";
            $params = array($id);
            $query = sqlsrv_query( $this->conexionDB, $sql,$params);
            
        }*/
                
        //----------------------------------------

        /*
	public function gerNivelPrueba($nivel) {
            $arrayReturn = array();
            $result = $this->conexionDB->prepare("SELECT n_descripcion FROM ece_nivel WHERE n_id=". $nivel);
            $result->execute();
            $result->bind_result($n_descripcion);
            while ( $result->fetch() ){
                $arrayReturn[] = $db = array(
                    "n_descripcion" => $n_descripcion
                );
            }
            $result->close();
            return $arrayReturn;
	}           
        
	public function demo() {
            $arrayReturn = array();
            $result = $this->conexionDB->prepare("SELECT p_codigo_item, p_imagen FROM ece_preguntas WHERE LEFT(p_codigo_item, 2)='CT'");
            $result->execute();
            $result->bind_result($p_codigo_item, $p_imagen);
            while ( $result->fetch() ){
                $arrayReturn[] = $db = array(
                    "p_codigo_item" => $p_codigo_item,
                    "p_imagen" => $p_imagen  
                );
            }
            $result->close();
            return $arrayReturn;
	}         
        
	public function demo2() {
            $arrayReturn = array();
            $result = $this->conexionDB->prepare("SELECT p_codigo_item, p_imagen FROM ece_preguntas WHERE LEFT(p_codigo_item, 2)='MA'");
            $result->execute();
            $result->bind_result($p_codigo_item, $p_imagen);
            while ( $result->fetch() ){
                $arrayReturn[] = $db = array(
                    "p_codigo_item" => $p_codigo_item,
                    "p_imagen" => $p_imagen  
                );
            }
            $result->close();
            return $arrayReturn;
	}     
         
         */
        
/* ==========================================================================
   Demo
   ========================================================================== */
        /*
	public function getOpciones($id_pregunta) {
            $arrayReturn = array();
            $result = $this->conexionDB->prepare("SELECT o_id, o_descripcion FROM ece_opciones WHERE o_codigo_item=? AND o_estado=1");
            $result->bind_param('s', $id_pregunta);
            $result->execute();
            $result->bind_result($o_id, $o_descripcion);
            while ( $result->fetch() ){
                $arrayReturn[] = $db = array(
                    "o_id" => $o_id,
                    "o_descripcion" => $o_descripcion  
                );
            }
            $result->close();
            return $arrayReturn;
	} 
                
	public function getCategoriasByNivelCurso($curso_prueba, $nivel_prueba, $tipo_prueba) {
            $arrayReturn = array();
            if($curso_prueba=='2'){ // curso de lectura "2"
                if($nivel_prueba=='1' || $nivel_prueba=='2'){
                    $sql = "SELECT cate_id, tp_clas_id FROM ece_reglas WHERE n_id=? AND tp_id=? AND c_id=?";
                    $result = $this->conexionDB->prepare($sql);
                    $result->bind_param('iii', $nivel_prueba, $tipo_prueba, $curso_prueba);
                    $result->execute();
                    $result->bind_result($cate_id, $tp_clas_id);
                    
                    while ( $result->fetch() ){
                        $arrayReturn[] = array(
                            "cate_id" => $cate_id,
                            "tp_clas_id" => $tp_clas_id
                        );
                    }
                    $result->close();
                }else if($nivel_prueba=='3'){
                    $array_1 = array(7,8,9);
                    $array_2 = array(10,11);
                    $random_1 = array_rand($array_1, 1);
                    $random_2 = array_rand($array_2, 1);

                    $arrayReturn[] = $db = array("cate_id" => '6', "tp_clas_id" => '2');
                    $arrayReturn[] = $db = array("cate_id" => $array_1[$random_1], "tp_clas_id" => '0');
                    $arrayReturn[] = $db = array("cate_id" => $array_2[$random_2], "tp_clas_id" => '0');
                }                
            }else{ // curso de matematica "1"
                
                    $sql = "SELECT cate_id, tp_clas_id FROM ece_reglas WHERE n_id=? AND tp_id=? AND c_id=?";
                    $result = $this->conexionDB->prepare($sql);
                    $result->bind_param('iii', $nivel_prueba, $tipo_prueba, $curso_prueba);
                    $result->execute();
                    
                    $result->bind_result($cate_id, $tp_clas_id);
                    
                    while ( $result->fetch() ){
                        $arrayReturn[] = array(
                            "cate_id" => $cate_id,
                            "tp_clas_id" => $tp_clas_id
                        );
                    }
                    
                    

                    $result->close();                
            }
            
            //print_r($arrayReturn);
            //exit;
            return $arrayReturn;
	} 
        
	public function getCategoriasSeleccionadas($id_categoria, $tipo_clasificacion) {
	
            $clas_p_id="";
            
            if($tipo_clasificacion>0){
                // $result = $this->conexionDB->prepare("SELECT clas_p_id FROM ece_clasificacion_pregunta WHERE cate_id=? AND tp_clas_id=? ORDER BY RAND() LIMIT 1");
                $result = $this->conexionDB->prepare("SELECT d.clas_p_id FROM ece_clasificacion_pregunta c INNER JOIN ece_detalle_clasificacion_pregunta d ON d.clas_p_id=c.clas_p_id WHERE c.cate_id=? AND c.tp_clas_id=? ORDER BY RAND() LIMIT 1");
                $result->bind_param('ii', $id_categoria, $tipo_clasificacion);
            }else{
                // $result = $this->conexionDB->prepare("SELECT clas_p_id FROM ece_clasificacion_pregunta WHERE cate_id=? ORDER BY RAND() LIMIT 1");
                $result = $this->conexionDB->prepare("SELECT d.clas_p_id FROM ece_clasificacion_pregunta c INNER JOIN ece_detalle_clasificacion_pregunta d ON d.clas_p_id=c.clas_p_id WHERE c.cate_id=? ORDER BY RAND() LIMIT 1");
                $result->bind_param('i', $id_categoria);
            }
            
            $result->execute();
            $result->bind_result($clas_p_id);  
            $result->fetch();
            $result->close();
            return $clas_p_id;

	} 

	public function getRandom($clasificacion) {
            
                $arrayReturn = array();
                $clas_p_id = "";
                $clas_p_clasificacion = "";
                        
                if( count($clasificacion) > 0 ){
                    // $sql = "SELECT p_codigo_item FROM ece_detalle_clasificacion_pregunta WHERE clas_p_id IN (". $clasificacion .")";
                    
                    $sql_array = array();
                    foreach($clasificacion as $class_id){
                        $sql_array[] = " (SELECT clas_p_id, clas_p_clasificacion FROM ece_detalle_clasificacion_pregunta WHERE clas_p_id=". $class_id ." ORDER BY RAND() LIMIT 1) ";
                    }
                    $sql = implode("UNION ALL", $sql_array);
                    // $sql = "SELECT p_codigo_item FROM ece_detalle_clasificacion_pregunta WHERE clas_p_id IN (". $clasificacion .") GROUP BY clas_p_id ORDER BY RAND()";
                    
                    $result = $this->conexionDB->prepare($sql);
                    //$result->bind_param('iii', $tipo_prueba, $curso, $id_pregunta);
                    $result->execute();
                    $result->bind_result($clas_p_id, $clas_p_clasificacion);
                    while ( $result->fetch() ){
                        $arrayReturn["clas_p_id"][] = $clas_p_id;
                        $arrayReturn["clas_p_clasificacion"][] = $clas_p_clasificacion;
                    }
                    $result->close();
                }
             
		return $arrayReturn;
	}            

	public function getListadoPreguntasCodigos($array_random) {
                $arrayReturn = array();
                $p_codigo_item = "";
                if( count($array_random) > 0 ){
                    // $sql = "SELECT p_codigo_item FROM ece_detalle_clasificacion_pregunta WHERE clas_p_id IN (". $clasificacion .")";
                    //$sql = "SELECT p_codigo_item FROM ece_detalle_clasificacion_pregunta WHERE clas_p_id IN (". $clasificacion .") GROUP BY clas_p_id ORDER BY RAND()";
                    
                    $sql_array = array();
                    $contador = 0;
                    foreach($array_random["clas_p_id"] as $class_id){
                        $sql_array[] = " (SELECT p_codigo_item FROM ece_detalle_clasificacion_pregunta WHERE clas_p_id = ". $class_id ." AND clas_p_clasificacion = ". $array_random["clas_p_clasificacion"][$contador] .") ";
                        $contador++;
                    }
                    $sql = implode("UNION ALL", $sql_array);                    
                    
                    $result = $this->conexionDB->prepare($sql);
                    //$result->bind_param('iii', $tipo_prueba, $curso, $id_pregunta);
                    $result->execute();
                    $result->bind_result($p_codigo_item);
                    while ( $result->fetch() ){
                        $arrayReturn[] = $p_codigo_item;
                    }
                    $result->close();
                }
		return $arrayReturn;
	}        
        
       
        public function getPreguntaById($id_pregunta) {
                
               $sql = "SELECT p.p_codigo_item, p.p_descripcion, p.p_imagen, p.p_estimmulo_1, p.p_estimmulo_2 FROM ece_preguntas p WHERE p.p_estado=1 AND p.p_codigo_item=?";
                
		$result = $this->conexionDB->prepare($sql);
                //$result->bind_param('iis', $tipo_prueba, $curso, $id_pregunta);
                $result->bind_param('s', $id_pregunta);
                $result->execute();
                $result->bind_result($p_codigo_item, $p_descripcion, $p_imagen, $p_estimmulo_1, $p_estimmulo_2);
                $result->fetch();
                $arrayReturn = array(
                    "p_descripcion" => $p_descripcion,
                    "p_codigo_item" => $p_codigo_item,
                    "p_imagen" => $p_imagen,
                    "p_estimmulo_1" => $p_estimmulo_1,
                    "p_estimmulo_2" => $p_estimmulo_2
                );
                $result->close();
		return $arrayReturn;
	} 
        
	public function getNroPreguntas($id_prueba, $curso) {
            
                $p_id = "";
                $arrayReturn = array();
                $sql = "SELECT pru.p_id FROM ece_prueba pru
                        INNER JOIN ece_preguntas p ON p.p_id=pru.p_id
                        WHERE tp_id=? AND c_id=? AND p.p_estado=1";
		$result = $this->conexionDB->prepare("$sql");
                $result->bind_param('ii', $id_prueba, $curso);
                $result->execute();
                $result->bind_result($p_id);
                while ( $result->fetch() ){
                    $arrayReturn[] = $p_id;
                }
                $result->close();
		return $arrayReturn;

	} 
        

	public function getRegiones() {

//		$arrayReturn = [];
		$arrayReturn = array();		
		$result = $this->conexionDB->query("SELECT r_id, r_descripcion FROM ece_region");

		while ( $filas=$result->fetch_assoc() ) {
			$arrayReturn[] = $filas;
		}	
                $result->close();
		return $arrayReturn;

	}         
        
	public function getNiveles() {

//		$arrayReturn = [];
		$arrayReturn = array();		
		$result = $this->conexionDB->query("SELECT n_id, n_descripcion FROM ece_nivel");

		while ( $filas=$result->fetch_assoc() ) {
			$arrayReturn[] = $filas;
		}	
                $result->close();
		return $arrayReturn;

	}     
        
	public function getGrados() {

//		$arrayReturn = [];
		$arrayReturn = array();		
		$result = $this->conexionDB->query("SELECT * FROM ece_grados WHERE g_status=1");

		while ( $filas=$result->fetch_assoc() ) {
			$arrayReturn[] = $filas;
		}	
                $result->close();
		return $arrayReturn;

	} 

	public function getTipoPrueba($id_prueba) {
	 
            $tp_id=0;
            $tp_descripcion="";
            $result = $this->conexionDB->prepare("SELECT tp_id, tp_descripcion FROM ece_tipo_prueba WHERE tp_id = ?");
            $result->bind_param('i', $id_prueba);
            $result->execute();
            $result->bind_result($tp_id, $tp_descripcion);  
            $result->fetch();
            $result->close();
            return $tp_descripcion;

	} 
        

	public function getCursos($c_id) {
            $curso_id=0;
            $c_descripcion="";
            $result = $this->conexionDB->prepare("SELECT c_id, c_descripcion FROM ece_cursos WHERE c_id = ?");
            $result->bind_param('i', $c_id);
            $result->execute();
            $result->bind_result($curso_id, $c_descripcion);  
            $result->fetch();
            $result->close();
            return $c_descripcion;

	} 

	public function getPreguntasExamen($array_random) {
            $arrayReturn = array();
            $p_descripcion = "";
            $p_estimmulo_1 = "";
            $enunciado = "";
            if( count($array_random) > 0 ){
                
                $marcadas = "'".implode($array_random, "','")."'"; 
                $sql = "SELECT "
                     . "p.p_descripcion, "
                     . "p.p_estimmulo_1, "
                     . "(SELECT clas_descripcion FROM ece_detalle_clasificacion_pregunta WHERE p_codigo_item=p.p_codigo_item) AS enunciado "
                     . "FROM ece_preguntas p "
                     . "WHERE p.p_codigo_item IN (". $marcadas .") ORDER BY FIELD(p.p_codigo_item,". $marcadas .");";

                $result = $this->conexionDB->prepare($sql);
                $result->execute();
                $result->bind_result($p_descripcion, $p_estimmulo_1, $enunciado);
                while ( $result->fetch() ){
                    $arrayReturn["p_descripcion"][] = $p_descripcion;
                    $arrayReturn["p_estimmulo_1"][] = $p_estimmulo_1;
                    $arrayReturn["enunciado"][] = $enunciado;
                }
                $result->close();
            }
            return $arrayReturn;
	}           
*/
        
          public function getPauta($inicio,$fin,$id) {
            $arrayReturn = array();
            $strPag = " ";
            if($inicio == '0' && $fin =='0'){
                $strPag = " ";
            }else{
                $strPag = " OFFSET ".$inicio." ROWS FETCH NEXT ".$fin." ROWS ONLY ";
            }
            $sql = 
                " select  ROW_NUMBER ()over(order by a.id ) as num, a.id ,pauta,b.nombre as periodo,c.nombre as tipoPauta, a.orden as orden ".
                " from GVD_pautas a ".
                " left join GVD_maestra b on a.periodo=b.id and b.campo = 'cboPeriodo' ".
                " left join GVD_maestra c on a.tipoPauta=c.id and c.campo = 'cboTipoPauta' ".
                " where farmaco_especie = ".$id." order by a.orden ".$strPag;
            //$param = array($GrpoFarmaco);
            // echo '$sqlPauta:'.;
            $query = sqlsrv_query( $this->conexionDB, $sql);
           
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                        "num" => $result["orden"],
                        "id" => $result["id"],
                           "pauta" => $result["pauta"],
                           "periodo" => $result["periodo"],
                            "tipoPauta" => $result["tipoPauta"]
                       
                       );
                }
            }
            //sqlsrv_close($this->conexionDB);
            return $arrayReturn;
	}
        
        public function getAsociarVacuna($inicio,$fin,$especie,$id){
           // echo '>>>>>>>>>$inicio:'.$inicio.'$fin:'.$fin;
            $arrayReturn = array();
            $strPag = " ";
            $strEspecie = " ";
            $strColumnID = " , '0' ";
            $strJoinID = " ";
            if($inicio == '0' && $fin =='0'){
                $strPag = " ";
            }else{
                $strPag = " OFFSET ".$inicio." ROWS FETCH NEXT ".$fin." ROWS ONLY ";
            }
            if($especie != '0'){
                $strEspecie = " and a.especie = ".$especie;
            }
            if($id != '0'){
                $strColumnID = ' , count(k.id) ';
                $strJoinID = ' left join GVD_calendario_farmaco_especie k on k.farmaco_especie = a.id and calendario = '.$id;
            }
            $sql =
                    " select a.id,z.id as idFarmacoA,b.DescripcionEspecie as especie, c.id as id_tipo_farmaco, c.nombre as tipo_farmaco, z.nombre as farmaco,  d.nombre as edad_minima ,  e.nombre as edad_maxima  ,  ".
                    " g.nombre as via_aplicacion , a.volumen , i.nombre as und_medidad , a.efectos , a.fechaCreacion, count(j.id) as cant_pautas  ".$strColumnID." as flag_agregado ,count(distinct h.id) as flag_calendario".
                    " from GVD_farmaco_especie a  ".
                    " inner join GCP_Especie b on a.especie= b.CodigoEspecie  ".
                    " inner join GVD_tipo_farmaco c on a.tipo_farmaco =c.id  ".
                    " inner join GVD_farmacos z on a.farmaco =z.id  ".
                    " left join GVD_maestra d on a.edad_minima = d.id and d.campo = 'cboEdadMinima'  ".
                    " left join GVD_maestra e on a.edad_maxima = e.id and e.campo = 'cboEdadMinima'  ".
                    " left join GVD_maestra g on a.via_aplicacion = g.id and g.campo = 'cboAplicacion'  ".
                    " left join GVD_maestra i on a.und_medidad = i.id and i.campo = 'cboUndMedida' ".
                    " left join GVD_pautas j on a. id = j.farmaco_especie  ".$strJoinID.
                    "left join GVD_calendario_farmaco_especie h on h.farmaco_especie=a.id".
                    " where a.estado = 1 ".$strEspecie.
                    " group by a.id,z.id,b.DescripcionEspecie ,c.id, c.nombre ,  d.nombre  ,  e.nombre ,    ".
                    " g.nombre , a.volumen , i.nombre , a.efectos , a.fechaCreacion ,z.nombre ".
                    " order by a.id desc ".$strPag;
          
           // echo '>>$sql:'.$sql;
            $query = sqlsrv_query( $this->conexionDB, $sql);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "id" => $result["id"],
                        "idFarmacoA" => $result["idFarmacoA"],
                            "especie" => $result["especie"],
                        "id_tipo_farmaco" => $result["id_tipo_farmaco"],
                           "tipo_farmaco" => $result["tipo_farmaco"],
                        "farmaco" => $result["farmaco"],
                            "edad_minima" => $result["edad_minima"],
                           "edad_maxima" => $result["edad_maxima"],
                        "via_aplicacion" => $result["via_aplicacion"],
                        "volumen" => $result["volumen"],
                        "und_medidad" => $result["und_medidad"],
                        "efectos" => $result["efectos"],
                        "fechaCreacion" => $result["fechaCreacion"],
                        "cant_pautas" => $result["cant_pautas"],
                        "flag_agregado" => $result["flag_agregado"],
                        "flag_calendario" => $result["flag_calendario"]
                       );
                }
            }
          //  sqlsrv_close($this->conexionDB);
            //print_r($arrayReturn);
            return $arrayReturn;
        }
        public function getCalendario($inicio,$fin){
           // echo '>>>>>>>>>$inicio:'.$inicio.'$fin:'.$fin;
            $arrayReturn = array();
            $strPag = " ";
            if($inicio == '0' && $fin =='0'){
                $strPag = " ";
            }else{
                $strPag = " OFFSET ".$inicio." ROWS FETCH NEXT ".$fin." ROWS ONLY ";
            }
            $sql =
                " select a.id,a.nombre,b.DescripcionEspecie as especie,CONVERT(VARCHAR(10),fechaInicio,103) as fechaInicio, ".
                " CONVERT(VARCHAR(10),fechaFin,103) as fechaFin,a.fechaCreacion,d.nombre as tipoCalendario,count(c.id) as vacunas,CONVERT(VARCHAR(10),a.fechaFin,112) as flag_fecha ".
                ",count(distinct e.id) as flag_mascota".
                " from GVD_calendarios a ".
                " left join GVD_maestra d on a.tipoCalendario = d.id and d.campo = 'cboTipoCalendario'  ".
                " inner join GCP_Especie b on a.especie = b.CodigoEspecie ".
                " left join GVD_calendario_farmaco_especie c on c.calendario = a.id ".
                "left join GVD_Mascota_Clendario e on e.calendario=a.id".
                " where a.estado = 1 ".
                " group by a.id,a.nombre,b.DescripcionEspecie ,CONVERT(VARCHAR(10),fechaInicio,103) ,CONVERT(VARCHAR(10),fechaFin,103) , a.fechaCreacion,d.nombre,CONVERT(VARCHAR(10),a.fechaFin,112) ".
                " order by a.id desc ".$strPag;
                
       // echo '>>>> $sql:'.$sql;
       //     exit();
           // $params = array($inicio,$fin);
          // echo '>>$sql: '. $sql;
            
            $query = sqlsrv_query( $this->conexionDB, $sql);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "id" => $result["id"],
                           "nombre" => $result["nombre"],
                            "especie" => $result["especie"],
                           "fechaInicio" => $result["fechaInicio"],
                            "fechaFin" => $result["fechaFin"],
                           "fechaCreacion" => $result["fechaCreacion"],
                           "tipoCalendario" => $result["tipoCalendario"],
                           "vacunas" => $result["vacunas"],
                           "flag_fecha" => $result["flag_fecha"],
                           "flag_mascota" => $result["flag_mascota"]
                        
                       );
                }
            }
          //  sqlsrv_close($this->conexionDB);
          //  print_r($arrayReturn);
            return $arrayReturn;
        }
        
        public function getCalendarioAtencion($inicio,$fin,$id_mascota){
           // echo '>>>>>>>>>$inicio:'.$inicio.'$fin:'.$fin;
            $arrayReturn = array();
            $strPag = " ";
            if($inicio == '0' && $fin =='0'){
                $strPag = " ";
            }else{
                $strPag = " OFFSET ".$inicio." ROWS FETCH NEXT ".$fin." ROWS ONLY ";
            }
            $sql =            
            
                    " select a.id,a.nombre,b.DescripcionEspecie as especie,CONVERT(VARCHAR(10),fechaInicio,103) as fechaInicio, ".
                    " CONVERT(VARCHAR(10),fechaFin,103) as fechaFin,a.fechaCreacion,d.nombre as tipoCalendario,count(c.id) as vacunas,".
                    " CONVERT(VARCHAR(10),a.fechaFin,112) as flag_fecha ".
                    " from GVD_calendarios a ".
                    " left join GVD_maestra d on a.tipoCalendario = d.id and d.campo = 'cboTipoCalendario' ".
                    " inner join GCP_Especie b on a.especie = b.CodigoEspecie ".
                    " left join GVD_calendario_farmaco_especie c on c.calendario = a.id ".
                    " inner join GCP_Raza i on i.CodigoEspecie = b.CodigoEspecie ".
                    " inner join GCP_Mascota j on j.CodigoRaza = i.CodigoRaza ".
                    " inner join GVD_pautas k on k.farmaco_especie = c.farmaco_especie".
                    " where a.estado = 1  and CONVERT(VARCHAR(10),a.fechaFin,112) > CONVERT(VARCHAR(10),getdate() - '05:00',112) and j.idMascota = ".$id_mascota." ".
                    " group by a.id,a.nombre,b.DescripcionEspecie , ".
                    " CONVERT(VARCHAR(10),fechaInicio,103) , ".
                    " CONVERT(VARCHAR(10),fechaFin,103) , ".
                    " a.fechaCreacion,d.nombre,CONVERT(VARCHAR(10),a.fechaFin,112) having count(c.id) > 0  ".
                    " order by a.id desc ".$strPag;
                
       
           
           $params = array($inicio,$fin);
         
            $query = sqlsrv_query( $this->conexionDB, $sql);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "id" => $result["id"],
                           "nombre" => $result["nombre"],
                            "especie" => $result["especie"],
                           "fechaInicio" => $result["fechaInicio"],
                            "fechaFin" => $result["fechaFin"],
                           "fechaCreacion" => $result["fechaCreacion"],
                           "tipoCalendario" => $result["tipoCalendario"],
                           "vacunas" => $result["vacunas"],
                           "flag_fecha" => $result["flag_fecha"],
                        
                       );
                }
            }
          //  sqlsrv_close($this->conexionDB);
          //  print_r($arrayReturn);
            return $arrayReturn;
        }
        
         public function getVacunaCalendario($inicio,$fin,$id){
           // echo '>>>>>>>>>$inicio:'.$inicio.'$fin:'.$fin;
            $arrayReturn = array();
            $strPag = " ";
            $strColumnID = " , '0' ";
            $strJoinID = " ";
            $strJoinID2 = " ";
            if($inicio == '0' && $fin =='0'){
                $strPag = " ";
            }else{
                $strPag = " OFFSET ".$inicio." ROWS FETCH NEXT ".$fin." ROWS ONLY ";
            }
            
            if($id != '0'){
                $strColumnID = ' , count(k.id) ';
                $strJoinID = ' left join GVD_calendario_farmaco_especie k on k.farmaco_especie = a.id ';
                $strJoinID2 = ' and calendario = '.$id;
            }
            $sql =
                    " select a.id,b.DescripcionEspecie as especie, c.nombre as tipo_farmaco, z.nombre as farmaco,  d.nombre as edad_minima ,  e.nombre as edad_maxima  ,  ".
                    " g.nombre as via_aplicacion , a.volumen , i.nombre as und_medidad , a.efectos , a.fechaCreacion, count(j.id) as cant_pautas  ".$strColumnID." as flag_agregado".
                    " from GVD_farmaco_especie a  ".
                    " inner join GCP_Especie b on a.especie= b.CodigoEspecie  ".
                    " inner join GVD_tipo_farmaco c on a.tipo_farmaco =c.id  ".
                    " inner join GVD_farmacos z on a.farmaco =z.id  ".
                    " left join GVD_maestra d on a.edad_minima = d.id and d.campo = 'cboEdadMinima'  ".
                    " left join GVD_maestra e on a.edad_maxima = e.id and e.campo = 'cboEdadMinima'  ".
                    " left join GVD_maestra g on a.via_aplicacion = g.id and g.campo = 'cboAplicacion'  ".
                 //   " left join GVD_maestra h on a.volumen = h.id and h.campo = 'cboVolumen'  ".
                    " left join GVD_maestra i on a.und_medidad = i.id and i.campo = 'cboUndMedida' ".
                    " left join GVD_pautas j on a. id = j.farmaco_especie  ".$strJoinID.
                    " where a.estado = 1 ".$strJoinID2.
                    " group by a.id,b.DescripcionEspecie ,a.volumen, c.nombre ,  d.nombre  ,  e.nombre ,    ".
                    " g.nombre  , i.nombre , a.efectos , a.fechaCreacion ,z.nombre ".
                    " having count(j.id) > 0".
                    " order by a.id desc ".$strPag;
          
           // echo '>>$sql:'.$sql;
            $query = sqlsrv_query( $this->conexionDB, $sql);
            
            if($query){
                //$arrayReturn = $query;
                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)){
                    // echo $result['nombre'].", ".$result['enlace']."<br />";
                    $arrayReturn[] = $db = array(
                           "id" => $result["id"],
                            "especie" => $result["especie"],
                           "tipo_farmaco" => $result["tipo_farmaco"],
                        "farmaco" => $result["farmaco"],
                            "edad_minima" => $result["edad_minima"],
                           "edad_maxima" => $result["edad_maxima"],
                        "via_aplicacion" => $result["via_aplicacion"],
                        "volumen" => $result["volumen"],
                        "und_medidad" => $result["und_medidad"],
                        "efectos" => $result["efectos"],
                        "fechaCreacion" => $result["fechaCreacion"],
                        "cant_pautas" => $result["cant_pautas"],
                        "flag_agregado" => $result["flag_agregado"]
                       );
                }
            }
          //  sqlsrv_close($this->conexionDB);
            //print_r($arrayReturn);
            return $arrayReturn;
        }
        
        public function registrarCliente($cboTipoDoc,$txtDocumento,$txtNombre,$txtApellidos,$txtDireccion,$txtTelefono,$txtNacimiento,$txtEmail){
            $arrayReturn = array();
            $sql = " insert into GCP_Cliente (TipoDocumento,NumeroDocumento,NombreCliente,ApellidoCliente,Direccion,Telefono,FechaNacimiento,Email) values (?,?,?,?,?,?,?,?);";
            $params = array($cboTipoDoc,$txtDocumento,$txtNombre,$txtApellidos,$txtDireccion,$txtTelefono,$txtNacimiento,$txtEmail);
            $query = sqlsrv_query( $this->conexionDB, $sql,$params);
              $sql2 = "SELECT @@IDENTITY as id; ";
              $query2 = sqlsrv_query( $this->conexionDB, $sql2);
              while($result = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)){
                   $arrayReturn[] = $db = array(
                           "id" => $result["id"]
                       );
              }
              return $arrayReturn;
        }
        
        public function registrarCita($IdCliente,$IdMascota,$txtFechaInicio,$txtTurno,$txtSede){
            $arrayReturn = array();
            $sql = " insert into GC_Cita (idCliente,idMascota,estado,Fecha,Hora,idSede) values (?,?,0,?,?,?);";
            $params = array($IdCliente,$IdMascota,$txtFechaInicio,$txtTurno,$txtSede);
          //  echo '>>>$sql'.$sql;
           // print_r($params); exit();
            $query = sqlsrv_query( $this->conexionDB, $sql,$params);
            
              $sql2 = "SELECT @@IDENTITY as id; ";
              $query2 = sqlsrv_query( $this->conexionDB, $sql2);
              while($result = sqlsrv_fetch_array($query2, SQLSRV_FETCH_ASSOC)){
                   $arrayReturn[] = $db = array(
                           "id" => $result["id"]
                       );
              }
              return $arrayReturn;
        }
        
} 