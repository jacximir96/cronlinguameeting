<?php

/**
 * Description of enrollmentSessionModel
 *
 * @author Jacximir
 */

class enrollmentSessionModel extends baseModel
{
    private $id;
    private $coaching_week_id = 0;
    private $comments = '';
    private $created_at = '';
    private $day = '';
    private $deleted_at = '';
    private $end_time = '';
    private $enrollment_id = 0;
    private $extra_session_id = 0;
    private $makeup_id = 0;
    private $session_end = '';
    private $session_id = 0;
    private $session_id_recovered = 0;
    private $session_order = 0;
    private $session_start = '';
    private $session_status_id = 0;
    private $start_time = '';
    private $updated_at = '';

    function __construct()
    {
        parent::__construct();
        parent::setTable('enrollment_session');
    }

    public function autoCommit($value = true)
    {
        parent::autoCommit($value);
    }

    public function commit()
    {
        parent::commit();
    }

    public function rollBack()
    {
        parent::rollBack();
    }

    public function select($where = '', $as = '', $select = '*', $join = '')
    {
        return parent::select($where, $as, $select, $join);
    }

    public function add($indices = '', $valores = '')
    {

        $first = true;

        if (!empty($this->coaching_week_id)) {
            if ($first) {
                $indices .= "coaching_week_id";
                $valores .= $this->coaching_week_id;
                $first = false;
            } else {
                $indices .= ",coaching_week_id";
                $valores .= "," . $this->coaching_week_id;
            }
        }

        if (!empty($this->comments)) {
            if ($first) {
                $indices .= "comments";
                $valores .= "'" . $this->comments . "'";
                $first = false;
            } else {
                $indices .= ",comments";
                $valores .= ",'" . $this->comments . "'";
            }
        }

        if (!empty($this->created_at)) {
            if ($first) {
                $indices .= "created_at";
                $valores .= "'" . $this->created_at . "'";
                $first = false;
            } else {
                $indices .= ",created_at";
                $valores .= ",'" . $this->created_at . "'";
            }
        }

        if (!empty($this->day)) {
            if ($first) {
                $indices .= "day";
                $valores .= "'" . $this->day . "'";
                $first = false;
            } else {
                $indices .= ",day";
                $valores .= ",'" . $this->day . "'";
            }
        }

        if (!empty($this->deleted_at)) {
            if ($first) {
                $indices .= "deleted_at";
                $valores .= "'" . $this->deleted_at . "'";
                $first = false;
            } else {
                $indices .= ",deleted_at";
                $valores .= ",'" . $this->deleted_at . "'";
            }
        }

        if (!empty($this->end_time)) {
            if ($first) {
                $indices .= "end_time";
                $valores .= "'" . $this->end_time . "'";
                $first = false;
            } else {
                $indices .= ",end_time";
                $valores .= ",'" . $this->end_time . "'";
            }
        }

        if (!empty($this->enrollment_id)) {
            if ($first) {
                $indices .= "enrollment_id";
                $valores .= $this->enrollment_id;
                $first = false;
            } else {
                $indices .= ",enrollment_id";
                $valores .= "," . $this->enrollment_id;
            }
        }

        if (!empty($this->extra_session_id)) {
            if ($first) {
                $indices .= "extra_session_id";
                $valores .= $this->extra_session_id;
                $first = false;
            } else {
                $indices .= ",extra_session_id";
                $valores .= "," . $this->extra_session_id;
            }
        }

        if (!empty($this->makeup_id)) {
            if ($first) {
                $indices .= "makeup_id";
                $valores .= $this->makeup_id;
                $first = false;
            } else {
                $indices .= ",makeup_id";
                $valores .= "," . $this->makeup_id;
            }
        }

        if (!empty($this->session_end)) {
            if ($first) {
                $indices .= "session_end";
                $valores .= "'" . $this->session_end . "'";
                $first = false;
            } else {
                $indices .= ",session_end";
                $valores .= ",'" . $this->session_end . "'";
            }
        }

        if (!empty($this->session_id)) {
            if ($first) {
                $indices .= "session_id";
                $valores .= $this->session_id;
                $first = false;
            } else {
                $indices .= ",session_id";
                $valores .= "," . $this->session_id;
            }
        }

        if (!empty($this->session_id_recovered)) {
            if ($first) {
                $indices .= "session_id_recovered";
                $valores .= $this->session_id_recovered;
                $first = false;
            } else {
                $indices .= ",session_id_recovered";
                $valores .= "," . $this->session_id_recovered;
            }
        }

        if (!empty($this->session_order)) {
            if ($first) {
                $indices .= "session_order";
                $valores .= $this->session_order;
                $first = false;
            } else {
                $indices .= ",session_order";
                $valores .= "," . $this->session_order;
            }
        }

        if (!empty($this->session_start)) {
            if ($first) {
                $indices .= "session_start";
                $valores .= "'" . $this->session_start . "'";
                $first = false;
            } else {
                $indices .= ",session_start";
                $valores .= ",'" . $this->session_start . "'";
            }
        }

        if (!empty($this->session_status_id)) {
            if ($first) {
                $indices .= "session_status_id";
                $valores .= $this->session_status_id;
                $first = false;
            } else {
                $indices .= ",session_status_id";
                $valores .= "," . $this->session_status_id;
            }
        }

        if (!empty($this->start_time)) {
            if ($first) {
                $indices .= "start_time";
                $valores .= "'" . $this->start_time . "'";
                $first = false;
            } else {
                $indices .= ",start_time";
                $valores .= ",'" . $this->start_time . "'";
            }
        }

        if (!empty($this->updated_at)) {
            if ($first) {
                $indices .= "updated_at";
                $valores .= "'" . $this->updated_at . "'";
                $first = false;
            } else {
                $indices .= ",updated_at";
                $valores .= ",'" . $this->updated_at . "'";
            }
        }

        /*if ($first) {
            $indices .= "attendance,missed,past,from_makeup,from_extra,assigned,session_id";
            $valores .= $this->attendance . ',' . $this->missed . ',' . $this->past . ',' . $this->from_make_up . ',' . $this->from_extra . ',' . $this->assigned . "," . $this->session_id;
            $first = false;
        } else {
            $indices .= ",attendance,missed,past,from_makeup,from_extra,assigned,session_id";
            $valores .= "," . $this->attendance . ',' . $this->missed . ',' . $this->past . ',' . $this->from_make_up . ',' . $this->from_extra . ',' . $this->assigned . "," . $this->session_id;
        }*/

        return parent::add($indices, $valores);
    }

