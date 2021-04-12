<?php require_once (ROOT . '/views/layouts/header.php');?>
<div>
    <h2><?php echo $book['title']; ?></h2>
    <p>Автор книги: <?php echo $book['author_name']; ?></p>
    <a href="/book/comment/<?php echo $book['id']; ?>">Оставить комментарий</a>
    <h3>Комментарии:</h3>
    <?php if (!empty($commentsList)): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Комментарий</th>
                <th>Дата</th>
            </tr>
            <?php foreach ($commentsList as $comment): ?>
                <tr>
                    <td><?php echo $comment['id']; ?></td>
                    <td><?php echo $comment['content']; ?></td>
                    <td><?php echo $comment['date']; ?></td>
                </tr>
            <?php endforeach; ?>

        </table>
    <?php else: ?>
    <p>К этой книге ещё никто не оставлял комментарии. Вы можете стать первым!</p>
    <?php endif;?>

</div>
