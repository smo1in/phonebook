<?php

class Update
{

public static function updateTable($array, $tableName, $columnName)
{
    $db = Db::getConnection();
    $sql = 'UPDATE ' . $tableName . ' SET ' . $columnName . ' = :value WHERE ' . $tableName . '.id = :key';
    foreach ($array as $key => $value) {

        $result = $db->prepare($sql);
        $result->bindParam(':key', $key, PDO::PARAM_INT);
        $result->bindParam(':value', $value, PDO::PARAM_STR);
        $result->execute();
    }
}

public static function updatePublicStatus($array, $tableName, $columnName)
{

    $db = Db::getConnection();
    $sql = 'UPDATE ' . $tableName . ' SET ' . $columnName . ' = :value WHERE ' . $tableName . '.id = :key';

    foreach ($array as $key => $value) {
        $result = $db->prepare($sql);
        $result->bindParam(':key', $key, PDO::PARAM_INT);
        $result->bindParam(':value', $value, PDO::PARAM_BOOL);
        $result->execute();
    }
}

public static function createNewId($value, $tableName, $columnName,$public_status, $userId)
{
    $db = Db::getConnection();
    $sql = 'INSERT INTO ' . $tableName . '(' . $columnName . ',public_status, user_id) VALUES (:value, :public_status, :userId)';
    $result = $db->prepare($sql);
    $result->bindParam(':value', $value, PDO::PARAM_STR);
    $result->bindParam(':public_status', $public_status, PDO::PARAM_BOOL);
    $result->bindParam(':userId', $userId, PDO::PARAM_INT);
    $result->execute();
}

public static function updateUser($value, $columnName, $userId)
{
    $db = Db::getConnection();
    $sql = 'UPDATE users SET ' . $columnName . ' = :value WHERE  id = :userId';
    $result = $db->prepare($sql);
    $result->bindParam(':userId', $userId, PDO::PARAM_INT);
    $result->bindParam(':value', $value, PDO::PARAM_STR);
    $result->execute();
}
}
