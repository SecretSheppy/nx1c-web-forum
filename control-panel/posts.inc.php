<?php

include '../protected/db.inc.php';
include '../tools/SQLGen.php';
$sql = new SQLGen();

$search_value = (string) filter_input(INPUT_GET, "search", FILTER_SANITIZE_ADD_SLASHES);
$view_post_id = (int) filter_input(INPUT_GET, "post-id", FILTER_VALIDATE_INT);

if ($search_value == null && $view_post_id == null) {
    $sql->select("PostId, PostTitle")
        ->from("Posts");
}

if ($search_value != null) {
    $sql->select("PostId, PostTitle")
        ->from("Posts")
        ->where("PostTitle LIKE '%$search_value%'");
}

if ($view_post_id != null) {
    $sql->select("*")
        ->from("Posts")
        ->where("PostId = $view_post_id");
}

$result = $db->query($sql->get_statement());

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
<table>
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Open</th>
        <th>Remove</th>
    </tr>
HTML;

for ($i = 0; $i < $result->num_rows; $i++) {
    $row = $result->fetch_assoc();
    echo <<< HTML
    <tr>
        <form>
            <input type="hidden" name="panel" value="posts" />
            <td><input name="post-id" value="{$row["PostId"]}" readonly /></td>
            <td><input value="{$row["PostTitle"]}" readonly /></td>
            <td><input type="submit" value="Open" /></td>
        </form>
        <form method="post" action="remove_user.php" enctype="application/x-www-form-urlencoded">
            <td>
                <input name="userid" type="hidden" value="{$row["PostId"]}" />
                <input type="submit" value="Remove" />
            </td>
        </form>
    </tr>
    HTML;
}

echo <<< HTML
</table>
HTML;
