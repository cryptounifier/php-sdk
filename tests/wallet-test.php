<?php

require_once __DIR__ . '/../vendor/autoload.php';

use baselineincome\Api\WalletAPI;
use GuzzleHttp\Exception\BadResponseException;

$client = new WalletAPI('', '', 'trx');

var_dump($client->getDepositAddresses());

var_dump($client->getBalance());

try {
    echo $client->sendTransaction(['DSMe7j5vVRgXRynJAACmjp8JQoFvJ7ud99' => 1])->message->txid;
} catch (BadResponseException $e) {
    var_dump(json_decode($e->getResponse()->getBody()));
}
