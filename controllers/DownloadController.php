<?php
class DownloadController{
    function actionDown(){
         // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();
        // Получаем информацию о пользователе из таблицы 
        $user = User::getUserById($userId);
        //******************Table upload file***********///
        //LIFO
        $coultElem;//Количетсво элементов
        $count = File::GetCountDataBase(&$coultElem);//получение количество записей в таблиц
        $lifo = File::GetRecordDataBase($coultElem);//наши данные в стеке, return object 
        //*****************End Table upload file *********//
        //*****************UPLOAD FILE *******************//
        $path_file = ROOT . '/upload/';//Пусть хранения для файла
        
        $SizeFile = null;
        // ограничение размера файла
	$limit_size = 1*1024*1024; // 1 Mb
	// корректные форматы файлов
	$valid_format = array("jpeg", "jpg", "gif", "png");
	// массив ошибок
	$error_array = array();
	// путь до нового файла
	// имя нового файла
	$rand_name = md5(time() . mt_rand(0, 9999));
        
        if($_FILES){
            $SizeFile=$_FILES["upload_file"]["size"];//Получаем размер
            $tmpFileName = $_FILES["upload_file"]["tmp_name"];//Временное имя файла
            
            //сравниваем размеры
            if(!File::EqualsSizeFile($SizeFile,$limit_size)){
                $error_array[] = "Размер файла превышает допустимый!";
            }
            $format = end(explode(".", $_FILES["upload_file"]["name"]));//получаем формат файла
            //проверяем на расширение файла
            if(!File::CheckValidFormat($format, $valid_format)){
                $error_array[] = "Формат файла не допустимый!";
            }
            
            if(empty($error_array)){
                // проверяем загружен ли файл
                if(is_uploaded_file($tmpFileName)){
                   if(!File::MoveFile($tmpFileName,$path_file,$rand_name,$format)){
                       $error_array[] = "Неизвестная ошибка! Код ошибки 1";//если не перезаписало файл
                   } 
                   $newname = $rand_name .'.' . $format;//Новое название файла
                   if(!File::WriteInfoFileInBd($userId,$newname)){
                       $error_array[] = "Неизвестная ошибка!Код ошибки 2";//если проблема в запросе
                   }
                }
                else
                {
                    $error_array[] = "Ошибка загрузки!";
                }
            }			
	}
        $temp = '';//Переменная для работы со стреком(вывод названия + ссылка На скачивание)
        $dirDown = '/upload/';//Переменная хранящая путь к папке в которых находятся файлы пользователя
        require_once(ROOT . '/view/download.php');
        return true;
    }
}
?>
