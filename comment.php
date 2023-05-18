<?php

session_start();

include 'tools/gate_keeper.php';
gate_keeper(1);

include 'protected/db.inc.php';
include 'tools/SQLGen.php';

$post_id = (int) filter_input(INPUT_POST, "postid", FILTER_DEFAULT);
$content = (string) filter_input(INPUT_POST, "content", FILTER_SANITIZE_ADD_SLASHES);
$user_id = $_SESSION["user"]["id"];
$sql = new SQLGen();
$sql->insert_into("Comments")
    ->fields(array(
        "PostId",
        "UserId",
        "CommentContent"
    ))
    ->values(array(
        $post_id,
        $user_id,
        $content
    ));
if ($db->query($sql->get_statement()) === true) {
    header("Location: post.php?postid=" . $_POST["postid"]);
} else {
    header ("Location: err.php");
}
$db->close();
exit();