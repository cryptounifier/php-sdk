<?php

namespace baselineincome\Api;

use GuzzleHttp\Client;

abstract class BaseAPI
{
    protected string $defaultUrl = 'https://cryptounifier.io/api/v1/';

    protected Client $client;

    protected string $apiKey;

    protected string $secretKey;

    protected string $suffix;

    protected array $headers;

    public function __construct(string $suffix, array $headers)
    {
        $this->suffix  = $suffix;
        $this->headers = $headers;

        $this->setApiUrl($this->defaultUrl);
    }

    public function setApiUrl(string $apiUrl): void
    {
        $this->client = new Client([
            'base_uri' => $apiUrl . $this->suffix . '/',
            'headers'  => $this->headers,
        ]);
    }

    public function executeRequest(string $method, string $uri, array $body = [])
    {
        $options = array_filter([
            ($method === 'POST' ? 'form_params' : 'query') => $body,
        ]);

        return json_decode($this->client->request($method, $uri, $options)->getBody());
    }
}
