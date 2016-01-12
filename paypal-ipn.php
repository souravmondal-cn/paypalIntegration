<?php

require_once __DIR__ . '/swiftmailer/lib/swift_required.php';

$config = array(
    "smtpServer" => "smtp.gmail.com",
    "smtpPort" => 465,
    "username" => "xxxxxxxxxxxxxx@gmail.com",
    "password" => "xxxxxxxxxx"
);

$to = array('xxxxxxx@gmail.com');
// Create the Transport
$transport = Swift_SmtpTransport::newInstance($config['smtpServer'], $config['smtpPort'])
        ->setUsername($config['username'])
        ->setPassword($config['password'])
        ->setEncryption('ssl');

// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

$request = "cmd=_notify-validate";

foreach ($_POST as $varname => $varvalue) {
    $email .= "$varname: $varvalue\n";
    if (function_exists('get_magic_quotes_gpc') and get_magic_quotes_gpc()) {
        $varvalue = urlencode(stripslashes($varvalue));
    } else {
        $value = urlencode($value);
    }
    $request .= "&$varname=$varvalue";
}
$allData = 'all data : -- ';
foreach ($_POST as $varname => $varvalue) {
    $allData .= ' ' . $varname . '=' . $varvalue . ' <br/>';
}
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.sandbox.paypal.com/cgi-bin/webscr"); //for development
//curl_setopt($ch,CURLOPT_URL,"https://www.paypal.com/us/cgi-bin/webscr"); //for production
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
$cemail_id = 'xxxxxxxxxx@gmail.com';
switch ($result) {
    case "VERIFIED": // verified payment on success
        $subject = "paypal verified";
        $messageBody = $allData;
        break;
    case "INVALID": // invalid , fake payment, mail for user on failure
        $subject = "paypal invalid case";
        $messageBody = $allData;
        break;
    default: //default case, also to be consider as failure
        $subject = "paypal default case";
        $messageBody = $allData;
}

// Create the message
$message = Swift_Message::newInstance()
        ->setSubject($subject)
        ->setFrom(array('xxxxxxxxxxxx@gmail.com' => 'Sourav Mondal'))
        ->setTo($to)
        ->setBody($messageBody, 'text/html');

$mailer->send($message);


