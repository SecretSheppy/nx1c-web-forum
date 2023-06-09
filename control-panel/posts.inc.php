<?php

include '../protected/db.inc.php';
include '../tools/SQLGen.php';
$sql = new SQLGen();
$sql->select("*")
    ->from("Users");
$result = $db->query($sql->get_statement());

$search_value = (string) filter_input(INPUT_GET, "search", FILTER_SANITIZE_ADD_SLASHES);

echo <<< HTML
<h2>Posts</h2>
<p>Manage system posts</p>
<hr>
<form>
    <input type="hidden" name="panel" value="posts" />
    <div class="label-wrapper">
        <label for="search">Search System Posts</label>
    </div>
    <input placeholder="Search..." name="search" id="search" value="{$search_value}" />
</form>
<hr>
HTML;