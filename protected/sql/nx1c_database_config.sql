CREATE DATABASE nx1c;
USE nx1c;

CREATE TABLE Users
(
    UserId INT NOT NULL,
    UserName VARCHAR(255) NOT NULL,
    UserPassword VARCHAR(255) NOT NULL,
    UserUiMode INT(1) DEFAULT 0,
    UserTheme VARCHAR(255) DEFAULT '#45bbe7',
    UserSecurityToken VARCHAR(255) NOT NULL,
    UserRole VARCHAR(255) DEFAULT NULL,
    UserLikes INT DEFAULT 0,
    PRIMARY KEY (UserId)
);

CREATE TABLE Posts
(
    PostId INT NOT NULL,
    UserId INT NOT NULL,
    PostTitle VARCHAR(255) NOT NULL,
    PostContent VARCHAR(65000) NOT NULL,
    PostTags VARCHAR(255) DEFAULT NULL,
    PostLikes INT DEFAULT 0,
    PRIMARY KEY (PostId),
    FOREIGN KEY (UserId) REFERENCES Users(UserId)
);

CREATE TABLE Comments
(
    CommentId INT NOT NULL,
    PostId INT NOT NULL,
    UserId INT NOT NULL,
    CommentContent VARCHAR(5000) NOT NULL,
    ReplyToId INT DEFAULT NULL,
    PRIMARY KEY (CommentId),
    FOREIGN KEY (PostId) REFERENCES Posts(PostId),
    FOREIGN KEY (UserId) REFERENCES users(UserId)
);