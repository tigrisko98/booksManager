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
            header("Location: /");
        }

        require_once(ROOT . '/views/book/create.php');
        return true;
    }

    public function actionView($bookId)
    {
        $book = Book::getBookById($bookId);
        $commentsList = Comment::getCommentsListByBookId($bookId);

        require_once(ROOT . '/views/book/view.php');
        return true;
    }

    public function actionComment($bookId)
    {
        $book = Book::getBookById($bookId);

        if (isset($_POST['submit'])) {
            $content = $_POST['content'];
            $result = Comment::createComment($bookId, $content);
            header("Location: /book/$bookId");
        }

        require_once(ROOT . '/views/book/comment.php');
        return true;

    }
}