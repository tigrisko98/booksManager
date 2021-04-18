<?php


class Book
{
    public static function getBooksList()
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM `book`');
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetchAll();

    }

    public static function createBook($author_name, $title)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO book '
            . '(author_name, title)'
            . 'VALUES '
            . '(:author_name, :title)';

        $result = $db->prepare($sql);
        $result->bindParam(':author_name', $author_name, PDO::PARAM_STR);
        $result->bindParam(':title', $title, PDO::PARAM_STR);


        if ($result->execute()) {
            return $db->lastInsertId();
        }
        return 0;

    }

    public static function getBookById($id)
    {

        if ($id = intval($id)) {
            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM `book` WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }

    }

    public static function updateBookById($id, $options)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE `book` SET author_name = :author_name, title = :title WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':author_name', $options['author_name'], PDO::PARAM_STR);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();

    }

    public static function deleteBookById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM `book` WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function getImage($id)
    {
        $noImage = 'no-image.jpg';

        $path = '/upload/images/books/';
        $pathToBookImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToBookImage)){
            return $pathToBookImage;
        }

        return $path . $noImage;
    }

}