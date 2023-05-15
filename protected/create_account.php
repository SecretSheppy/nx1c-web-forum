<?php

include_once '../tools/SQLGen.php';

function create_account($db, $username, $password, $password_confirm, $token): void
{
    if ($password != $password_confirm) {
        header("Location: signup.php?error=Passwords+did+not+match!");
        exit();
    }
    $sql = new SQLGen();
    $sql->insert_into("users")
        ->fields(array(
            "name",
            "password",
            "securityToken"
        ))
        ->values(array(
            $username,
            $password,
            $token
        ));
    if ($db->query($sql->get_statement()) !== true) {
        header("Location: err.php");
        exit();
    }
}