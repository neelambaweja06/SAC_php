

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmailController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('email'); // Load the custom email library
    }

    public function send_test_email() {
        $to = 'guptamahip39@gmail.com';
        $subject = 'Test Email';
        $message = 'This is a test email sent using the custom email library.';
        
        if ($this->email_smtp->send_email($to, $subject, $message)) {
            echo 'Email sent successfully.';
        } else {
            echo 'Email sending failed.';
        }
    }
}
