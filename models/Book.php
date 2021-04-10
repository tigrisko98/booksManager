<?php


class Book
{
    public static function getBooksList()
    {
        $db = Db::getConnection();
        $booksList = [];

        $result = $db->query('SELECT id, author_name, title, date FROM `books`');

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
    
}