<?php

/**
 * replaces links in text with a <a> element
 * @param string $text
 * @return false|string
 */
function scan_and_replace_links($text)
{
    return preg_replace('/(http[s]{0,1}\:\/\/\S{4,})\s{0,}/ims', '<a href="$1">$1</a> ', $text);
}

/**
 * prints a text paragraph in correctly formatted html
 * @param string $paragraph_content
 * @return string
 */
function print_paragraph($paragraph_content, $linkify = false)
{

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