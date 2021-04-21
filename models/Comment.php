<?php


class Comment
{
    private $db;

    public function __construct()
    {
        $this->db = Db::getConnection();
    }

    public function createComment($bookId, $options)
    {

        $sql = 'INSERT INTO `comments` (book_id, content, rating) VALUES (:book_id, :content, :rating)';
        $result = $this->db->prepare($sql);

        $result->bindParam(':book_id', $bookId, PDO::PARAM_INT);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':rating', $options['rating'], PDO::PARAM_INT);

        return $result->execute();
    }

    public function getCommentsListByBookId($bookId)
    {
        $result = $this->db->query('SELECT * FROM `comments` WHERE book_id = ' . $bookId);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetchAll();
    }

    public function getAverageRating($bookId)
    {
        $sql = 'SELECT AVG(NULLIF(rating, 0)) AS average FROM `comments` WHERE book_id = :book_id';

        $result = $this->db->prepare($sql);
        $result->bindParam(':book_id', $bookId, PDO::PARAM_INT);
        $result->execute();

        return $result->fetchColumn();
    }
}