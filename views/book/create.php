<?php require_once(ROOT . '/views/layouts/header.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Добавление новой книги</h3>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="author_name" class="form-label">Автор</label>
                        <input type="text" name="author_name" class="form-control" id="author_name"
                               placeholder="Введите автора книги">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Название</label>
                        <input type="text" name="title" class="form-control" id="title"
                               placeholder="Введите название книги">
                    </div>
                    <div class="mb-3">
                        <label for="publication_year" class="form-label">Год публикации</label>
                        <input type="text" name="publication_year" class="form-control" id="publication_year"
                               placeholder="Введите год публикации книги">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Изображение книги</label>
                        <input type="file" name="image" class="form-control" id="image" placeholder="" value="">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary mb-3" value="Создать книгу">
                </form>
            </div>
        </div>
    </div>
<?php require_once(ROOT . '/views/layouts/footer.php'); ?>