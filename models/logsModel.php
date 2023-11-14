<?php

/*
 * Developed by wilowi
 */

/**
 * Description of logsModel
 *
 * @author Sandra <wilowi.com>
 */
class logsModel {

    private $url_base = '';
    private $msg = '';
    private $folder = '';
    private $file_name = '';

    /**
     * type message:
     * - WARNING
     * - ERROR
     * - INFO
     * @var type 
     */
    private $type_msg = '';

    public function __construct() {

        $server = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT', FILTER_SANITIZE_STRING);
        
        date_default_timezone_set('Europe/Madrid');

        if (_ENVIRONMENT == 'production') {
            $this->url_base = '/var/cron/cronlinguameeting/dataLogs/';
        }elseif(_ENVIRONMENT == 'develop'){
            $this->url_base = '/var/cron/cronlinguameeting/dataLogs/';
        }else {
            $this->url_base = $server . '/cronlinguameeting/dataLogs/';
        }

    }

    public function writeLog() {

        $today = new DateTime('now');
        $aux_fileName = $today->format('Y_m_d') . '_';

        try {

            $archivo = $this->url_base . $this->folder . $aux_fileName . $this->file_name;
            $file = fopen($archivo, "a");

            $msg = '[' . $today->format('Y-m-d H:i:s') . '][' . $this->type_msg . ']' . ' - ' . $this->msg;
            $write = fwrite($file, $msg . PHP_EOL);
            fclose($file);
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    function getUrl_base() {
        return $this->url_base;
    }

    function getMsg() {
        return $this->msg;
    }

    function getFolder() {
        return $this->folder;
    }

    function getFile_name() {
        return $this->file_name;
    }

    function getType_msg() {
        return $this->type_msg;
    }

    function setUrl_base($url_base) {
        $this->url_base = $url_base;
    }

    function setMsg($msg) {
        $this->msg = $msg;
    }

    function setFolder($folder) {
        $this->folder = $folder;
    }

    function setFile_name($file_name) {
        $this->file_name = $file_name;
    }

    function setType_msg($type_msg) {
        $this->type_msg = $type_msg;
    }

}

?>
