<?php

/**
 * replaces links in text with a <a> element
 * @param string $text
 * @return false|string
 */
function scan_and_replace_links($text) {
    return preg_replace('/(http[s]{0,1}\:\/\/\S{4,})\s{0,}/ims', '<a href="$1">$1</a> ', $text);
}

/**
 * prints a text paragraph in correctly formatted html
 * @param string $paragraph_content
 * @return string
 */
function print_paragraph($paragraph_content, $linkify) {

    $paragraphs = preg_split("/\r\n|\n|\r/", $paragraph_content);
    $current_text = "";

    for ($j = 0; $j < sizeof($paragraphs); $j++) {
        if ($paragraphs[$j] != "") {
            if ($linkify) {
                $current_text .= '<p>' . scan_and_replace_links($paragraphs[$j]) . '</p>';
            } else {
                $current_text .= '<p>' . $paragraphs[$j] . '</p>';
            }
            if ($j != sizeof($paragraphs) - 1) {
                $current_text .= '<br>';
            }
        }
    }

    return $current_text;
}

/**
 * recursively collects and formats replies into a string
 * @param mysqli $db
 * @param int|string $parent_id
 * @return string
 */
function print_reply($db, $parent_id) {

    $sql = "SELECT * FROM comments WHERE parentid = '$parent_id'";
    $replies = $db->query($sql);

    foreach($replies->fetch_accoc() as $reply) {
        $compiled_reply_html = '<div class="reply">
                <div class="reply-info">
                    <a href="nx1c.php?filter_by=user&user_id=0" id="admin">Username</a>
                    <a href="reply.php?post_id=0&comment_id=0">reply</a>
                </div>
                <div class="reply-text">
                    <p></p>
                </div>';
        $compiled_reply_html .= render_reply($reply->commentid);
        $compiled_reply_html .= '</div>';
    }

    return $compiled_reply_html;
}