<?php


class SiteController
{
    public function actionIndex()
    {
        $booksList = [];
        $booksList = Book::getBooksList();

        require_once (ROOT . '/views/site/index.php');
        return true;
    }
}