<?php

// get all articles
function all_articles($conn) {
    $sql = "SELECT id, title, content, date FROM articles ORDER BY date DESC";
    $result = $conn->query($sql);

    $articles = array();
    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }
    }
    return $articles;
}

// get one article
function get_article($conn, $id) {
    $sql = "SELECT id, title, content, date FROM articles WHERE id = $id";
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        $article = $result->fetch_assoc();
    }
    return $article;
}

// add one article
function add_article($conn, $title, $content) {
    $title = mysqli_real_escape_string($conn, htmlspecialchars(trim($title)));
    $content = mysqli_real_escape_string($conn, htmlspecialchars(trim($content)));

    $sql = "INSERT INTO articles (title, content, date) VALUES ('$title', '$content', NOW())";

    if($conn->query($sql) !== true) {
        die($conn->error);
    }

    return true;
}

// get all comments
function all_comments($conn, $id) {
    $sql = "SELECT id, article_id, name, comment FROM comments WHERE article_id = $id ORDER BY id DESC";
    $result = $conn->query($sql);

    $comments = array();
    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $comments[] = $row;
        }
    }
    return $comments;
}

// get count comments
function get_count_comments($conn, $id) {
    $sql = "SELECT article_id FROM comments WHERE article_id = $id";
    $result = $conn->query($sql);

    $comments = $result->num_rows;

    return $comments;
}

// get count most comments
function get_count_most_comments($conn) {
    $sql = "SELECT art.id, art.title, art.content, art.date, IFNULL(s.c,0) AS count_comments
            FROM articles art LEFT JOIN (SELECT article_id, COUNT(id) AS c  
            FROM comments GROUP BY article_id) s ON art.id = s.article_id ORDER BY c DESC LIMIT 5";
    $result = $conn->query($sql);

    $articles_comments = array();
    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $articles_comments[] = $row;
        }
    }

    return $articles_comments;
}

// add comment
function add_comment($conn, $article_id, $name, $comment) {
    $name = mysqli_real_escape_string($conn, htmlspecialchars(trim($name)));
    $comment = mysqli_real_escape_string($conn, htmlspecialchars(trim($comment)));

    $sql = "INSERT INTO comments (article_id, name, comment) VALUES ('$article_id', '$name', '$comment')";

    if($conn->query($sql) !== true) {
        die($conn->error);
    }

    return true;
}