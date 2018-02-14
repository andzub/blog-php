<?php

class MainController extends Core
{
    public function index() {

        // instance of model
        $articles = new Articles();

        // check data from articles
        if(isset($_POST['publish_article'])) {
            if(!empty($_POST['title']) && !empty($_POST['content'])) {
                $articles->addArticle($_POST['title'], $_POST['content']);
                header("Location: /");
            }
        }

        // call function all articles
        $all_articles = $articles->allArticles();
        // call function most comments
        $art_comments = $articles->getCountMostComments();
        // data for view
        $data = array(
            'articles' => $all_articles,
            'art_comments' => $art_comments,
        );

        // view content articles
        return $this->view('main', $data);
    }
}