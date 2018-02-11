<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/slick.css">
    <link rel="stylesheet" href="/assets/css/slick-theme.css">
    <title>blog-v-jet</title>
</head>
<body>
<div class="wrapper">
    <h1 class="title">Публичный блог</h1>

    <h2 class="slider-title">Популярное</h2>
    <div class="slider"><!-- slider -->
        <?php foreach ($art_comments as $art_comment) : ?>
            <div class="slider-item"><!-- slider item -->
                <h3 class="author-name"><? echo $art_comment['title']; ?></h3>
                <em class="date-of-publish">Опубликовано: <? echo $art_comment['date']; ?></em><br>
                <em class="comments">Количество комментариев: <?php echo $art_comment['count_comments']; ?></em>
                <p class="article">
                    <? echo mb_strimwidth($art_comment['content'], 0, 100, '...'); ?>
                </p>
                <a href="article.php?id=<? echo $art_comment['id']; ?>">Подробнее</a>
            </div><!--/ slider item -->
        <?php endforeach; ?>
    </div><!--/ slider -->

    <h2 class="title-content">Все статьи блога</h2>
    <div class="content">
        <div class="blog-block"><!-- blog block -->
            <?php foreach ($articles as $article) : ?>
                <div class="blog-item"><!-- blog item -->
                    <h3 class="author-name"><? echo $article['title']; ?></h3>
                    <em class="date-of-publish">Опубликовано: <? echo $article['date']; ?></em><br>
                    <em class="comments">Количество комментариев: <?php echo get_count_comments($conn, $article['id']); ?></em>
                    <p class="article">
                        <? echo mb_strimwidth($article['content'], 0, 100, '...'); ?>
                    </p>
                    <a href="article.php?id=<? echo $article['id']; ?>">Подробнее</a>
                </div><!--/ blog item -->
            <?php endforeach; ?>
        </div><!--/ blog block -->

        <div class="form-block"><!-- form block -->
            <h2 class="form-title">Написать статью</h2>
            <form action="index.php" method="post">
                <p>Ваше имя</p>
                <input type="text" name="title" required>
                <p>Текст сатьи</p>
                <textarea name="content" id="" cols="30" rows="10" required></textarea>
                <input type="submit" name="publish_article" value="Опубликовать">
            </form>
        </div><!--/ form block -->
    </div>
</div>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="/assets/js/slick.min.js"></script>
<script src="/assets/js/main.js"></script>
</body>
</html>

