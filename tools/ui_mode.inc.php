<?php

// changes the theme based on the session user array

if ($_SESSION["user"]["uiMode"] == 1) {
    echo '<link rel="stylesheet" href="resources/css/main.dark.css">';
}

if ($_SESSION["user"]["theme"] != "") {
    echo '<style>:root{--theme-bgcolor: ' . $_SESSION["user"]["theme"] . ';}</style>';
}