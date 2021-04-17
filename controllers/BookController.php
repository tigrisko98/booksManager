<?php


class BookController
{
    public function actionCreate()
    {
        if (isset($_POST['submit'])) {
            $author_name = $_POST['author_name'];
            $title = $_POST['title'];
            $id = Book::createBook($author_name, $title);
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/books/{$id}.jpg");
            }

            header("Location: /");
        }

        require_once(ROOT . '/views/book/create.php');
        return true;
    }

    public function actionView($bookId)
    {
        $book = Book::getBookById($bookId);
        $commentsList = Comment::getCommentsListByBookId($bookId);

        if (isset($_POST['submit'])) {
            $content = $_POST['content'];
            $result = Comment::createComment($bookId, $content);
            header("Location: /book/$bookId");
        }

        require_once(ROOT . '/views/book/view.php');
        return true;
    }

    public function actionUpdate($id)
    {
        $book = Book::getBookById($id);

        if (isset($_POST['submit'])) {
            $options['author_name'] = $_POST['author_name'];
            $options['title'] = $_POST['title'];

            $result = Book::updateBookById($id, $options);
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/books/{$id}.jpg");
            }

            header("Location: /");
        }

        require_once(ROOT . '/views/book/update.php');
        return true;
    }

    public function actionDelete($id)
    {
        $book = Book::getBookById($id);

        if (isset($_POST['submit'])) {
            $result = Book::deleteBookById($id);
            header("Location: /");
        }
        require_once(ROOT . '/views/book/delete.php');
        return true;
    }

}