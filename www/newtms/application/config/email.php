<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Email
| -------------------------------------------------------------------------
| This file lets you define parameters for sending emails.
| Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/libraries/email.html
|*/

$config['protocol'] = 'smtp';
//$config['smtp_host'] = 'mail.xprienz.net';
//$config['smtp_port'] = '465';
//$config['smtp_user'] = 'noreply@xprienz.net';
//$config['smtp_pass'] = 'noreplySG@2019';


$config['smtp_host'] = 'mail.bid4jeet.in';
$config['smtp_port'] = '465';
$config['smtp_user'] = 'care@bid4jeet.in';
$config['smtp_pass'] = 'Dipu@9861057382';

$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
$config['smtp_timeout'] = 30;


//$this->email->initialize($config);
/* End of file email.php */
/* Location: ./application/config/email.php */