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


        return $result->execute();

    }

    public static function getBookById($id)
    {
        $id = intval($id);

        if ($id) {
            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM `book` WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }

    }
}