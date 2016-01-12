<?php

/*
 * all paypal configuration is here
 */

$config = array(
    'sandBoxUrl' => 'https://www.sandbox.paypal.com/cgi-bin/webscr', // for testing
    'liveUrl' => 'https://www.paypal.com/cgi-bin/webscr', //for production
    'businessID' => 'xxxxxxxxxxxxxxxxxxxxxxxxx',
    'currencyCode' => 'USD',
    'notifyUrl' => 'http://www.abc.co.in/paypal/paypal-ipn.php',
    'cancelReturn' => 'http://www.abc.co.in/paypal/PaymentFailed.html',
    'successUrl' => 'http://www.abc.co.in/paypal/ThankYou.html'
);
