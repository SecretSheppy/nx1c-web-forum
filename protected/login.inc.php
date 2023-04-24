<?php

function login($db, $username, $password, $redirect) {
    $result = $db->query("SELECT * FROM users WHERE name = '$username'");
    $row = $result->fetch_assoc();

    if ($row["password"] == $password) {
        $_SESSION["user"] = array("id"=>$row["id"], "name"=>$username, "password"=>$password, "uiMode"=>$row["uiMode"], "theme"=>$row["theme"]);
        if ($redirect) {
            $db->close();
            header("Location: nx1c.php");
            exit();
        }
        return false;
    } else {
        return true;
    }
}