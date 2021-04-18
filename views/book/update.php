<?php require_once(ROOT . '/views/layouts/header.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Редактирование книги «<?php echo $book['title']; ?>»</h3>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="author_name" class="form-label">Автор</label>
                        <input type="text" name="author_name" class="form-control" id="author_name"
                               placeholder="Введите автора книги"
                               value="<?php echo $book['author_name']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Название</label>
                        <input type="text" name="title" class="form-control" id="title"
                               placeholder="Введите название книги"
                               value="<?php echo $book['title']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Изображение книги</label><br>
                        <img src="<?php echo Book::getImage($book['id']); ?>" width="200" alt=""><br><br>
                        <input type="file" name="image" class="form-control" id="image" placeholder="" value="">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary mb-3" value="Обновить данные">
                </form>
            </div>
        </div>
    </div>

<?php require_once(ROOT . '/views/layouts/footer.php'); ?>