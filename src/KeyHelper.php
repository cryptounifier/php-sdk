<?php

namespace CryptoUnifier;

class KeyHelper
{
    public static function encode(string $seed, string $decoderKey): string
    {
        $iv      = random_bytes(16);
        $encoded = openssl_encrypt($seed, 'aes-256-cbc', hex2bin($decoderKey), OPENSSL_RAW_DATA, $iv);

        return base64_encode(bin2hex($iv) . ':' . bin2hex($encoded));
    }
}