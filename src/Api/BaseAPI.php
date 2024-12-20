<?php

namespace CryptoUnifier\Api;

use GuzzleHttp\Client;

abstract class BaseAPI
{
    protected Client $client;

    protected string $apiKey;

    protected string $secretKey;

    protected string $suffix;

    protected array $headers;

    public function __construct(string $baseUrl, string $suffix, array $headers)
    {
        $this->suffix  = $suffix;
        $this->headers = $headers;

        $this->setBaseUrl($baseUrl);
    }

    public function setBaseUrl(string $baseUrl): void
    {
        $this->client = new Client([
            'base_uri' => $baseUrl,
            'headers'  => $this->headers,
        ]);
    }

    public function executeRequest(string $method, string $uri, array $body = [])
    {
        $options = array_filter([
            ($method === 'POST' ? 'form_params' : 'query') => $body,
        ]);

        return json_decode($this->client->request($method, $this->suffix.'/'.$uri, $options)->getBody());
    }
}
