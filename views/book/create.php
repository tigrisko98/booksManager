<?php require_once (ROOT . '/views/layouts/header.php');?>
<h2>Добавление новой книги</h2>
<form action="#" method="post">
    <label>Автор</label>
    <input type="text" name="author_name" placeholder="Введите автора книги"><br><br>
    <label>Название</label>
    <input type="text" name="title" placeholder="Введите название книги"><br><br>
    <input type="submit" name="submit" value="Создать книгу">
</form>