<?php

namespace CryptoUnifier\Api;

class WalletAPI extends BaseAPI
{
    public function __construct(string $baseUrl, string $identifierKey, string $secretKey, string $symbol, string $network)
    {
        $headers = [
            'X-Identifier-Key' => $identifierKey,
            'X-Secret-Key'     => $secretKey,
        ];

        parent::__construct($baseUrl, "{$symbol}/{$network}", $headers);
    }

    public function getBlockchainStatus()
    {
        return $this->executeRequest('GET', 'blockchain-status');
    }

    public function getTransactionInfo(string $txid)
    {
        return $this->executeRequest('GET', 'transaction-info', [
            'txid' => $txid,
        ]);
    }

    public function generateAddresses()
    {
        return $this->executeRequest('GET', 'generate-addresses');
    }

    public function getBalance()
    {
        return $this->executeRequest('GET', 'balance');
    }

    public function validateAddresses(array $addresses, ?bool $validateActivation = null)
    {
        return $this->executeRequest('POST', 'validate-addresses', [
            'addresses'           => $addresses,
            'validate_activation' => $validateActivation,
        ]);
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
