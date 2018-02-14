<?php include 'inc/head.php' ?>

<div class="wrapper">
    <h1 class="title">Публичный блог</h1>
    <h2 class="slider-title">Популярное</h2>
    <div class="slider"><!-- slider block -->
        <?php foreach ($data['art_comments'] as $art_comment) : ?>
            <div class="slider-item"><!-- slider item -->
                <h3 class="author-name"><?=$art_comment['title'];?></h3>
                <em class="date-of-publish">Опубликовано: <?=$art_comment['date'];?></em><br>
                <em class="comments">Количество комментариев: <?=$art_comment['count_comments'];?></em>
                <p class="article">
                    <?=mb_strimwidth($art_comment['content'], 0, 100, '...');?>
                </p>
                <a href="/article?id=<?=$art_comment['id'];?>">Подробнее</a>
            </div><!--/ slider item -->
        <?php endforeach; ?>
    </div><!--/ slider block -->

    <h2 class="title-content">Все статьи блога</h2>
    <div class="content">
        <div class="blog-block"><!-- blog block -->
            <?php foreach ($data['articles'] as $article) : ?>
                <div class="blog-item"><!-- blog item -->
                    <h3 class="author-name"><?=$article['title'];?></h3>
                    <em class="date-of-publish">Опубликовано: <?=$article['date'];?></em><br>
                    <em class="comments">Количество комментариев: <?=$article['count_comments'];?></em>
                    <p class="article">
                        <?=mb_strimwidth($article['content'], 0, 100, '...');?>
                    </p>
                    <a href="/article?id=<?=$article['id'];?>">Подробнее</a>
                </div><!--/ blog item -->
            <?php endforeach; ?>
        </div><!--/ blog block -->

        <div class="form-block"><!-- form block -->
            <h2 class="form-title">Написать статью</h2>
            <form action="/" method="post">
                <p>Ваше имя</p>
                <input type="text" name="title" required>
                <p>Текст сатьи</p>
                <textarea name="content" id="" cols="30" rows="10" required></textarea>
                <input type="submit" name="publish_article" value="Опубликовать">
            </form>
        </div><!--/ form block -->
    </div>
</div>

<?php include 'inc/footer.php' ?>

