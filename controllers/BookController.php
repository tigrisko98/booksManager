<?php


class BookController
{
    public function actionCreate()
    {
        $book = (new Book);
        $booksList = $book->getBooksList();
        if (isset($_POST['submit'])) {

            if (is_uploaded_file($_FILES['image']['tmp_name'])) {
                move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/books/{$_FILES['image']['name']}");
            }
            if (!empty($_FILES['image']['name'])) {
                $image_url = "/upload/images/books/{$_FILES['image']['name']}";
            } else {
                $image_url = "/upload/images/books/no-image.jpg";
            }
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
        $book = (new Book)->getBookById($id);

        if (isset($_POST['submit'])) {
            $options['author_name'] = $_POST['author_name'];
            $options['title'] = $_POST['title'];

            $result = (new Book)->updateBookById($id, $options);
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

        if (isset($_POST['submit'])) {
            $result = (new Book)->deleteBookById($id);
            echo $result;
            header("Location: /");
        }

        return true;
    }

}