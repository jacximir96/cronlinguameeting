<?php

/**
 * Description of feedbacksCoachesModel
 *
 * @author Sandra <wilowi.com>
 */
class feedbacksCoachesModel extends baseModel {

    //put your code here

    private $id_feed_coach = 0;
    private $id_coach = 0;
    private $feedback_json = '';
    private $date_feedback = '';
    private $url_zoom_feedback = '';
    private $file_feedback = '';

    function __construct() {

	parent::__construct();
	parent::setTable('lm_feedbacks_coaches');
    }

    public function select($where = '', $as = '', $select = '*', $join = '') {
	return parent::select($where, $as, $select, $join);
    }

    public function add($indices = '', $values = '') {

	$first = true;

	if (!empty($this->id_coach)) {
	    if ($first) {
		$indices .= "id_coach";
		$values .= $this->id_coach;
		$first = false;
	    } else {
		$indices .= ",id_coach";
		$values .= "," . $this->id_coach;
	    }
	}


	if (!empty($this->feedback_json)) {
	    if ($first) {
		$indices .= "feedback_json";
		$values .= "'" . $this->feedback_json . "'";
		$first = false;
	    } else {
		$indices .= ",feedback_json";
		$values .= ",'" . $this->feedback_json . "'";
	    }
	}

	if (!empty($this->date_feedback)) {
	    if ($first) {
		$indices .= "date_feedback";
		$values .= "'" . $this->date_feedback . "'";
		$first = false;
	    } else {
		$indices .= ",date_feedback";
		$values .= ",'" . $this->date_feedback . "'";
	    }
	}

	if (!empty($this->url_zoom_feedback)) {
	    if ($first) {
		$indices .= "url_zoom_feedback";
		$values .= "'" . $this->url_zoom_feedback . "'";
		$first = false;
	    } else {
		$indices .= ",url_zoom_feedback";
		$values .= ",'" . $this->url_zoom_feedback . "'";
	    }
	}

	if (!empty($this->file_feedback)) {
	    if ($first) {
		$indices .= "file_feedback";
		$values .= "'" . $this->file_feedback . "'";
		$first = false;
	    } else {
		$indices .= ",file_feedback";
		$values .= ",'" . $this->file_feedback . "'";
	    }
	}


	return parent::add($indices, $values);
    }

    public function delete($where) {
	return parent::delete($where);
    }

    public function update($campos = '', $where = '') {


	$where = 'id_coach=' . $this->id_coach.' AND id_feed_coach='.$this->id_feed_coach;
	$first = true;


	if (!empty($this->feedback_json)) {
	    if ($first) {
		$campos .= " feedback_json='" . $this->feedback_json . "'";
		$first = false;
	    } else {
		$campos .= ", feedback_json='" . $this->feedback_json . "'";
	    }
	}

	if (!empty($this->date_feedback)) {
	    if ($first) {
		$campos .= " date_feedback='" . $this->date_feedback . "'";
		$first = false;
	    } else {
		$campos .= ", date_feedback='" . $this->date_feedback . "'";
	    }
	}

	if (!empty($this->url_zoom_feedback)) {
	    if ($first) {
		$campos .= " url_zoom_feedback='" . $this->url_zoom_feedback . "'";
		$first = false;
	    } else {
		$campos .= ", url_zoom_feedback='" . $this->url_zoom_feedback . "'";
	    }
	}

	if (!empty($this->file_feedback)) {
	    if ($first) {
		$campos .= " file_feedback='" . $this->file_feedback . "'";
		$first = false;
	    } else {
		$campos .= ", file_feedback='" . $this->file_feedback . "'";
	    }
	}

	return parent::update($campos, $where);
    }

    function getId_feed_coach() {
	return $this->id_feed_coach;
    }

    function getId_coach() {
	return $this->id_coach;
    }

    function getFeedback_json() {
	return $this->feedback_json;
    }

    function getDate_feedback() {
	return $this->date_feedback;
    }

    function getUrl_zoom_feedback() {
	return $this->url_zoom_feedback;
    }

    function getFile_feedback() {
	return $this->file_feedback;
    }

    function setId_feed_coach($id_feed_coach) {
	$this->id_feed_coach = $id_feed_coach;
    }

    function setId_coach($id_coach) {
	$this->id_coach = $id_coach;
    }

    function setFeedback_json($feedback_json) {
	$this->feedback_json = $feedback_json;
    }

    function setDate_feedback($date_feedback) {
	$this->date_feedback = $date_feedback;
    }

    function setUrl_zoom_feedback($url_zoom_feedback) {
	$this->url_zoom_feedback = $url_zoom_feedback;
    }

    function setFile_feedback($file_feedback) {
	$this->file_feedback = $file_feedback;
    }

}
