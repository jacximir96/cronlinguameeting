<?php
/* 
 * Developed by wilowi
 */

class universityModel extends baseModel {

	private $id_university = 0;
	private $name = '';
	private $description = '';
	private $time_zone = 0;
	private $country = 0;
	private $active = 0; 
	private $web = '';
	private $created = null;
	private $created_by = '';
	private $modified = null;
	private $modified_by = '';
	private $erased = 0;
	private $erased_date = null;
	private $internal_comment = '';
        private $num_max_experiences = 0;
        private $level = 0;

	function __construct() {

		parent::__construct();
		parent::setTable('lm_university');
	}

	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}
	
	public function selectPagination($where = '', $join = '', $order = '', $limit = '',$select='*') {
		return parent::selectPagination($where, $join, $order, $limit,$select);
	}

	public function add($indices = '', $valores = '') {

		$first = true;

		if (!empty($this->name)) {
			if ($first) {
				$indices .= "name_university";
				$valores .= "'" . $this->name . "'";
				$first = false;
			} else {
				$indices .= ",name_university";
				$valores .= ",'" . $this->name . "'";
			}
		}
		if (!empty($this->description)) {
			if ($first) {
				$indices .= "description_university";
				$valores .= "'" . $this->description . "'";
				$first = false;
			} else {
				$indices .= ",description_university";
				$valores .= ",'" . $this->description . "'";
			}
		}


		if (!empty($this->time_zone)) {
			if ($first) {
				$indices .= "id_zone";
				$valores .= $this->time_zone;
				$first = false;
			} else {
				$indices .= ",id_zone";
				$valores .= "," . $this->time_zone;
			}
		}


		if (!empty($this->country)) {
			if ($first) {
				$indices .= "id_country";
				$valores .= $this->country;
				$first = false;
			} else {
				$indices .= ",id_country";
				$valores .= "," . $this->country;
			}
		}

		if (!empty($this->web)) {
			if ($first) {
				$indices .= "web";
				$valores .= "'" . $this->web . "'";
				$first = false;
			} else {
				$indices .= ",web";
				$valores .= ",'" . $this->web . "'";
			}
		}


		if (!empty($this->created)) {
			if ($first) {
				$indices .= "created";
				$valores .= "'" . $this->created . "'";
				$first = false;
			} else {
				$indices .= ",created";
				$valores .= ",'" . $this->created . "'";
			}
		}
		if (!empty($this->created_by)) {
			if ($first) {
				$indices .= "created_by";
				$valores .= "'" . $this->created_by . "'";
				$first = false;
			} else {
				$indices .= ",created_by";
				$valores .= ",'" . $this->created_by . "'";
			}
		}
		if (!empty($this->modified)) {
			if ($first) {
				$indices .= "modified";
				$valores .= "'" . $this->modified . "'";
				$first = false;
			} else {
				$indices .= ",modified";
				$valores .= ",'" . $this->modified . "'";
			}
		}
		if (!empty($this->modified_by)) {
			if ($first) {
				$indices .= "modified_by";
				$valores .= "'" . $this->modified_by . "'";
				$first = false;
			} else {
				$indices .= ",modified_by";
				$valores .= ",'" . $this->modified_by . "'";
			}
		}

		if (!empty($this->erased_date)) {
			if ($first) {
				$indices .= "date_erased";
				$valores .= "'" . $this->erased_date . "'";
				$first = false;
			} else {
				$indices .= ",date_erased";
				$valores .= ",'" . $this->erased_date . "'";
			}
		}
		
		if (!empty($this->internal_comment)) {
			if ($first) {
				$indices .= "internal_comment";
				$valores .= "'" . $this->internal_comment . "'";
				$first = false;
			} else {
				$indices .= ",internal_comment";
				$valores .= ",'" . $this->internal_comment . "'";
			}
		}
		
		if ($first) {
			$indices .= "active,erased";
			$valores .= $this->active.','.$this->erased;
			$first = false;
		} else {
			$indices .= ",active,erased";
			$valores .= "," . $this->active.','.$this->erased;
		}
                
                if (!empty($this->num_max_experiences)) {
			if ($first) {
				$indices .= "num_max_experiences";
				$valores .= $this->num_max_experiences;
				$first = false;
			} else {
				$indices .= ",num_max_experiences";
				$valores .= "," . $this->num_max_experiences;
			}
		}
                
                if (!empty($this->level)) {
			if ($first) {
				$indices .= "level";
				$valores .= $this->level;
				$first = false;
			} else {
				$indices .= ",level";
				$valores .= "," . $this->level;
			}
		}

		return parent::add($indices, $valores);
	}	

	 public function addMig($indices = '', $valores = '') {

		$first = true;
                
                if (!empty($this->id_university)) {
			if ($first) {
				$indices .= "id_university";
				$valores .= "'" . $this->id_university . "'";
				$first = false;
			} else {
				$indices .= ",id_university";
				$valores .= ",'" . $this->id_university . "'";
			}
		}

		if (!empty($this->name)) {
			if ($first) {
				$indices .= "name_university";
				$valores .= "'" . $this->name . "'";
				$first = false;
			} else {
				$indices .= ",name_university";
				$valores .= ",'" . $this->name . "'";
			}
		}
		if (!empty($this->description)) {
			if ($first) {
				$indices .= "description_university";
				$valores .= "'" . $this->description . "'";
				$first = false;
			} else {
				$indices .= ",description_university";
				$valores .= ",'" . $this->description . "'";
			}
		}


		if (!empty($this->time_zone)) {
			if ($first) {
				$indices .= "id_zone";
				$valores .= $this->time_zone;
				$first = false;
			} else {
				$indices .= ",id_zone";
				$valores .= "," . $this->time_zone;
			}
		}


		if (!empty($this->country)) {
			if ($first) {
				$indices .= "id_country";
				$valores .= $this->country;
				$first = false;
			} else {
				$indices .= ",id_country";
				$valores .= "," . $this->country;
			}
		}

		if (!empty($this->web)) {
			if ($first) {
				$indices .= "web";
				$valores .= "'" . $this->web . "'";
				$first = false;
			} else {
				$indices .= ",web";
				$valores .= ",'" . $this->web . "'";
			}
		}


		if (!empty($this->created)) {
			if ($first) {
				$indices .= "created";
				$valores .= "'" . $this->created . "'";
				$first = false;
			} else {
				$indices .= ",created";
				$valores .= ",'" . $this->created . "'";
			}
		}
		if (!empty($this->created_by)) {
			if ($first) {
				$indices .= "created_by";
				$valores .= "'" . $this->created_by . "'";
				$first = false;
			} else {
				$indices .= ",created_by";
				$valores .= ",'" . $this->created_by . "'";
			}
		}
		if (!empty($this->modified)) {
			if ($first) {
				$indices .= "modified";
				$valores .= "'" . $this->modified . "'";
				$first = false;
			} else {
				$indices .= ",modified";
				$valores .= ",'" . $this->modified . "'";
			}
		}
		if (!empty($this->modified_by)) {
			if ($first) {
				$indices .= "modified_by";
				$valores .= "'" . $this->modified_by . "'";
				$first = false;
			} else {
				$indices .= ",modified_by";
				$valores .= ",'" . $this->modified_by . "'";
			}
		}

		if (!empty($this->erased_date)) {
			if ($first) {
				$indices .= "date_erased";
				$valores .= "'" . $this->erased_date . "'";
				$first = false;
			} else {
				$indices .= ",date_erased";
				$valores .= ",'" . $this->erased_date . "'";
			}
		}
		
		if (!empty($this->internal_comment)) {
			if ($first) {
				$indices .= "internal_comment";
				$valores .= "'" . $this->internal_comment . "'";
				$first = false;
			} else {
				$indices .= ",internal_comment";
				$valores .= ",'" . $this->internal_comment . "'";
			}
		}
		
		if ($first) {
			$indices .= "active,erased";
			$valores .= $this->active.','.$this->erased;
			$first = false;
		} else {
			$indices .= ",active,erased";
			$valores .= "," . $this->active.','.$this->erased;
		}
                
                if (!empty($this->num_max_experiences)) {
			if ($first) {
				$indices .= "num_max_experiences";
				$valores .= $this->num_max_experiences;
				$first = false;
			} else {
				$indices .= ",num_max_experiences";
				$valores .= "," . $this->num_max_experiences;
			}
		}
                
                if (!empty($this->level)) {
			if ($first) {
				$indices .= "level";
				$valores .= $this->level;
				$first = false;
			} else {
				$indices .= ",level";
				$valores .= "," . $this->level;
			}
		}

		return parent::add($indices, $valores);
	}
        
        public function update($campos= '', $where = '') {
		
		$where = 'id_university='.$this->id_university;
		$first = true;
		
		if(!empty($this->name)){
			if ($first) {
				$campos.=" name_university='".$this->name."'";
				$first = false;
			} else {
				$campos.=", name_university='".$this->name."'";
			}
			
		}
		
		if(!empty($this->description)){
			if ($first) {
				$campos.=" description_university='".$this->description."'";
				$first = false;
			} else {
				$campos.=", description_university='".$this->description."'";
			}
			
		}

		if(!empty($this->time_zone)){
			if ($first) {
				$campos.=" id_zone=".$this->time_zone;
				$first = false;
			} else {
				$campos.=", id_zone=".$this->time_zone;
			}
			
		}
		
		if(!empty($this->country)){
			if ($first) {
				$campos.=" id_country=".$this->country;
				$first = false;
			} else {
				$campos.=", id_country=".$this->country;
			}
			
		}
		
		if(!empty($this->web)){
			if ($first) {
				$campos.=" web='".$this->web."'";
				$first = false;
			} else {
				$campos.=", web='".$this->web."'";
			}
			
		}

		if(!empty($this->modified)){
			if ($first) {
				$campos.=" modified='".$this->modified."'";
				$first = false;
			} else {
				$campos.=", modified='".$this->modified."'";
			}
			
		}
		if(!empty($this->modified_by)){
			if ($first) {
				$campos.=" modified_by='".$this->modified_by."'";
				$first = false;
			} else {
				$campos.=", modified_by='".$this->modified_by."'";
			}
			
		}
		
		if(!empty($this->date_erased)){
			if ($first) {
				$campos.=" date_erased=".$this->erased_date;
				$first = false;
			} else {
				$campos.=", date_erased=".$this->erased_date;
			}
			
		}

		
		if ($first) {
			$campos .= " active=$this->active, erased=$this->erased,internal_comment='$this->internal_comment',"
                                . "num_max_experiences=$this->num_max_experiences,level=$this->level";
			$first = false;
		} else {
			$campos .= ", active=$this->active, erased=$this->erased,internal_comment='$this->internal_comment',"
                                . "num_max_experiences=$this->num_max_experiences,level=$this->level";
			
		}
				
		return parent::update($campos, $where);
	}
	
	function updateActive(){
		
		$first = true;
		
		$where = 'id_university='.$this->id_university;
		
		if(!empty($this->modified)){
			if ($first) {
				$campos.=" modified='".$this->modified."'";
				$first = false;
			} else {
				$campos.=", modified='".$this->modified."'";
			}
			
		}
		if(!empty($this->modified_by)){
			if ($first) {
				$campos.=" modified_by='".$this->modified_by."'";
				$first = false;
			} else {
				$campos.=", modified_by='".$this->modified_by."'";
			}
			
		}
		
		if ($first) {
			$campos.= " active=".$this->active;
			$first = false;
		} else {
			$campos.= ", active=".$this->active;
			
		}
		
		return parent::update($campos, $where);
		
	}
	
	function updateErased(){
		
		$first = true;
		
		$where = 'id_university='.$this->id_university;
		
		if(!empty($this->modified)){
			if ($first) {
				$campos.=" modified='".$this->modified."'";
				$first = false;
			} else {
				$campos.=", modified='".$this->modified."'";
			}
			
		}
		if(!empty($this->modified_by)){
			if ($first) {
				$campos.=" modified_by='".$this->modified_by."'";
				$first = false;
			} else {
				$campos.=", modified_by='".$this->modified_by."'";
			}
			
		}
		
		if(!empty($this->erased_date)){
			if ($first) {
				$campos.=" date_erased='".$this->erased_date."'";
				$first = false;
			} else {
				$campos.=", date_erased='".$this->erased_date."'";
			}
			
		}
		
		if ($first) {
			$campos.= " erased=".$this->erased.",active=".$this->active;
			$first = false;
		} else {
			$campos.= ", erased=".$this->erased.",active=".$this->active;
			
		}
		
		return parent::update($campos, $where);
		
	}
	
	function updateInternalComment(){
	    
	    $where = 'id_university='.$this->id_university;
	    
	    $campos = " internal_comment='".$this->internal_comment."'";
	    
	    return parent::update($campos, $where);
	    
	}
	
	
	public function delete($where) {
		return parent::delete($where);
	}

	function getId_university() {
		return $this->id_university;
	}

	function getName() {
		return $this->name;
	}

	function getDescription() {
		return $this->description;
	}

	function getTime_zone() {
		return $this->time_zone;
	}

	function getCountry() {
		return $this->country;
	}

	function getActive() {
		return $this->active;
	}

	function getWeb() {
		return $this->web;
	}

	function getCreated() {
		return $this->created;
	}

	function getCreated_by() {
		return $this->created_by;
	}

	function getModified() {
		return $this->modified;
	}

	function getModified_by() {
		return $this->modified_by;
	}

	function getErased() {
		return $this->erased;
	}

	function getErased_date() {
		return $this->erased_date;
	}

	function setId_university($id_university) {
		$this->id_university = $id_university;
	}

	function setName($name) {
		$this->name = $name;
	}

	function setDescription($description) {
		$this->description = $description;
	}

	function setTime_zone($time_zone) {
		$this->time_zone = $time_zone;
	}

	function setCountry($country) {
		$this->country = $country;
	}

	function setActive($active) {
		$this->active = $active;
	}

	function setWeb($web) {
		$this->web = $web;
	}

	function setCreated($created) {
		$this->created = $created;
	}

	function setCreated_by($created_by) {
		$this->created_by = $created_by;
	}

	function setModified($modified) {
		$this->modified = $modified;
	}

	function setModified_by($modified_by) {
		$this->modified_by = $modified_by;
	}

	function setErased($erased) {
		$this->erased = $erased;
	}

	function setErased_date($erased_date) {
		$this->erased_date = $erased_date;
	}

	function getInternal_comment() {
	    return $this->internal_comment;
	}

	function setInternal_comment($internal_comment) {
	    $this->internal_comment = $internal_comment;
	}
        
        function getNum_max_experiences() {
            return $this->num_max_experiences;
        }

        function setNum_max_experiences($num_max_experiences): void {
            $this->num_max_experiences = $num_max_experiences;
        }

        function getLevel() {
            return $this->level;
        }

        function setLevel($level): void {
            $this->level = $level;
        }



}

?>