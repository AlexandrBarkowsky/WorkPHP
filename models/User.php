<?php

class User
{
    /*
     * Проверяем существует ли пользователь с заданным Email и Password
     * @param string: $email
     * @param string: $password
     * @return mixed: integer user['id'] or false
     */
    //Проверяем существует ли пользователь с заданными $email и $passwor
    public static function checkUserData($email, $password)
    {
        //Создаем подключение
        $db = Db::getConnection();
        //генерируем запрос
        $sql = 'SELECT * FROM users WHERE mail = :email AND pass = :password';
        //заносим в запрос в переменную
        $result = $db->prepare($sql);
        //биндим почту и пароль
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        //выполняем
        $result->execute();

        $user = $result->fetch(); //извлекаем
        if ($user) {//проверяем
            return $user['id'];
        }

        return false;
    }
    /*
     * Запоминаем пользователя
     * @param int: $userId
     */
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    /*
     * Проверяем имя: не меньше, чем 8-мь символов
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 8) {
            return true;
        }
        return false;
    }
    /*
     * Проверяет email
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    /*
     * Проверяет зашел ли пользователь
     */
    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location: /login/");
    }
    /*
     * Получает ин-цию с БД через id
     * param int: $id
     * returns array user by id
     */
    public static function getUserById($id)
    {
        if ($id) {
            //создаем подключение
            $db = Db::getConnection();
            //делаем запрос
            $sql = 'SELECT * FROM users WHERE id = :id';
            
            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            // Указываем, что хотим получить данные в виде массива
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            
            return $result->fetch();
        }
    }
}
?>