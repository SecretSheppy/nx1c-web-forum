<?php

/**
 * @param mysqli $db - database connection
 * @param string $username - users name
 * @param string $password - users password
 * @param bool $redirect - redirect to home page
 * @return bool|void
 */
function user_login($db, $username, $password, $redirect) {

    $row = ($db->query("SELECT * FROM users WHERE name = '$username'"))->fetch_assoc();

    if ($row["password"] == $password) {

        $_SESSION["user"] = array(
            "id" => $row["userid"],
            "name" => $username,
            "password" => $password,
            "uiMode" => $row["uiMode"],
            "theme" => $row["theme"]
        );

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