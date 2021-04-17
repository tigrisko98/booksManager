<?php require_once (ROOT . '/views/layouts/header.php');?>

<form action="#" method="post">
    <p>Вы уверены, что хотите удалить книгу <?php echo $book['title']?></p>
    <input type="submit" name="submit" value="Удалить">
</form>

<?php require_once (ROOT . '/views/layouts/footer.php');?>
