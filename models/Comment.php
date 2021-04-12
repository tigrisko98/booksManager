<?php


class Comment
{
    public static function createComment($bookId, $content)
    {
        $db = Db::getConnection();


        $sql = 'INSERT INTO `comment` (book_id, content) VALUES (:book_id, :content)';
        $result = $db->prepare($sql);

        $result->bindParam(':book_id', $bookId, PDO::PARAM_INT);
        $result->bindParam(':content', $content, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function getCommentsListByBookId($bookId)
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM `comment` WHERE book_id = ' . $bookId);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetchAll();
    }
}