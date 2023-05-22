<?php

$language = (string) filter_input(INPUT_GET, "lang", FILTER_SANITIZE_ADD_SLASHES);
$user_name = (string) filter_input(INPUT_POST, "username", FILTER_SANITIZE_ADD_SLASHES);
$password = (string) filter_input(INPUT_POST, "password", FILTER_SANITIZE_ADD_SLASHES);

$database_server_name = "localhost";
$database_user_name = "root";
$database_password = "";
$database_name = "nx1c";

$error = null;

/**
 * redirect to a specified url
 * @param string $url
 * @return never
 */
function redirect(string $url): never
{
    header("Location: $url");
    exit();
}

if ($language == null) redirect("auth.php?lang=en");
if ($user_name != null && $password != null) {
    $database = new mysqli(
        $database_server_name,
        $database_user_name,
        $database_password,
        $database_name
    );
    if ($database->connect_error) $error = "Failed to connect";
    $returned_fields = $database->query("SELECT UserPassword FROM Users WHERE UserName = $user_name");
    if ($returned_fields->num_rows == 0) $error = "Account not found";
    if ($error == null && (($returned_fields)->fetch_assoc())["UserPassword"] === $password) redirect("activate.php?lang=$language");
}

if ($error == null) readfile("languages/login_$language.html");
if ($error != null) echo "Error: $error";