<?php


class Book
{
    public static function getBooksList()
    {
        $db = Db::getConnection();
        $booksList = [];

        $result = $db->query('SELECT id, author_name, title, date FROM `book`');

        $i = 0;
        while ($row = $result->fetch()) {
            $booksList[$i]['id'] = $row['id'];
            $booksList[$i]['author_name'] = $row['author_name'];
            $booksList[$i]['title'] = $row['title'];
            $booksList[$i]['date'] = $row['date'];
            $i++;
        }

        return $booksList;

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
}