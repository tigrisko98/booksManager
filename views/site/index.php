<div>
    <a href="/book/create">Добавить книгу</a>
</div>
<?php if (!empty($booksList)):?>
<table>
    <tr>
        <th>ID</th>
        <th>Автор</th>
        <th>Название</th>
        <th>Дата создания</th>
    </tr>
    <?php foreach ($booksList as $book):?>
    <tr>
        <td><?php echo $book['id'];?></td>
        <td><?php echo $book['author_name'];?></a></td>
        <td><a href="/book/<?php echo $book['id'];?>"><?php echo $book['title'];?></td>
        <td><?php echo $book['date'];?></td>
        <td><a href="/book/update/<?php echo $book['id'];?>">Редактировать</a></td>
        <td><a href="/book/delete/<?php echo $book['id'];?>">Удалить</a></td>
    </tr>
    <?php endforeach;?>
</table>
<?php endif;?>