<?php

class SiteController
{

    public function actionIndex()
    {
        // Список users public phonebook
        $users = User::getUsersList();


        // Подключаем вид
        require_once(ROOT . '/views/index.php');
        return true;
    }
}
