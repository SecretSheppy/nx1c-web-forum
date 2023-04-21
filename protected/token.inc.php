<?php

function generateToken($chars, $length) {

    $token = "";

    for ($i = 0; $i < $length; $i++) {
        $char = $chars[rand(0,strlen($chars) - 1)];
        if (rand(0, 100) > 50) {
            $char = strtoupper($char);
        }
        $token .= $char;
    }

    return $token;

}