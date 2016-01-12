<?php

error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

require_once __DIR__ . '/swiftmailer/lib/swift_required.php';

$config = array(
    "smtpServer" => "smtp.gmail.com",
    "smtpPort" => 465,
    "username" => "souravm@capitalnumbers.com",
    "password" => "nopass20"
);

$to = array('souravm@capitalnumbers.com');

$messageBody = 'Hello David,<br/><br/>';
$messageBody .= 'Today I have Worked on these sections: <br/>';
$messageBody .= '<br/><br/>---';
$messageBody .= '<br/>Sourav Mondal';
// Create the Transport
$transport = Swift_SmtpTransport::newInstance($config['smtpServer'], $config['smtpPort'])
        ->setUsername($config['username'])
        ->setPassword($config['password'])
        ->setEncryption('ssl');

// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

// Create the message
$message = Swift_Message::newInstance()
        ->setSubject('Work Update ' . date('d-M-Y'))
        ->setFrom(array('souravm@capitalnumbers.com' => 'Sourav Mondal'))
        ->setTo($to)
        ->setBody($messageBody, 'text/html');

// Send the message
$result = $mailer->send($message);

