<?php


class Book
{
    private $db;

    public function __construct()
    {
        $this->db = Db::getConnection();
    }

    public function getBooksList()
    {

        $result = $this->db->query('SELECT * FROM `books` WHERE is_archived = 0');
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetchAll();

    }

    public function createBook($options)
    {

        $sql = 'INSERT INTO `books` '
            . '(author_name, title, is_archived, publication_year)'
            . 'VALUES '
            . '(:author_name, :title, 0, :publication_year)';

        $result = $this->db->prepare($sql);
        $result->bindParam(':author_name', $options['author_name'], PDO::PARAM_STR);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':publication_year', $options['publication_year'], PDO::PARAM_INT);


        if ($result->execute()) {
            return $this->db->lastInsertId();
        }
        return 0;

    }

    public function getBookById($id)
    {

        if ($id = intval($id)) {

            $result = $this->db->query('SELECT * FROM `books` WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }

    }

    public function updateBookById($id, $options)
    {

        $sql = 'UPDATE `books` SET author_name = :author_name, title = :title, publication_year = :publication_year WHERE id = :id';

        $result = $this->db->prepare($sql);
        $result->bindParam(':author_name', $options['author_name'], PDO::PARAM_STR);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':publication_year', $options['publication_year'], PDO::PARAM_INT);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();

    }

    public function deleteBookById($id)
    {
        $sql = 'UPDATE `books` SET is_archived = 1 WHERE id = :id';

        $result = $this->db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

    public function getImage($id)
    {
        $noImage = 'no-image.jpg';

        $path = '/upload/images/books/';
        $pathToBookImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToBookImage)) {
            return $pathToBookImage;
        }

        return $path . $noImage;
    }

    public static function updateViews($id)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE `books` SET views = views+1 WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();

    }
}