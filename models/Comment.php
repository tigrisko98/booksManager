<?php


class Comment
{
    private $db;

    public function __construct()
    {
        $this->db = Db::getConnection();
    }

    public function createComment($bookId, $content)
    {

        $sql = 'INSERT INTO `comment` (book_id, content) VALUES (:book_id, :content)';
        $result = $this->db->prepare($sql);

        $result->bindParam(':book_id', $bookId, PDO::PARAM_INT);
        $result->bindParam(':content', $content, PDO::PARAM_STR);

        return $result->execute();
    }

    public function getCommentsListByBookId($bookId)
    {
        $result = $this->db->query('SELECT * FROM `comment` WHERE book_id = ' . $bookId);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetchAll();
    }
}