<?php

/* 
 * Developed by wilowi
 */

class coachingFormModel extends baseModel {

	private $id_form = 0;
	private $id_university = 0;
	private $start_date = null;
	private $end_date = null;
	private $break_start = null;
	private $break_end = null;
	private $blocked = 0;
	private $observations = '';
	private $name_form = '';
	private $created = null;
	private $created_by = '';
	private $modified = null;
	private $modified_by = '';
	private $blocked_admin = 0;
	private $internal_comment = '';

	function __construct() {

		parent::__construct();
		parent::setTable('lm_coaching_form');
	}

	public function select($where = '', $as = '', $select = '*', $join = '') {
		return parent::select($where, $as, $select, $join);
	}

	public function add($indices = '', $valores = '') {

		$first = true;		

		if (!empty($this->id_university)) {
			if ($first) {
				$indices .= "id_university";
				$valores .= $this->id_university;
				$first = false;
			} else {
				$indices .= ",id_university";
				$valores .= "," . $this->id_university;
			}
		}
		
		if (!empty($this->start_date)) {
			if ($first) {
				$indices .= "start_date";
				$valores .= "'" . $this->start_date . "'";
				$first = false;
			} else {
				$indices .= ",start_date";
				$valores .= ",'" . $this->start_date . "'";
			}
		}
		
		if (!empty($this->end_date)) {
			if ($first) {
				$indices .= "end_date";
				$valores .= "'" . $this->end_date . "'";
				$first = false;
			} else {
				$indices .= ",end_date";
				$valores .= ",'" . $this->end_date . "'";
			}
		}
		
		if (!empty($this->break_start)) {
			if ($first) {
				$indices .= "break_start";
				$valores .= "'" . $this->break_start . "'";
				$first = false;
			} else {
				$indices .= ",break_start";
				$valores .= ",'" . $this->break_start . "'";
			}
		}
		
		if (!empty($this->break_end)) {
			if ($first) {
				$indices .= "break_end";
				$valores .= "'" . $this->break_end . "'";
				$first = false;
			} else {
				$indices .= ",break_end";
				$valores .= ",'" . $this->break_end . "'";
			}
		}
		
		if (!empty($this->observations)) {
			if ($first) {
				$indices .= "observations";
				$valores .= "'" . $this->observations . "'";
				$first = false;
			} else {
				$indices .= ",observations";
				$valores .= ",'" . $this->observations . "'";
			}
		}
		
		if (!empty($this->name_form)) {
			if ($first) {
				$indices .= "name_form";
				$valores .= "'" . $this->name_form . "'";
				$first = false;
			} else {
				$indices .= ",name_form";
				$valores .= ",'" . $this->name_form . "'";
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
			$indices .= "blocked,blocked_admin";
			$valores .= $this->blocked.",".$this->blocked_admin;
			$first = false;
		} else {
			$indices .= ",blocked,blocked_admin";
			$valores .= ",".$this->blocked.",".$this->blocked_admin;
		}

		return parent::add($indices, $valores);
	}
	
	public function update($campos='', $where = '') {
		
		$where = 'id_form='.$this->id_form.' AND id_university='.$this->id_university;
		$first = true;

		if(!empty($this->start_date)){
			if ($first) {
				$campos.=" start_date='".$this->start_date."'";
				$first = false;
			} else {
				$campos.=", start_date='".$this->start_date."'";
			}
			
		}
		
		if(!empty($this->end_date)){
			if ($first) {
				$campos.=" end_date='".$this->end_date."'";
				$first = false;
			} else {
				$campos.=", end_date='".$this->end_date."'";
			}
			
		}
		
		if(!empty($this->break_start)){
			if ($first) {
				$campos.=" break_start='".$this->break_start."'";
				$first = false;
			} else {
				$campos.=", break_start='".$this->break_start."'";
			}
			
		}else{
			if ($first) {
				$campos.=" break_start=null";
				$first = false;
			} else {
				$campos.=", break_start=null";
			}
			
		}
		
		if(!empty($this->break_end)){
			if ($first) {
				$campos.=" break_end='".$this->break_end."'";
				$first = false;
			} else {
				$campos.=", break_end='".$this->break_end."'";
			}
			
		}else{
			if ($first) {
				$campos.=" break_end=null";
				$first = false;
			} else {
				$campos.=", break_end=null";
			}
		}
		
		if(!empty($this->observations)){
			if ($first) {
				$campos.=" observations='".$this->observations."'";
				$first = false;
			} else {
				$campos.=", observations='".$this->observations."'";
			}
			
		}
		
		if(!empty($this->name_form)){
			if ($first) {
				$campos.=" name_form='".$this->name_form."'";
				$first = false;
			} else {
				$campos.=", name_form='".$this->name_form."'";
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
		
		
		if ($first) {
			$campos .= " blocked=$this->blocked,blocked_admin=$this->blocked_admin,internal_comment='$this->internal_comment'";
			$first = false;
		} else {
			$campos .= ", blocked=$this->blocked,blocked_admin=$this->blocked_admin,internal_comment='$this->internal_comment'";
			
		}		
		
		return parent::update($campos, $where);
	}
	
	
	public function updateBlock($campos='', $where = '') {
		
		$where = 'id_form='.$this->id_form.' AND id_university='.$this->id_university;
		$first = true;

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
			$campos .= " blocked=$this->blocked";
			$first = false;
		} else {
			$campos .= ", blocked=$this->blocked";
			
		}		
		
		return parent::update($campos, $where);
	}
	
	public function updateBlockAdmin($campos='', $where = '') {
		
		$where = 'id_form='.$this->id_form.' AND id_university='.$this->id_university;
		$first = true;

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
			$campos .= " blocked_admin=$this->blocked_admin";
			$first = false;
		} else {
			$campos .= ", blocked_admin=$this->blocked_admin";
			
		}		
		
		return parent::update($campos, $where);
	}
	
	function updateInternalComment(){
	    
	    $where = 'id_form='.$this->id_form;
	    
	    $campos = " internal_comment='".$this->internal_comment."'";
	    
	    return parent::update($campos, $where);
	    
	}

	function getId_form() {
		return $this->id_form;
	}

	function getId_university() {
		return $this->id_university;
	}

	function getStart_date() {
		return $this->start_date;
	}

	function getEnd_date() {
		return $this->end_date;
	}

	function getBreak_start() {
		return $this->break_start;
	}

	function getBreak_end() {
		return $this->break_end;
	}

	function getBlocked() {
		return $this->blocked;
	}

	function getObservations() {
		return $this->observations;
	}
	
	function getName_form() {
		return $this->name_form;
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

	function setId_form($id_form) {
		$this->id_form = $id_form;
	}

	function setId_university($id_university) {
		$this->id_university = $id_university;
	}

	function setStart_date($start_date) {
		$this->start_date = $start_date;
	}

	function setEnd_date($end_date) {
		$this->end_date = $end_date;
	}

	function setBreak_start($break_start) {
		$this->break_start = $break_start;
	}

	function setBreak_end($break_end) {
		$this->break_end = $break_end;
	}

	function setBlocked($blocked) {
		$this->blocked = $blocked;
	}

	function setObservations($observations) {
		$this->observations = $observations;
	}
	
	function setName_form($name_form) {
		$this->name_form = $name_form;
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

	function getBlocked_admin() {
	    return $this->blocked_admin;
	}

	function setBlocked_admin($blocked_admin) {
	    $this->blocked_admin = $blocked_admin;
	}


	function getInternal_comment() {
	    return $this->internal_comment;
	}

	function setInternal_comment($internal_comment) {
	    $this->internal_comment = $internal_comment;
	}
}

?>