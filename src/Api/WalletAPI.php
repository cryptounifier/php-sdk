<?php

namespace baselineincome\Api;

class WalletAPI extends BaseAPI
{
    public function __construct(string $walletKey, string $secretKey, string $cryptoSymbol)
    {
        $headers = [
            'X-Wallet-Key' => $walletKey,
            'X-Secret-Key' => $secretKey,
        ];

        parent::__construct("wallet/{$cryptoSymbol}", $headers);
    }

    public function getBlockchainInfo()
    {
        return $this->executeRequest('GET', 'blockchain-info');
    }

    public function getTransactionInfo(string $txid)
    {
        return $this->executeRequest('GET', 'transaction-info', [
            'txid' => $txid,
        ]);
    }

    public function getDepositAddresses()
    {
        return $this->executeRequest('GET', 'deposit-addresses');
    }

    public function getBalance()
    {
        return $this->executeRequest('GET', 'balance');
    }

    public function validateAddresses(array $addresses, ?bool $validateActivation = null)
    {
        return $this->executeRequest('POST', 'validate-addresses', [
            'addresses' => json_encode($addresses),
            'validate_activation' => $validateActivation,
        ]);
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
