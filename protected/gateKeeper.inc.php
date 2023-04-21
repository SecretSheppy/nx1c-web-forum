<?php

if (!$_SESSION["captcha-completed"]) {
    header("Location: index.php");
    exit();
}