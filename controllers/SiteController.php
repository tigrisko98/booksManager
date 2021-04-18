<?php


class SiteController
{
    public function actionIndex()
    {
        $booksList = (new Book)->getBooksList();

        require_once(ROOT . '/views/site/index.php');
        return true;
    }

}