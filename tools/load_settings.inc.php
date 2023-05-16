<?php

if (!isset($_SESSION["nx1c-installation-settings"])) {
    $_SESSION["nx1c-installation-settings"] = simplexml_load_file("../about/nx1c.xml");
}