<?php

namespace CryptoUnifier\Api;

class WalletAPI extends BaseAPI
{
    public function __construct(string $walletKey, string $secretKey, string $cryptocurrency)
    {
        $headers = [
            'X-Wallet-Key' => $walletKey,
            'X-Secret-Key' => $secretKey,
        ];

        parent::__construct("wallet/{$cryptocurrency}", $headers);
    }

    public function getBlockchainInfo()
    {
        return $this->executeRequest('GET', 'blockchain-info');
    }

    public function getDepositAddresses()
    {
        return $this->executeRequest('GET', 'deposit-addresses');
    }

    public function getBalance(?string $tokenIdentifier = null)
    {
        return $this->executeRequest('GET', 'balance', [
            'token_identifier' => $tokenIdentifier,
        ]);
    }

    public function validateAddresses(array $addresses)
    {
        return $this->executeRequest('POST', 'validate-addresses', [
            'addresses' => $addresses,
        ]);
    }

    public function estimateFee(array $destinations, ?float $feePerByte = null, ?string $extraField = null, ?string $tokenIdentifier = null, ?string $tokenDecimals = null)
    {
        return $this->executeRequest('POST', 'estimate-fee', [
            'destinations'    => $destinations,
            'feePerByte'      => $feePerByte,
            'extraField'      => $extraField,
            'tokenIdentifier' => $tokenIdentifier,
            'tokenDecimals'   => $tokenDecimals,
        ]);
    }

    public function sendTransaction(array $destinations, ?float $feePerByte = null, ?string $extraField = null, ?string $tokenIdentifier = null, ?string $tokenDecimals = null)
    {
        return $this->executeRequest('POST', 'send-transaction', [
            'destinations'    => $destinations,
            'feePerByte'      => $feePerByte,
            'extraField'      => $extraField,
            'tokenIdentifier' => $tokenIdentifier,
            'tokenDecimals'   => $tokenDecimals,
        ]);
    }
}
