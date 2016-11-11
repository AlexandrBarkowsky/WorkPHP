<?PHP
    //Общие настройки
    ini_set('display_errors',1);//отображение ошибок
    error_reporting(E_ALL);
    
    session_start();//запускаем сессию
    //Подключение файлов сис-мы
    define('ROOT', dirname(__FILE__));//константа имя файда
    include_once (ROOT.'/components/AutoEXE.php');
    //объект Router
    $router = new Router();
    $router->run();
?>