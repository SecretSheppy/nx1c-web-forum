<?php

/**
 * generates a security token based on a set of characters and a given length
 *
 * @param string $chars - characters to use in security token
 * @param int $length - length of security token
 * @return string - security token
 */
function generate_security_token($chars, $length) {

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