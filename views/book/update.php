<?php require_once (ROOT . '/views/layouts/header.php');?>
<h2>Редактирование книги <?php echo $book['title'];?></h2>
<form action="#" method="post">
    <label>Автор</label>
    <input type="text" name="author_name" placeholder="Введите автора книги" value="<?php echo $book['author_name'];?>"><br><br>
    <label>Название</label>
    <input type="text" name="title" placeholder="Введите название книги" value="<?php echo $book['title'];?>"><br><br>
    <input type="submit" name="submit" value="Обновить данные">
</form>
