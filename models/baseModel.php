<?php

/* 
 * Developed by wilowi
 */

class baseModel{
	
	protected $conector = null;
	protected $errorInfo = '';
	protected $table = '';
       
	
	public function __construct() {
		$this->conector = new dbConnector();
            //$this->conector = CONECTOR_DB;
            
            //echo print_r($this->conector);
	}
        
        public function __destruct() {
            $this->conector->deleteConnection();
        }
	
	public function select($where = '',$as = '',$select = '*',$join=''){
		
		$query = 'SELECT '.$select.' FROM '.$this->table.' '.$as.' '.$join;
		
		if(!empty($where)){
			$query.= ' WHERE '.$where;
		}

		//echo $query;
		$result = $this->conector->query($query, 'select');

		return $result;
	}
	
	public function selectPagination($where = '',$join = '',$order = '',$limit = '', $select='*'){
		
		$query = 'SELECT '.$select.' FROM '.$this->table.' '.$join;
		
		if(!empty($where)){
			$query.= ' WHERE '.$where;
		}
		
		if(!empty($order)){
			$query.= ' ORDER BY '.$order;
		}
		
		if(!empty($limit)){
			$query.=' LIMIT '.$limit;
		}
		
		//echo $query;
		$result = $this->conector->query($query, 'select');
		
		//$numero = count($result);

		return $result;
	}
	
	public function add($indices,$values){
	    
		$query = 'INSERT INTO '.$this->table.' ( '.$indices.') VALUES('.$values.')';

		//echo $query;
		$result = $this->conector->query($query, 'insert');

		return $result;
		
	}
	
	public function update($campos,$where=''){
		
		$query = 'UPDATE '.$this->table.' SET '.$campos;
		if(!empty($where)){
			$query.= ' WHERE '.$where;
		}
	
		//echo $query;
		$result = $this->conector->query($query, 'update');

		return $result;
	}
	
	
	public function delete($where){
		
		$query = 'DELETE FROM '.$this->table.' WHERE '.$where;

		//echo $query;
		$result = $this->conector->query($query, 'delete');

		return $result;
		
	}	
	
	protected function setTable($table){
		$this->table = $table;
	}
	
	public function autoCommit($value=true){
		$this->conector->setAutoCommit($value);
	}
	
	public function commit(){
		$this->conector->commit();
	}
	
	public function rollBack(){
		$this->conector->rollBack();
	}
	
}


?>
