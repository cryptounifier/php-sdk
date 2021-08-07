<?php

namespace CryptoUnifier\Api;

class MasterAPI extends BaseAPI
{
    public function __construct(string $masterKey, string $secretKey)
    {
        $headers = [
            'X-Master-Key' => $masterKey,
            'X-Secret-Key' => $secretKey,
        ];

        parent::__construct('master', $headers);
    }
}
