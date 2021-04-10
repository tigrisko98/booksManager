<?php


class BookController
{
    public function actionCreate()
    {
        if (isset($_POST['submit'])) {
            $author_name = $_POST['author_name'];
            $title = $_POST['title'];
            var_dump($_POST);
            $result = Book::createBook($author_name, $title);
            var_dump($result);
//            header("Location: /");
        }

        require_once (ROOT . '/views/book/create.php');
        return true;
    }
}