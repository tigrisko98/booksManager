<?php require_once (ROOT . '/views/layouts/header.php');?>
<h2>Добавление комментария к книге <?php echo $book['title'];?></h2>
<form action="#" method="post">
    <label>Комментарий</label>
    <p>
    <textarea name="content" placeholder="Оставьте Ваш комментарий к книге"></textarea>
    </p><br>
    <input type="submit" name="submit">
</form>
