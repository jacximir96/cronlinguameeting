<?php


/**
 * Clase de gestion de la base de datos.
 * @copyright Wilowi
 * @version 1.0.0.0
 * @since 13/04/2017
 * @name DBConnector
 * @author Wilowi - Sandra Campos
 *
 */

//include_once '../util.php';
class dbConnector{
	
	private $dbServer='';
	private $dbUser='';
	private $dbPassword='';
	private $dbName='';
	private $dbLink='';	
	private $ruta='';
        private static $_instancia;
        
        public static function getInstance() {
        if (!self::$_instancia) {
            self::$_instancia = new self();
            /* otra opcion
              $c = __CLASS__;
              self::$instancia = new $c;
             */
        }
        return self::$_instancia;
    }

    /**
	 * Constructor de la clase
	 */
	public function __construct(){

		if(_ENVIRONMENT=='localhost'){
			$this->ruta = dirname(__FILE__).'/../linguameetingBD/db_local.config';
			
		}elseif(_ENVIRONMENT=='production'){
			$this->ruta = dirname(__FILE__).'/../linguameetingBD/db_prod.config';
		}
                elseif(_ENVIRONMENT=='develop'){
			$this->ruta = dirname(__FILE__).'/../linguameetingBD/db_prod.config';
		}
		else{
			return false;
		}
                
		$this->asignarDatosBD();		
	}
	

	/**
	 * Destructor de la clase
	 *
	 */
	public function __destruct()
	{
		
	}

	/**
	 * Función para ejecutar una query según el tipo de query.
	 * @param string $query
	 * @param string $tipo
	 * @return string
	 */
	public function query($query,$tipo){

		$resultado = '';
		switch ($tipo) {
			case 'select':
				$resultado = $this->querySelect($query);
			break;
			
			case 'insert':
				$resultado = $this->queryInsert($query);
			break;
			
			case 'update':
				$resultado = $this->queryUpdate($query);
			break;
			
			case 'delete':
				$resultado = $this->queryDelete($query);
			break;
			
			default:
				$resultado = '';
			break;
		}
		
		return $resultado;
	}
	
	/**
	 * Escapar caracteres de una cadena.
	 * @param unknown $cadena
	 * @return unknown
	 */
	public function escaparCadena($cadena){

		$result = '';
		
		try {
			$result = mysqli_real_escape_string($this->dbLink, $cadena);
		} catch (Exception $e) {
			throw new Exception('ERROR - '.__METHOD__.' : Error escapar caracteres => '.$e->getMessage(),1);
		}
		//$result = mysqli_real_escape_string($this->dbLink, $cadena);
		return $result;
		
	}
	
	public function setAutoCommit($value = true) {

		try {
			mysqli_autocommit($this->dbLink, $value);
		} catch (Exception $exc) {
			echo $exc->getTraceAsString();
		}
	}
	
	public function commit(){
		
		mysqli_commit($this->dbLink);
	}
	
	public function rollBack(){
		mysqli_rollback($this->dbLink);
	}
		
	/**
	 * Asignar valores de la base de datos a la variable que vienen en el fichero codificado.
	 */
	private function asignarDatosBD(){

		$fichero = file_get_contents($this->ruta);
		$fichero = json_decode(base64_decode($fichero));

		$this->dbName = $fichero->nombre;
		$this->dbPassword = $fichero->password;
		$this->dbServer = $fichero->server;
		$this->dbUser = $fichero->usuario;
		
		try {
			$this->createLink();
		} catch (Exception $e) {
			echo $e->getMessage();
			echo $this->ruta;
			echo "Error conexión BD";
			return false;
		}
		
		
	}
	
	/**
	 * Crear conexión con mysqli
	 * @throws Exception
	 */
	private function createLink(){		
		
		$this->dbLink=new mysqli($this->dbServer,$this->dbUser,$this->dbPassword,$this->dbName);
		mysqli_select_db($this->dbLink, $this->dbName);
		//echo print_r($this->dbLink);
		if (mysqli_connect_error()){
			throw new Exception('ERROR - '.__METHOD__.' : No conecta con la BD => '.mysqli_connect_error(),1);
		}
	}
	
	
	/**
	 * Ejecutar query select
	 * @param string $query
	 * @throws Exception
	 * @return Ambigous <multitype:, multitype:unknown >
	 */
	private function querySelect($query){		
		
		$resulta=array();
		$cont = 0;

		$QAux=$this->dbLink->query($query);
		if(!$QAux){
			return false;
		}
		
		if(!$QAux->num_rows>0){
			$resulta=array();
		}
		
		while($RAux=$QAux->fetch_object()){
			$resulta[$cont]=$RAux;
			
			$cont++;
		}
		
		//$QAux->free();
		$QAux->close();
		//var_dump($resulta);
		return $resulta;
	}
	
	/**
	 * Ejecutar query Insert
	 * @param string $query
	 * @throws Exception
	 * @return boolean
	 */
	private function queryInsert($query){	
			
		$QAux = $query;
		$resulta = '';
	
		if(!$QAux=$this->dbLink->query($QAux)){
			//echo $query;
            //echo "ERROR: ".$this->dbLink->error;
			return false;
		}

		$resulta = mysqli_insert_id($this->dbLink);
		
		//$QAux->free();
		//$QAux->close();
		return $resulta;
	}
	
	/**
	 * Ejecutar query update
	 * @param unknown $query
	 * @throws Exception
	 * @return boolean
	 */
	private function queryUpdate($query){

		$QAux = $query;
	
		if(!$QAux=$this->dbLink->query($QAux)){
			return false;
		}
		
		//$QAux->free();
		//$QAux->close();

		return true;
	}
	
	/**
	 * Ejecutar query Delete
	 * @param string $query
	 * @throws Exception
	 * @return boolean
	 */
	private function queryDelete($query){

		$QAux = $query;
			
		if(!$QAux=$this->dbLink->query($QAux)){
			return false;
		}
	
		return true;

	}
        
        
        public function deleteConnection(){
            
            
            mysqli_close($this->dbLink);
        }
	
	

}
?>
