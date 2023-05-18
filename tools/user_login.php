<?php

/**
 * finds a users account based on their username, checks if the password they entered is the same as the password stored
 * and then either sets the session user array or does nothing
 *
 * @param mysqli $db - database connection
 * @param string $username - users name
 * @param string $password - users password
 * @param bool $redirect - redirect to home page
 * @return bool|void
 */
function user_login($db, $username, $password, $redirect)
{

    $row = ($db->query("SELECT * FROM Users WHERE UserName = '$username'"))->fetch_assoc();

    if ($row["UserPassword"] == $password) {

        $_SESSION["user"] = array(
            "id" => $row["UserId"],
            "name" => $row["UserName"],
            "password" => $password,
            "uiMode" => $row["UserUiMode"],
            "theme" => $row["UserTheme"]
        );

        if ($redirect) {
            $db->close();
            header("Location: nx1c.php");
            exit();
        }

        return false;
    }
    else { return true; }
}