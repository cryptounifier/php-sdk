<?php

require_once __DIR__ . '/../vendor/autoload.php';

use CryptoUnifier\Api\WalletAPI;

$client = new WalletAPI('', '', 'doge');

var_dump($client->getDepositAddresses());

var_dump($client->getBalance());
