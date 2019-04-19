<?php

class User
{

    public static function getUsersList()
    {
        $db = Db::getConnection();

        $result = $db->query(
            'SELECT usr.first_name, usr.last_name, usr.address, usr.city, usr.country,'
                . 'GROUP_CONCAT(num.number) AS numbers, '
                . 'GROUP_CONCAT(em.email) AS emails '
                . 'FROM phonebook.users AS usr '
                . 'LEFT JOIN phonebook.numbers AS num ON usr.id = num.user_id AND num.public_status=1 '
                . 'LEFT JOIN phonebook.emails AS em ON usr.id = em.user_id AND em.public_status=1 '
                . 'WHERE usr.public_status=1 GROUP BY usr.id;'
        );

        $i = 0;
        $userList = array();
        while ($row = $result->fetch()) {
            $userList[$i]['first_name'] = $row['first_name'];
            $userList[$i]['last_name'] = $row['last_name'];
            $userList[$i]['city'] = $row['city'];
            $userList[$i]['address'] = $row['address'];
            $userList[$i]['country'] = $row['country'];
            $userList[$i]['numbers'] = $row['numbers'];
            $userList[$i]['emails'] = $row['emails'];
            $i++;
        }
        return $userList;
    }


    public static function checkUserData($userName, $password)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE first_name= :userName AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':userName', $userName, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();

        if ($user) {
            return $user['id'];
        }
        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location: /");
    }

    public static function getUserById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }

    public static function getUserNumbersById($user_id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM numbers WHERE user_id = :user_id';

        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetchall();
    }

    public static function getUserEmailsById($user_id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM emails WHERE user_id = :user_id';


        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetchall();
    }

    public static function getCountriesList()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM countries');

        $countriesList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $countriesList[$i]['id'] = $row['id'];
            $countriesList[$i]['country'] = $row['country'];
            $i++;
        }
        return $countriesList;
    }
}
