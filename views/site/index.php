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
                        <th scope="col">Дата создания</th>
                        <th scope="col"></th>
                    </tr>
                    <?php foreach ($booksList as $book): ?>
                        <tr>
                            <td><?php echo $book['id']; ?></td>
                            <td><?php echo $book['author_name']; ?></a></td>
                            <td><a href="/book/<?php echo $book['id']; ?>"><?php echo $book['title']; ?></td>
                            <td><?php echo $book['date']; ?></td>
                            <td><a href="/book/update/<?php echo $book['id']; ?>"
                                   class="btn btn-primary">Редактировать</a>
                                <a href="/book/delete/<?php echo $book['id']; ?>" class="btn btn-danger">Удалить</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require_once(ROOT . '/views/layouts/footer.php'); ?>
