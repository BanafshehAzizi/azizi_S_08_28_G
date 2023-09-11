php
<?php
// jwt.php

//require_once 'database.php';

use \Firebase\JWT\JWT;

function jwtAuth($handler) {
    // Get the JWT from the request headers
    $headers = apache_request_headers();
    if (empty($headers['Authorization'])) {
        return false;
    }

    $jwt = $headers['Authorization'];
    try {
        $headers1 = array('HS256');
        $decoded = JWT::decode($jwt, '81481b2f00dc1868fa0bf9b35fc32a73eee12c61bca3757a26a29ba8802e33c2', $headers1);
        return true;
    } catch (Exception $e) {
        return false;
        // Invalid JWT
        http_response_code(401);
        echo json_encode(array('message' => 'Access denied.'));
    }
}