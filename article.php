<?php

require_once "config/database.php";
require_once "models/articles.php";

$conn = db_connect();

// post articles
if(isset($_POST['publish_article'])) {
    if(!empty($_POST['title']) && !empty($_POST['content'])) {
        add_article($conn, $_POST['title'], $_POST['content']);
        header("Location: index.php");
    }
}

// article
$article = get_article($conn, $_GET['id']);

// post comments
if(isset($_POST['publish_comment'])) {
    if(!empty($_POST['article_id']) && !empty($_POST['name']) && !empty($_POST['comment'])) {
        add_comment($conn, $_POST['article_id'], $_POST['name'], $_POST['comment']);
        header("Location: index.php");
    }
}

// comments
$comments = all_comments($conn, $_GET['id']);

// count comments
$count_comments = get_count_comments($conn, $_GET['id']);

include "views/article.php";