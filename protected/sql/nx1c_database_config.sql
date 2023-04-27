-- Create nx1c database

CREATE DATABASE nx1c;
USE nx1c;

CREATE TABLE users
(
    userid INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    uiMode INT(1) DEFAULT 0,
    theme VARCHAR(255) DEFAULT '#45bbe7',
    securityToken VARCHAR(255) NOT NULL,
    PRIMARY KEY (userid)
);

CREATE TABLE posts
(
    postid INT NOT NULL,
    userid INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content VARCHAR(65000) NOT NULL,
    tags VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (postid),
    FOREIGN KEY (userid) REFERENCES users(userid)
);

CREATE TABLE comments
(
    commentid INT NOT NULL,
    postid INT NOT NULL,
    userid INT NOT NULL,
    content VARCHAR(5000) NOT NULL,
    replyto INT NOT NULL,
    PRIMARY KEY (commentid),
    FOREIGN KEY (postid) REFERENCES posts(postid),
    FOREIGN KEY (userid) REFERENCES users(userid)
);