<?php
require_once 'vendor/autoload.php';

$m = new PHPMailer;

$m->isSMTP();
$m->SMTPAuth = true;
$m->SMTPDebug =2;

$m->Host = '';
$m->Username = '';
$m->Password = '';
$m->SMTPSecure = 'ssl';
$m->Port = 465;

$m->From ='admin@from.com';
$m->FromName = 'Alex Garrett';
$m->addReplyTo('admin@reply.com','Reply address');
$m->addAddress('admin@to.com','alex');
/*$m->addCC('admin@cc.com','alex');
$m->addBCC('admin@bcc.com','alex');*/

$m->addAttachment('C:\xampp\htdocs\php-mailer-example\images\bc.gif');

$m->Subject = 'Here is an email for now';

$content =file_get_contents('C:\xampp\htdocs\php-mailer-example\sample.html',TRUE);

$m->Body = $content;

$m->AltBody = 'dsa';


if(!$m->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $m->ErrorInfo;
} else {
    echo 'Message has been sent';
}
