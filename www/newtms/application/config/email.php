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
//$config['smtp_host'] = 'ssl://mail.xprienz.net';
//$config['smtp_port'] = '465';
//$config['smtp_user'] = 'noreply@xprienz.net';
//$config['smtp_pass'] = 'noreplySG@2019';

//
//$config['smtp_host'] = 'ssl://smtp.gmail.com';
//$config['smtp_port'] = '465';
//$config['smtp_user'] = 'biipbytedns@gmail.com';
//$config['smtp_pass'] = 'qwertyuiop@123';
///////currently added smtp detaiks for gmail by shubhranshu
$config['smtp_host'] = 'ssl://smtp.gmail.com';
$config['smtp_port'] = '465';
$config['smtp_user'] = 'biipmisg2020@gmail.com';
$config['smtp_pass'] = 'biipmisupport@123';

//$config['smtp_host'] = 'ssl://smtp.gmail.com';
//$config['smtp_port'] = '465';
//$config['smtp_user'] = 'payments@xprienz.com';
//$config['smtp_pass'] = 'biipmiSG2016';

//$config['smtp_host'] = 'ssl://mail.biipmi.co';
//$config['smtp_port'] = '465';
//$config['smtp_user'] = 'support@biipmi.co';
//$config['smtp_pass'] = 'BiipmiSG@2020';

$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['newline'] = "\r\n";
$config['smtp_timeout'] = 30;
//$this->email->initialize($config);

//$this->email->initialize($config);
/* End of file email.php */
/* Location: ./application/config/email.php */