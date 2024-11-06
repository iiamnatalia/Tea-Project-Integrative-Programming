<?php
require_once('vendor/autoload.php');

$client = new \GuzzleHttp\Client();

$response = $client->request('GET', 'https://api.paymongo.com/v1/checkout_sessions/cs_SwixRnGYVYcSUgQS32U12B3L', [
  'headers' => [
    'accept' => 'application/json',
    'authorization' => 'Basic c2tfdGVzdF92SkVlRWh6NExpUzJiRjk3d0piOGpqaUs6',
  ],
]);

echo $response->getBody();