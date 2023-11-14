
<?php

/*
 * Developed by wilowi
 */

class coachOccTermModel extends baseModel {

    private $coach_id = 0;
    private $semester_id = 0;
    private $year = 0;
    private $percentage = 0;

    function __construct() {

        parent::__construct();
        parent::setTable('lm_coach_occ_term');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
        return parent::select($where, $as, $select, $join);
    }

    public function add($indices = '', $valores = '') {

        $first = true;

        if (!empty($this->coach_id)) {
            if ($first) {
                $indices .= "coach_id";
                $valores .= $this->coach_id;
                $first = false;
            } else {
                $indices .= ",coach_id";
                $valores .= "," . $this->coach_id;
            }
        }

        if (!empty($this->semester_id)) {
            if ($first) {
                $indices .= "semester_id";
                $valores .= $this->semester_id;
                $first = false;
            } else {
                $indices .= ",semester_id";
                $valores .= "," . $this->semester_id;
            }
        }

        if (!empty($this->year)) {
            if ($first) {
                $indices .= "year";
                $valores .= $this->year;
                $first = false;
            } else {
                $indices .= ",year";
                $valores .= "," . $this->year;
            }
        }


            if ($first) {
                $indices .= "percentage";
                $valores .= "'" . $this->percentage . "'";
                $first = false;
            } else {
                $indices .= ",percentage";
                $valores .= ",'" . $this->percentage . "'";
            }


        return parent::add($indices, $valores);
    }

    public function updateOcc() {

        $where = "coach_id=$this->coach_id AND semester_id=$this->semester_id AND year=$this->year";

        $campos = "percentage='" . $this->percentage . "'";

        return parent::update($campos, $where);
    }
    
    public function delete($where) {
        return parent::delete($where);
    }
    

    function getCoach_id() {
        return $this->coach_id;
    }

    function getSemester_id() {
        return $this->semester_id;
    }

    function getYear() {
        return $this->year;
    }

    function getPercentage() {
        return $this->percentage;
    }

    function setCoach_id($coach_id): void {
        $this->coach_id = $coach_id;
    }

    function setSemester_id($semester_id): void {
        $this->semester_id = $semester_id;
    }

    function setYear($year): void {
        $this->year = $year;
    }

    function setPercentage($percentage): void {
        $this->percentage = $percentage;
    }
    

}

?>