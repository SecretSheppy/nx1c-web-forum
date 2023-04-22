<?php

if (!isset($_SESSION["user"])) {
    header("Location: nx1c.php");
    exit();
}