    public function updateSessionStatusId()
    {
        $where = "id=" . $this->id;
        $campos = " session_status_id=" . $this->session_status_id;
        return parent::update($campos, $where);
    }

    function getId_enrollment_session() {
        return $this->id;
    }

    function getId_coaching_week() {
        return $this->coaching_week_id;
    }

    function getComments() {
        return $this->comments;
    }

    function getCreated_at() {
        return $this->created_at;
    }

    function getDay() {
        return $this->day;
    }

    function getDeleted_at() {
        return $this->deleted_at;
    }

    function getEnd_time() {
        return $this->end_time;
    }

    function getId_enrollment() {
        return $this->enrollment_id;
    }

    function getId_extra_session() {
        return $this->extra_session_id;
    }

    function getId_make_up() {
        return $this->makeup_id;
    }

    function getSession_end() {
        return $this->session_end;
    }

    function getId_session() {
        return $this->session_id;
    }

    function getId_session_recovered() {
        return $this->session_id_recovered;
    }

    function getSession_order() {
        return $this->session_order;
    }

    function getSession_start() {
        return $this->session_start;
    }

    function getId_session_status() {
        return $this->session_status_id;
    }

    function getStart_time() {
        return $this->start_time;
    }

    function getUpdated_at() {
        return $this->updated_at;
    }

    function setId_enrollment_session($id): void {
        $this->id = $id;
    }

    function setId_coaching_week($coaching_week_id): void {
        $this->coaching_week_id = $coaching_week_id;
    }

    function setComments($comments): void {
        $this->comments = $comments;
    }

    function setCreated_at($created_at): void {
        $this->created_at = $created_at;
    }

    function setDay($day): void {
        $this->day = $day;
    }

    function setDeleted_at($deleted_at): void {
        $this->deleted_at = $deleted_at;
    }

    function setEnd_time($end_time): void {
        $this->end_time = $end_time;
    }

    function setId_enrollment($enrollment_id): void {
        $this->enrollment_id = $enrollment_id;
    }

    function setId_extra_session($extra_session_id): void {
        $this->extra_session_id = $extra_session_id;
    }

    function setId_make_up($makeup_id): void {
        $this->makeup_id = $makeup_id;
    }

    function setSession_end($session_end): void {
        $this->session_end = $session_end;
    }

    function setId_session($session_id): void {
        $this->session_id = $session_id;
    }

    function setId_session_recovered($session_id_recovered): void {
        $this->session_id_recovered = $session_id_recovered;
    }

    function setSession_order($session_order): void {
        $this->session_order = $session_order;
    }

    function setSession_start($session_start): void {
        $this->session_start = $session_start;
    }

    function setId_session_status($session_status_id): void {
        $this->session_status_id = $session_status_id;
    }

    function setStart_time($start_time): void {
        $this->start_time = $start_time;
    }

    function setUpdated_at($updated_at): void {
        $this->updated_at = $updated_at;
    }
}
