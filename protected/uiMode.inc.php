<?php

if ($_SESSION["user"]["uiMode"] == 1) {
    echo '<link rel="stylesheet" href="resources/css/main.dark.css">';
}

if ($_SESSION["user"]["theme"] != "") {
    echo '<style>:root{--theme-bgcolor: ' . $_SESSION["user"]["theme"] . ';}</style>';
}