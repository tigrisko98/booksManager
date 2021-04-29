<?php


class BookController
{
    public function actionCreate()
    {
        $book = (new Book);
        $booksList = $book->getBooksList();
        if (isset($_POST['submit'])) {

            $image_url = $book->uploadImage();
            $book->createBook($_POST, $image_url);
            header("Location: /");

        }

        require_once(ROOT . '/views/book/create.php');
        return true;
    }

    public function actionView($bookId)
    {
        $book = new Book;
        $bookData = $book->getBookById($bookId);
        $book->updateViews($bookId);
        $comment = new Comment;
        $commentsList = $comment->getCommentsListByBookId($bookId);
        $averageRating = $comment->getAverageRating($bookId);


        if (isset($_POST['submit'])) {
            $result = (new Comment)->createComment($bookId, $_POST);
            header("Location: /book/$bookId");
        }

        require_once(ROOT . '/views/book/view.php');
        return true;
    }

    public function actionUpdate($id)
    {
        $book = (new Book);
        $bookData = $book->getBookById($id);

        if (isset($_POST['submit'])) {

            if (empty($_FILES['image']['name'])) {
                $image_url = $bookData['image_url'];
            } else {
                $image_url = $book->uploadImage();
            }

            $book->updateBookById($id, $_POST, $image_url);
            header("Location: /");

        }

        require_once(ROOT . '/views/book/update.php');
        return true;
    }

    public function actionDelete($id)
    {

        if (isset($_POST['submit'])) {
            $result = (new Book)->deleteBookById($id);
            echo $result;
            header("Location: /");
        }

        return true;
    }

}