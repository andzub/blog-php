<?php include 'inc/head.php' ?>

<div class="wrapper">
    <h1 class="title">Автор статьи <?=$data['title'];?></h1>
    <div class="content">
        <div class="blog-block"><!-- blog block -->
            <div class="blog-item"><!-- blog item -->
                <em class="date-of-publish">Опубликовано: <?=$data['date'];?></em><br>
                <em class="comments">Количество комментариев: <?=$data['count_comments'];?></em>
                <p class="article">
                    <?=$data['content'];?>
                </p>
            </div><!--/ blog item -->

            <div class="comments-block"><!-- comments block -->
                <h3 class="comments-title">Комментарии</h3>
                <?php foreach ($data['comments'] as $comment) : ?>
                    <h4 class="name"><?=$comment['name'];?></h4>
                    <p class="text"><?=$comment['comment'];?></p>
                <?php endforeach; ?>
            </div><!--/ comments block -->
        </div><!--/ blog block -->

        <div class="form-block"><!-- form block -->
            <h2 class="form-title">Оставить комментарий</h2>
            <form action="/article" method="post"><!-- from comment -->
                <input type="hidden" name="article_id" value="<?=$data['id'];?>">
                <p>Ваше имя</p>
                <input type="text" name="name" required>
                <p>Текст комментария</p>
                <textarea name="comment" cols="30" rows="10" required></textarea>
                <input type="submit" name="publish_comment" value="Опубликовать">
            </form><!--/ form comment -->

            <h2 class="form-title">Написать статью</h2>
            <form action="/article" method="post"><!-- form article -->
                <p>Ваше имя</p>
                <input type="text" name="title" required>
                <p>Текст статьи</p>
                <textarea name="content" cols="30" rows="10" required></textarea>
                <input type="submit" name="publish_article" value="Опубликовать">
            </form><!--/ form article -->
        </div><!--/ form block -->
    </div>
</div>

<?php include 'inc/footer.php' ?>

