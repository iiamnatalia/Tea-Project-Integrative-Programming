<?php
require_once('vendor/autoload.php');

$client = new \GuzzleHttp\Client();

$response = $client->request('POST', 'https://api.paymongo.com/v1/checkout_sessions', [
  'body' => '{"data":{"attributes":{"send_email_receipt":false,"show_description":true,"show_line_items":true,"description":"D","line_items":[{"currency":"PHP","amount":44444,"description":"F","name":"33","quantity":44}],"payment_method_types":["gcash","paymaya"],"reference_number":"444sdfsd","cancel_url":"http://localhost/teaProj.%20E-Sip%20With%20API/index.php","success_url":"http://localhost/teaProj.%20E-Sip%20With%20API/index.php","success_redirect_url":"http://localhost/teaProj.%20E-Sip%20With%20API/index.php"}}}',
  'headers' => [
    'Content-Type' => 'application/json',
    'accept' => 'application/json',
    'authorization' => 'Basic c2tfdGVzdF92SkVlRWh6NExpUzJiRjk3d0piOGpqaUs6',
  ],
]);

$res = $response->getBody();


$payment_json = json_decode($res, true);

header("Location: " . $payment_json['data']['attributes']['checkout_url']);