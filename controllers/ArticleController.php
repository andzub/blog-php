<?php

class ArticleController extends Core
{
    public function index()
    {
        // instance of model
        $articles = new Articles();

        // post articles
        if (isset($_POST['publish_article'])) {
            if (!empty($_POST['title']) && !empty($_POST['content'])) {
                $articles->addArticle($_POST['title'], $_POST['content']);
                header("Location: /");
            }
        }

        // post comments
        if (isset($_POST['publish_comment'])) {
            if (!empty($_POST['article_id']) && !empty($_POST['name']) && !empty($_POST['comment'])) {
                $articles->addComment($_POST['article_id'], $_POST['name'], $_POST['comment']);
                header("Location: /");
            }
        }

        // get article
        $article = $articles->getArticle($_GET['id']);

        // get all comments
        $comments = $articles->allComments($_GET['id']);

        // get count comments
        $count_comments = $articles->getCountComments($_GET['id']);

        // data for view
        $data = array(
            'title' => $article['title'],
            'date' => $article['date'],
            'content' => $article['content'],
            'id' => $article['id'],
            'comments' => $comments,
            'count_comments' => $count_comments
        );

        // view content article
        return $this->view('article', $data);
    }
}