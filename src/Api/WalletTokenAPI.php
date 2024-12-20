<?php

namespace CryptoUnifier\Api;

class WalletTokenAPI extends BaseAPI
{
    public function __construct(string $baseUrl, string $identifierKey, string $secretKey, string $symbol, string $network, string $tokenAddress)
    {
        $headers = [
            'X-Identifier-Key' => $identifierKey,
            'X-Secret-Key'     => $secretKey,
        ];

        parent::__construct($baseUrl, "{$symbol}/{$network}/token/{$tokenAddress}", $headers);
    }

    public function getBalance()
    {
        return $this->executeRequest('GET', 'balance');
    }

    public function estimateFee(array $destinations, ?int $feeRate = null, ?string $extraField = null)
    {
        return $this->executeRequest('POST', 'estimate-fee', [
            'destinations' => $destinations,
            'fee_rate'     => $feeRate,
            'extra_field'  => $extraField,
        ]);
    }

    public function sendTransaction(array $destinations, ?int $feeRate = null, ?string $extraField = null)
    {
        return $this->executeRequest('POST', 'send-transaction', [
            'destinations' => $destinations,
            'fee_rate'     => $feeRate,
            'extra_field'  => $extraField,
        ]);
    }
}
