<?php

namespace App\Services;


use Firebase\JWT\JWT;

class JwtService
{
    function generateToken($user) {
        $payload = [
            'id' => $user['id'],
            'name' => $user['username'],
            'exp' => time() + (60 * 60) // Token expiration time (1 hour)
        ];

        return JWT::encode($payload, '81481b2f00dc1868fa0bf9b35fc32a73eee12c61bca3757a26a29ba8802e33c2', 'HS256');
    }

    function validateToken($token) {
        try {
            $decoded = JWT::decode($token, SECRET_KEY, ['HS256']);
            return (array) $decoded;
        } catch (Exception $e) {
            return false;
        }
    }
}