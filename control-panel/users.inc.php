<?php

include '../protected/db.inc.php';
include '../tools/SQLGen.php';
$sql = new SQLGen();
$sql->select("*")
    ->from("Users");
$result = $db->query($sql->get_statement());

echo <<< HTML
<h2>Users</h2>
<p>Manage system users</p>
<hr>
<table>
    <tr>
        <th>Username</th>
        <th>Role</th>
        <th>Update</th>
        <th>Remove</th>
    </tr>
HTML;

for ($i = 0; $i < $result->num_rows; $i++) {
    $row = $result->fetch_assoc();
    echo <<< HTML
    <tr>
        <form method="post" action="update_user_information.php" enctype="application/x-www-form-urlencoded">
            <input name="userid" type="hidden" value="{$row["UserId"]}" />
            <td><input name="username" placeholder="Username (required)" value="{$row["UserName"]}" required /></td>
            <td><input name="role" placeholder="No Role" value="{$row["UserRole"]}" /></td>
            <td><input type="submit" value="Save" /></td>
        </form>
        <form method="post" action="remove_user.php" enctype="application/x-www-form-urlencoded">
            <td>
                <input name="userid" type="hidden" value="{$row["UserId"]}" />
                <input type="submit" value="Remove" />
            </td>
        </form>
    </tr>
    HTML;
}

echo <<< HTML
</table>
HTML;
