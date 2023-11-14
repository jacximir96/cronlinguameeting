
<?php

/*
 * Developed by wilowi
 */

class coachCoursesModel extends baseModel {

    private $coach_id = 0;
    private $course_id = 0;
    private $university_id = 0;

    function __construct() {

        parent::__construct();
        parent::setTable('lm_coach_courses');
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

        if (!empty($this->course_id)) {
            if ($first) {
                $indices .= "course_id";
                $valores .= $this->course_id;
                $first = false;
            } else {
                $indices .= ",course_id";
                $valores .= "," . $this->course_id;
            }
        }

        if (!empty($this->university_id)) {
            if ($first) {
                $indices .= "university_id";
                $valores .= $this->university_id;
                $first = false;
            } else {
                $indices .= ",university_id";
                $valores .= "," . $this->university_id;
            }
        }

        return parent::add($indices, $valores);
    }

    public function delete($where) {
        return parent::delete($where);
    }

    function getCoach_id() {
        return $this->coach_id;
    }

    function getCourse_id() {
        return $this->course_id;
    }

    function setCoach_id($coach_id): void {
        $this->coach_id = $coach_id;
    }

    function setCourse_id($course_id): void {
        $this->course_id = $course_id;
    }

    function getUniversity_id() {
        return $this->university_id;
    }

    function setUniversity_id($university_id): void {
        $this->university_id = $university_id;
    }


    
}

?>