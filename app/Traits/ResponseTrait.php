<?php

namespace App\Traits;


trait ResponseTrait
{
    public function showResponse($input)
    {
        $response = json_encode($input);
        header('Content-Type: application/json');
        echo $response;
    }
}