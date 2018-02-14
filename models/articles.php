<?php

class Articles extends Database
{
    // get all articles
    public function allArticles()
    {
        $sql = "SELECT art.id, art.title, art.content, art.date, IFNULL(s.c,0) AS count_comments
                FROM articles art LEFT JOIN (SELECT article_id, COUNT(id) AS c  
                FROM comments GROUP BY article_id) s ON art.id = s.article_id ORDER BY art.date ASC";
        $result = $this->connect()->query($sql);
        $articles = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $articles[] = $row;
            }
        }
        return $articles;
    }

    // get one article
    public function getArticle($id)
    {
        $sql = "SELECT id, title, content, date FROM articles WHERE id = $id";
        $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) {
            $article = $result->fetch_assoc();
        }
        return $article;
    }

    // add article
    public function addArticle($title, $content)
    {
        $title = mysqli_real_escape_string($this->connect(), htmlspecialchars(trim($title)));
        $content = mysqli_real_escape_string($this->connect(), htmlspecialchars(trim($content)));
        $sql = "INSERT INTO articles (title, content, date) VALUES ('$title', '$content', NOW())";
        if ($this->connect()->query($sql) !== true) {
            die($this->connect()->error);
        }
        return true;
    }

    // get all comments
    public function allComments($id)
    {
        $sql = "SELECT id, article_id, name, comment FROM comments WHERE article_id = $id ORDER BY id DESC";
        $result = $this->connect()->query($sql);
        $comments = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $comments[] = $row;
            }
        }
        return $comments;
    }

    // get count comments
    public function getCountComments($id)
    {
        $sql = "SELECT article_id FROM comments WHERE article_id = $id";
        $result = $this->connect()->query($sql);
        $comments = $result->num_rows;
        return $comments;
    }

    // get count most comments
    public function getCountMostComments()
    {
        $sql = "SELECT art.id, art.title, art.content, art.date, IFNULL(s.c,0) AS count_comments
                FROM articles art LEFT JOIN (SELECT article_id, COUNT(id) AS c  
                FROM comments GROUP BY article_id) s ON art.id = s.article_id ORDER BY c DESC LIMIT 5";
        $result = $this->connect()->query($sql);
        $articles_comments = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $articles_comments[] = $row;
            }
        }
        return $articles_comments;
    }

    // add comment
    public function addComment($article_id, $name, $comment)
    {
        $name = mysqli_real_escape_string($this->connect(), htmlspecialchars(trim($name)));
        $comment = mysqli_real_escape_string($this->connect(), htmlspecialchars(trim($comment)));
        $sql = "INSERT INTO comments (article_id, name, comment) VALUES ('$article_id', '$name', '$comment')";
        if ($this->connect()->query($sql) !== true) {
            die($this->connect()->error);
        }
        return true;
    }
}