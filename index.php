<?php

require_once "config/database.php";
require_once "models/articles.php";

// call function connect db
$conn = db_connect();

// check data from form articles
if(isset($_POST['publish_article'])) {
    if(!empty($_POST['title']) && !empty($_POST['content'])) {
        add_article($conn, $_POST['title'], $_POST['content']);
        header("Location: index.php");
    }
}
// call function all articles
$articles = all_articles($conn);
// call function most comments
$art_comments = get_count_most_comments($conn);

// view content articles
include "views/articles.php";
