<?php require_once(ROOT . '/views/layouts/header.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <?php if (!empty($booksList)): ?>
                <table class="table">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Автор</th>
                        <th scope="col">Название</th>
                        <th scope="col">Год публикации</th>
                        <th scope="col">Дата создания</th>
                        <th scope="col"></th>
                    </tr>
                    <?php foreach ($booksList as $book): ?>
                        <tr>
                            <td><?php echo $book['id']; ?></td>
                            <td><?php echo $book['author_name']; ?></td>
                            <td><a href="/book/<?php echo $book['id']; ?>"><?php echo $book['title']; ?></td>
                            <td><?php echo $book['publication_year']; ?></td>
                            <td><?php echo $book['date']; ?></td>
                            <td><a href="/book/update/<?php echo $book['id']; ?>"
                                   class="btn btn-primary">Редактировать</a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Удалить</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Удаление книги</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <p>Вы уверены, что хотите удалить книгу «<?php echo $book['title'] ?>»?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                            <form action="/book/delete/<?php echo $book['id']; ?>" method="post">
                                <button type="submit" name="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once(ROOT . '/views/layouts/footer.php'); ?>
