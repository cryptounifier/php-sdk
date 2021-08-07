<?php

namespace CryptoUnifier\Api;

class MerchantAPI extends BaseAPI
{
    public function __construct(string $merchantKey, string $secretKey)
    {
        $headers = [
            'X-Merchant-Key' => $merchantKey,
            'X-Secret-Key'   => $secretKey,
        ];

        parent::__construct('merchant', $headers);
    }

    public function invoiceInfo(string $invoiceHash)
    {
        return $this->executeRequest('GET', 'invoice-info', [
            'invoice_hash' => $invoiceHash,
        ]);
    }

    public function processInvoice(?string $invoiceHash = null)
    {
        return $this->executeRequest('POST', 'process-invoice', [
            'invoice_hash' => $invoiceHash,
        ]);
    }

    public function generateInvoiceAddress(string $invoiceHash, string $cryptocurrency)
    {
        return $this->executeRequest('POST', 'generate-invoice-address', [
            'invoice_hash'   => $invoiceHash,
            'cryptocurrency' => $cryptocurrency,
        ]);
    }

    public function createInvoice(array $cryptocurrencies, ?string $currency = null, ?float $targetValue = null, ?string $title = null, ?string $description = null)
    {
        return $this->executeRequest('POST', 'create-invoice', [
            'cryptocurrencies' => $cryptocurrencies,
            'currency'         => $currency,
            'target_value'     => $targetValue,
            'title'            => $title,
            'description'      => $description,
        ]);
    }

    public function estimateInvoicePrice(array $cryptocurrencies, ?string $currency = null, ?float $targetValue = null)
    {
        return $this->executeRequest('POST', 'estimate-invoice-price', [
            'cryptocurrencies' => $cryptocurrencies,
            'currency'         => $currency,
            'target_value'     => $targetValue,
        ]);
    }
}
