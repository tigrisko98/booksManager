<?php require_once (ROOT . '/views/layouts/header.php');?>

<h2>Редактирование книги <?php echo $book['title'];?></h2>
<form action="#" method="post" enctype="multipart/form-data">
    <label>Автор</label>
    <input type="text" name="author_name" placeholder="Введите автора книги" value="<?php echo $book['author_name'];?>"><br><br>
    <label>Название</label>
    <input type="text" name="title" placeholder="Введите название книги" value="<?php echo $book['title'];?>"><br><br>
    <label>Изображение книги</label><br><br>
    <img src="<?php echo Book::getImage($book['id']);?>" width="200" alt=""><br><br>
    <input type="file" name="image" placeholder="" value=""><br><br>
    <input type="submit" name="submit" value="Обновить данные">
</form>

<?php require_once (ROOT . '/views/layouts/footer.php');?>