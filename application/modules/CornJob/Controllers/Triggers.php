<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Triggers extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->model(array('users', 'group_model', 'country', 'Assets'));
        // $this->load->helper(array('url', 'language'));
        $this->load->helper(array('url', 'language', 'form', 'master_helper'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    // redirect if needed, otherwise display the user list
    public function index() {
        $asset_info = $this->Assets->corn_assets_list();
        if (isset($asset_info) && !empty($asset_info)) {
            foreach ($asset_info as $asset) {
                $trigger_info = $this->Assets->get_triggers($asset['assetid'], $asset['parameter_id']);
                if (isset($trigger_info) && !empty($trigger_info)) {
                    foreach ($trigger_info as $trigger) {
                        $sms_sent = $ws_sent = $email_sent = 0;
                        if ((strtolower($asset['alert_type']) == 'high' || strtolower($asset['alert_type']) == 'low') && $trigger['trigger_threshold_id'] = 'red') {
                            if ($trigger['email']) {
                                if ($this->send_alert_via_email($trigger, $asset)) {
                                    $email_sent = 1;
                                }
                            }
                            if ($trigger['sms_contact_no']) {
                                if ($this->send_alert_via_sms($trigger, $asset)) {
                                    $sms_sent = 1;
                                }
                                if ($this->send_alert_via_whatsapp($trigger, $asset)) {
                                    $ws_sent = 1;
                                }
                            }
                            $data = array(
                                'batchalert_id' => $asset['id'],
                                'runcode_id' => $asset['runcode_id'],
                                'email_flag' => $email_sent,
                                'sms_flag' => $sms_sent,
                                'whatsapp_flag' => $ws_sent,
                                'createdat' => date('Y-m-d h:i:s')
                            );
                            $this->Assets->insert_trigger_log($data);
                        }
                    }
                }
            }
        }
    }

    public function send_alert_via_email($data, $asset) {
        error_reporting(E_ALL ^ E_WARNING);
        error_reporting(0);

        $enquirer_name = "Ephytionsee";
        $enquirer_email = "mitroz.padamm@gmail.com";
        $subject_title = "Device Alert";
        $mail_body = "Tesing";
        $mail = new PHPMailer();
        //$mail->IsSendmail(); // send via SMTP
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        $mail->SMTPAuth = true; // turn on SMTP authentication
        $mail->Username = "mitroz.padamm@gmail.com"; // SMTP username
        $mail->Password = "maher0122"; // SMTP password
        $webmaster_email = "mitroz.padamm@gmail.com"; //Reply to this email ID
        //$mail->SMTPSecure = 'ssl';
        $mail->Port = "587";
        $mail->Host = 'smtp.gmail.com'; //hostname
//        $receiver_email = $data['email']; #'padamasing.m@mindworx.in';
        $email = $data['email']; // Recipients email ID //inquiry@mindworx.in

        $mail->From = $enquirer_email;
        $mail->FromName = $enquirer_name;
        $mail->AddAddress($email);
        $mail->AddReplyTo($enquirer_email, $enquirer_name);
        $mail->WordWrap = 50; // set word wrap
        $mail->IsHTML(false); // send as HTML
        $mail->Subject = $subject_title;
        $mail->MsgHTML($mail_body);
        $mail->AltBody = "This is the body when user views in plain text format"; //Text Body
        if (!$mail->Send()) {
            // echo "Mailer Error: " . $mail->ErrorInfo;
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function send_alert_via_sms($trigger, $asset) {
        return TRUE;
    }

    public function send_alert_via_whatsapp($trigger, $asset) {
        return TRUE;
    }

}
