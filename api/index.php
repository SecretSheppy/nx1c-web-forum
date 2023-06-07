<?php

include '../protected/db.inc.php';

/**
 * nx1c api
 *
 * request format (all data): https://www.example.com/api/?get_post_by_id=0&get_all_data&api_key=aabbccddeeffgghh....
 * request format (specific data): https://www.example.com/api/?get_post_by_id=0&get_poster&api_key=aabbccddeeffgghh....
 *
 * get variables:
 *
 * get_post_by_id=<post_id> => gets the post that corresponds to the id
 * get_all_data => returns all data from the post (poster, post text, comments)
 * get_poster => returns data about the poster
 * get_poster_id => returns the posters user id
 * get_post_content => returns the post text
 * get_post_replies => returns all the replies
 * get_post_replies_advanced => returns all the replies and replies poster id
 * get_user_by_id=<user_id> => returns all public data about the user
 * get_search_data=<search_data> => returns all posts relating to search
 * search_type_text => specifies that search type is text
 * search_type_tag => specifies that search type is tag
 * search_type_user => specifies that search type is user (searches by user id)
 * make_post_as_user=<user_id> => specifies user id to make post from (will only work if the user has enabled posts from the specifies api key)
 * set_post_title=<title_text> => specifies the post title
 * set_post_tags=<tags> => specifies the post tags
 * set_post_text=<post_text> => specifies the post text
 * api_key=<api_key> => (required) specifies the api key
 */

// header('Content-Type: application/json; charset=utf-8');

// https://stackoverflow.com/questions/4064444/returning-json-from-a-php-script
// reference link

$xml_data = simplexml_load_file("../about/nx1c.php");