<?php
class file {
    //Функция получения файлов из БД
    /*
     * Получает информацию о файлах из БД и заносит их в стек
     * @param int: $count
     * returned object
     */
    public static function GetRecordDataBase ($count){
        //объект стека
        $lifo = new Lifo($count);
        
        $db = Db::getConnection();
        $sql = 'SELECT * FROM uploadfile';
        $result = $db->prepare($sql);
        //GO GO GO
        $result->execute();
        $newarr = $result->fetchAll(PDO::FETCH_ASSOC);
        //добавляем в наш стрек
        $lifo->addStack($newarr);
        return $lifo;
    }
    
    /*
     * Получает количество записей в базе данных
     */
    public static function GetCountDataBase(&$coultElem){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM uploadfile';
        $result = $db->prepare($sql);
        $result->execute();
        $count = $result->rowCount();//Кол-во записей
        $coultElem =  $count*3;
        return $result->rowCount();
    }
    /*
     * Сравнивает размер файла
     * @param int: $sizeFile
     * @param int: $limit_size
     */
    public static function EqualsSizeFile($SizeFile,$limit_size){
        if($SizeFile > $limit_size){
            return false;   
        }
        return true;
    }
    /*
     * Проверяет валидацию файла
     * @param string: $format
     * @param string array: $valid_format
     */
    public static function CheckValidFormat($format, $valid_format){
        if(!in_array($format, $valid_format)){
		return false;
        }
        return true;
    }
    /*
     * Перемещает файл в указанную директорию
     * @param string: $tmpFileName
     * @param string: $path_file
     * @param string: $rand_name
     * @param string: $format
     */
    public static function MoveFile($tmpFileName,$path_file,$rand_name,$format){
        if(!move_uploaded_file($tmpFileName, $path_file . $rand_name . ".$format")){
            return false;
        }
        return true;
    }
    /*
     * Записывает информацию о файле в БД
     * @param int : $userId
     * @param string: $rand_name
     */
    public static function WriteInfoFileInBd($userId,$rand_name){
        $db = Db::getConnection();
        //генерируем запрос
        $sql = 'INSERT INTO `uploadfile`(`file_id`, `url`, `user_id`) VALUES (NULL,:url,:userid)';
        //заносим в запрос в переменную
        $result = $db->prepare($sql);
        //биндим имя файла и ид для запроса
        $result->bindParam(':url', $rand_name, PDO::PARAM_STR);
        $result->bindParam(':userid', $userId, PDO::PARAM_INT);
        //выполняем, если нет то возвращаем true
        if(!$result->execute())
        {
            return false;
        }
        return true;
    }
}
?>