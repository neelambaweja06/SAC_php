<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email{

    private $CI;
    private $config;

    public function __construct() {
        $this->CI = &get_instance();
        $this->CI->load->library('email');

        // Load your email configuration settings from the config file
        $this->CI->load->config('email');

        // Set your SMTP configuration
        $this->config = array(
            'protocol' => 'smtp',
            'smtp_host' => $this->CI->config->item('smtp_host'),
            'smtp_port' => $this->CI->config->item('smtp_port'),
            'smtp_user' => $this->CI->config->item('smtp_user'),
            'smtp_pass' => $this->CI->config->item('smtp_pass'),
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );

        $this->CI->email->initialize($this->config);
    }

    public function send_email($to, $subject, $message) {
        $this->CI->email->clear();

        $this->CI->email->to($to);
        $this->CI->email->from($this->CI->config->item('smtp_user'));
        $this->CI->email->subject($subject);
        $this->CI->email->message($message);

        return $this->CI->email->send();
    }
}
