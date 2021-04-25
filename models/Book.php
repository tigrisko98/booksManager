<?php


class Book
{
    /**
     * @var PDO
     */
    private $db;

    /**
     * Book constructor.
     */
    public function __construct()
    {
        $this->db = Db::getConnection();
    }

    /**
     * @return array
     */
    public function getBooksList()
    {

        $result = $this->db->query('SELECT * FROM `books` WHERE is_archived = 0');
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetchAll();

    }

    /**
     * @param $options
     * @return int|string
     */
    public function createBook($options, $image_url)
    {

        $sql = 'INSERT INTO `books` '
            . '(author_name, title, is_archived, publication_year, image_url)'
            . 'VALUES '
            . '(:author_name, :title, 0, :publication_year, :image_url)';

        $result = $this->db->prepare($sql);
        $result->bindParam(':author_name', $options['author_name'], PDO::PARAM_STR);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':publication_year', $options['publication_year'], PDO::PARAM_INT);
        $result->bindParam(':image_url', $image_url, PDO::PARAM_STR);


        return $result->execute();

    }

    /**
     * @param $id
     * @return mixed
     */
    public function getBookById($id)
    {

        if ($id = intval($id)) {

            $result = $this->db->query('SELECT * FROM `books` WHERE id=' . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }

    }

    /**
     * @param $id
     * @param $options
     * @return bool
     */
    public function updateBookById($id, $options, $image_url)
    {

        $sql = 'UPDATE `books` SET 
                        author_name = :author_name, 
                        title = :title, 
                        publication_year = :publication_year, 
                        image_url = :image_url 
                        WHERE id = :id';

        $result = $this->db->prepare($sql);
        $result->bindParam(':author_name', $options['author_name'], PDO::PARAM_STR);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':publication_year', $options['publication_year'], PDO::PARAM_INT);
        $result->bindParam(':image_url', $image_url, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();

    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteBookById($id)
    {
        $sql = 'UPDATE `books` SET is_archived = 1 WHERE id = :id';

        $result = $this->db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

    public function uploadImage()
    {
        $noImage = "/upload/images/books/no-image.jpg";
        $image_url = "/upload/images/books/{$_FILES['image']['name']}";

        if (is_uploaded_file($_FILES['image']['tmp_name'])) {
            move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . $image_url);
        }

        if (!empty($_FILES['image']['name'])) {
            return $image_url;
        }

        return $noImage;

    }

    /**
     * @param $id
     */
    public function updateViews($id): void
    {
        $sql = 'UPDATE `books` SET views = views+1 WHERE id = :id';

        $result = $this->db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->execute();

    }
}