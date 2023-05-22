<?php

$settings = $_SESSION["nx1c-installation-settings"];

echo '<div class="footer">';

foreach ($settings->footer->column as $column) {
    echo '<div class="element">';
    echo "<h3>$column->title</h3>";
    foreach ($column->link as $link) {
        echo "<a href='$link->href'>$link->display</a>";
    }
    echo "</div>";
}

echo '</div>';