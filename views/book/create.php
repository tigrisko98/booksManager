<?php require_once (ROOT . '/views/layouts/header.php');?>
<h2>Добавление новой книги</h2>
<form action="#" method="post" enctype="multipart/form-data">
    <label>Автор</label>
    <input type="text" name="author_name" placeholder="Введите автора книги"><br><br>
    <label>Название</label>
    <input type="text" name="title" placeholder="Введите название книги"><br><br>
    <label>Изображение книги</label><br><br>
    <input type="file" name="image" placeholder="" value=""><br><br>
    <input type="submit" name="submit" value="Создать книгу">
</form>