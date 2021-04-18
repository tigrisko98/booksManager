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

        $result = $this->db->query('SELECT * FROM `book`');
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetchAll();

    }

    public function createBook($author_name, $title)
    {

        $sql = 'INSERT INTO book '
            . '(author_name, title)'
            . 'VALUES '
            . '(:author_name, :title)';

        $result = $this->db->prepare($sql);
        $result->bindParam(':author_name', $author_name, PDO::PARAM_STR);
        $result->bindParam(':title', $title, PDO::PARAM_STR);


        if ($result->execute()) {
            return $this->db->lastInsertId();
        }
        return 0;

    }

    public function getBookById($id)
    {

        if ($id = intval($id)) {

            $result = $this->db->query('SELECT * FROM `book` WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }

    }

    public function updateBookById($id, $options)
    {

        $sql = 'UPDATE `book` SET author_name = :author_name, title = :title WHERE id = :id';

        $result = $this->db->prepare($sql);
        $result->bindParam(':author_name', $options['author_name'], PDO::PARAM_STR);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();

    }

    public function deleteBookById($id)
    {

        $sql = 'DELETE FROM `book` WHERE id = :id';

        $result = $this->db->prepare($sql);
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