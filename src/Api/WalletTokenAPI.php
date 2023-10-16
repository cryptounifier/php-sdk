<?php

namespace baselineincome\Api;

class WalletTokenAPI extends BaseAPI
{
    public function __construct(string $walletKey, string $secretKey, string $cryptoSymbol, string $tokenSymbol)
    {
        $headers = [
            'X-Wallet-Key' => $walletKey,
            'X-Secret-Key' => $secretKey,
        ];

        parent::__construct("wallet/{$cryptoSymbol}/token/{$tokenSymbol}", $headers);
    }

    public function getBalance()
    {
        return $this->executeRequest('GET', 'balance');
    }

    public function estimateFee(array $destinations, ?float $feePerByte = null, ?string $extraField = null)
    {
        return $this->executeRequest('POST', 'estimate-fee', [
            'destinations' => json_encode($destinations),
            'fee_per_byte' => $feePerByte,
            'extra_field'  => $extraField,
        ]);
    }

    public function sendTransaction(array $destinations, ?float $feePerByte = null, ?string $extraField = null)
    {
        return $this->executeRequest('POST', 'send-transaction', [
            'destinations' => json_encode($destinations),
            'fee_per_byte' => $feePerByte,
            'extra_field'  => $extraField,
        ]);
    }
}
