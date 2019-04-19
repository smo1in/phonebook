<?php

class ContactController
{
    public function actionLogin()
    {
        // Переменные для формы
        $userName = false;
        $password = false;

        // Обработка формы

        $post = filter_input_array(INPUT_POST);

        if (isset($post['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $userName = $post['userName'];
            $password = $post['password'];

            // Флаг ошибок
            $errors = false;

            // Проверяем существует ли пользователь
            $userId = User::checkUserData($userName, $password);

            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);

                // Перенаправляем пользователя 
                header("Location: /contact/index");
            }
        }
        // Подключаем вид
        require_once(ROOT . '/views/index.php');
        return true;
    }

    public function actionIndex()
    {
        // Список users public phonebook
        $users = User::getUsersList();

        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);
        $userNumbers = User::getUserNumbersById($userId);
        $userEmails = User::getUserEmailsById($userId);
        $countriesList = User::getCountriesList();

        // Подключаем вид
        require_once(ROOT . '/views/contact.php');
        return true;
    }
}
