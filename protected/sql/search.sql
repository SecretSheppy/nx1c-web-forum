SELECT
    posts.postid, posts.title, posts.content, users.name, users.role
FROM
    posts, users
WHERE
    posts.userid = users.userid
ORDER BY
    posts.postid DESC