<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/style.css">
    <title>blog-v-jet</title>
</head>
<body>
<div class="wrapper">
    <h1 class="title">Автор статьи <? echo $article['title']; ?></h1>

    <div class="content">
        <div class="blog-block"><!-- blog block -->
            <div class="blog-item"><!-- blog item -->
                <em class="date-of-publish">Опубликовано: <? echo $article['date']; ?></em><br>
                <em class="comments">Количество комментариев: <?php echo $count_comments; ?></em>
                <p class="article">
                    <? echo $article['content']; ?>
                </p>
            </div><!--/ blog item -->
            <div class="comments-block"><!-- comments block -->
                <h3 class="comments-title">Комментарии</h3>
                <?php foreach ($comments as $comment) : ?>
                    <h4 class="name"><?php echo $comment['name']; ?></h4>
                    <p class="text"><?php echo $comment['comment']; ?></p>
                <?php endforeach; ?>
            </div><!--/ comments block -->
        </div><!--/ blog block -->

        <div class="form-block"><!-- form block -->

            <h2 class="form-title">Оставить комментарий</h2>
            <form action="../article.php" method="post"><!-- from comment -->
                <input type="hidden" name="article_id" value="<?php echo $article['id']; ?>">
                <p>Ваше имя</p>
                <input type="text" name="name" required>
                <p>Текст комментария</p>
                <textarea name="comment" id="" cols="30" rows="10" required></textarea>
                <input type="submit" name="publish_comment" value="Опубликовать">
            </form><!--/ form comment -->

            <h2 class="form-title">Написать статью</h2>
            <form action="../article.php" method="post"><!-- form article -->
                <p>Ваше имя</p>
                <input type="text" name="title" required>
                <p>Текст статьи</p>
                <textarea name="content" id="" cols="30" rows="10" required></textarea>
                <input type="submit" name="publish_article" value="Опубликовать">
            </form><!--/ form article -->

        </div><!--/ form block -->
    </div>

</div>
</body>
</html>

