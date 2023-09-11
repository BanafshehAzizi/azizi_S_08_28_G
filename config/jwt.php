<?php
require_once 'database.php';
require_once 'vendor/autoload.php';

use Firebase\JWT\JWT;

function generateToken($user) {
    $payload = [
        'id' => $user['id'],
        'name' => $user['name'],
        'email' => $user['email'],
        'exp' => time() + (60 * 60) // Token expiration time (1 hour)
    ];

    return JWT::encode($payload, SECRET_KEY);
}

function validateToken($token) {
    try {
        $decoded = JWT::decode($token, SECRET_KEY, ['HS256']);
        return (array) $decoded;
    } catch (Exception $e) {
        return false;
    }
}
?>