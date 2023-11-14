<?php

/* 
 * Developed by wilowi
 */

// Usando nueva versión de phpmailer 6.2
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (_ENVIRONMENT == 'production') {
    
    require '/var/cron/cronlinguameeting/vendor/phpmailer/phpmailer/src/Exception.php';
    require '/var/cron/cronlinguameeting/vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require '/var/cron/cronlinguameeting/vendor/phpmailer/phpmailer/src/SMTP.php';
    include_once '/var/cron/cronlinguameeting/util.php';
    include_once '/var/cron/cronlinguameeting/config.php';
    include_once '/var/cron/cronlinguameeting/autoload.php';
    
} elseif (_ENVIRONMENT == 'develop') {

    require '/var/cron/develop/cronlinguameeting/vendor/phpmailer/phpmailer/src/Exception.php';
    require '/var/cron/develop/cronlinguameeting/vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require '/var/cron/develop/cronlinguameeting/vendor/phpmailer/phpmailer/src/SMTP.php';
    include_once '/var/cron/develop/cronlinguameeting/util.php';
    include_once '/var/cron/develop/cronlinguameeting/config.php';
    include_once '/var/cron/develop/cronlinguameeting/autoload.php';
    
} else {
    require $_SERVER['DOCUMENT_ROOT'] . '/cronlinguameeting/vendor/phpmailer/phpmailer/src/Exception.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/cronlinguameeting/vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/cronlinguameeting/vendor/phpmailer/phpmailer/src/SMTP.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/cronlinguameeting/util.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/cronlinguameeting/config.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/cronlinguameeting/autoload.php';
}


class lmMailer {

    private $mail = null;
    private $from = 'no-reply@linguameeting.com';
    private $host = 'smtp.gmail.com';
    private $username = 'no-reply@linguameeting.com';
    private $password = 'a73&h#6Qy#';
    private $port = 587;
    private $result = false;

    /**
     * Constructor de la clase
     */
    public function __construct() {

        $this->mail = new PHPMailer;
        $this->mail->Host = $this->host;
        $this->mail->isSMTP();
        $this->mail->Timeout = 300;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $this->username;
        $this->mail->Password = $this->password;
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Port = $this->port;
        $this->mail->setFrom($this->from, 'LinguaMeeting');
        $this->mail->isHTML(true);
        $this->mail->AltBody = "To see the message, please use an HTM compatible viewer - From " . _URL_LOCATION_LINGUAMEETING;
        $this->mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
    }

    /**
     * Destructor de la clase
     *
     */
    public function __destruct() {
        
    }

    public function setSupport($from = '') {

        if (empty($from)) {

            $this->mail->setFrom('support@linguameeting.com', 'LinguaMeeting');
        } else {

            $this->mail->setFrom($from, 'LinguaMeeting');
        }

        $this->mail->Username = 'support@linguameeting.com';
        $this->mail->Password = 'm27$rIZ3q@';
    }

    /* public function setTech(){

      $this->mail->setFrom('techsupport@linguameeting.com', 'LinguaMeeting');
      $this->mail->Username = 'techsupport@linguameeting.com';
      $this->mail->Password = '**';

      } */

    public function setInfo() {

        $this->mail->setFrom('info@linguameeting.com', 'LinguaMeeting');
        $this->mail->Username = 'info@linguameeting.com';
        $this->mail->Password = '6Pe#K3Ag';
    }
    
    public function setSessions() {

        $this->mail->setFrom('no-reply-sessions@linguameeting.com', 'LinguaMeeting');
        $this->mail->Username = 'no-reply-sessions@linguameeting.com';
        $this->mail->Password = '#UNeJ24AeGgF4qH#';
    }
    
    public function setSessions2() {

        $this->mail->setFrom('no-reply2-sessions@linguameeting.com', 'LinguaMeeting');
        $this->mail->Username = 'no-reply2-sessions@linguameeting.com';
        $this->mail->Password = 'SDW98b%RhCq#9gJ#';
    }

    public function setExperiences() {

        $this->mail->setFrom('experiences-noreply@linguameeting.com', 'LinguaMeeting Experiences');
        $this->mail->Username = 'experiences-noreply@linguameeting.com';
        $this->mail->Password = 'E6H3q#BL';
    }

    public function setOpen() {
        $this->mail->SMTPKeepAlive = true;
    }

    public function setClose() {
        $this->mail->smtpClose();
    }

    public function sendStandarMail(string $subject, string $body) {

        $this->mail->Subject = $subject;
        //$this->mail->SMTPDebug = 2;
        $this->mail->MsgHTML($body);

        if (!$this->mail->send()) {
            //echo $this->mail->ErrorInfo;
            $log = new logsModel();
            $log->setFolder('mails/');
            $log->setFile_name('sendMail.txt');
            $log->setType_msg('ERROR');
            $log->setMsg('class lmMailer.php: ' . $this->mail->ErrorInfo);
            $log->writeLog();
            $this->result = false;
        } else {
            $this->result = true;
            $this->mail->clearAttachments();
        }

        return $this->result;
    }

    public function sendMasiveMail(string $subject, string $body) {

        $this->mail->Subject = $subject;
        //$this->mail->SMTPDebug = 2;
        $this->mail->MsgHTML($body);

        if (!$this->mail->send()) {
            //echo $this->mail->ErrorInfo;
            $log = new logsModel();
            $log->setFolder('mails/');
            $log->setFile_name('sendMailMasive.txt');
            $log->setType_msg('ERROR');
            $log->setMsg('class lmMailer.php: ' . $this->mail->ErrorInfo);
            $log->writeLog();
            $this->result = false;
        } else {
            $this->result = true;
            $this->mail->clearAttachments();
        }

        return $this->result;
    }

    public function setAddress(array $addresses) {


        foreach ($addresses as $address) {

            /* if($address=='elena@linguameeting.com' || $address=='seguridad@linguameeting.com' || $address=='support@linguameeting.com'){
              $this->mail->setFrom('seguridad@linguameeting.com','LinguaMeeting');
              $this->mail->Host = 'smtp.linguameeting.com';
              $this->mail->Username = 'seguridad@linguameeting.com';
              $this->mail->Password = '1r,u+INxFs\W';

              $this->from = 'seguridad@linguameeting.com';
              $this->host = 'smtp.linguameeting.com';
              $this->username = 'seguridad@linguameeting.com';
              $this->password = '1r,u+INxFs\W';

              } */

            $this->mail->addAddress($address);
        }
    }

    public function setBCC(array $addresses) {

        foreach ($addresses as $address) {

            $this->mail->addBCC($address);
        }
    }

    public function setAttachment(array $attachments) {


        foreach ($attachments as $attach) {

            $this->mail->addAttachment($attach);
        }
    }

}

?>