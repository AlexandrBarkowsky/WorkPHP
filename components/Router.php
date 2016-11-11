<?PHP
class Router
{
        private $router;
        //конструктор
        public function __construct()
        {
            $routesPath = ROOT.'/config/routes.php';//получаем маршруты из массив
            $this->router = include($routesPath);//сохраняем массив в свой-ве
        }
        /*
         * Получает URI адресс
         */
        private function getURI(){
            if(!empty($_SERVER['REQUEST_URI']))
            {
                return trim($_SERVER['REQUEST_URI'],'/');
            }
        }
        public function run()
        {
            //получаем адресс из адресной строки
            $uri = $this->getURI();

            foreach($this->router as $uriPattern => $path)
            {
                if( preg_match("~$uriPattern~",$uri) ){
                    $segments = explode('/',$path);//разделитель
                    //Генерируем контроллер
                    $controllerName = array_shift($segments).'Controller';
                    $controllerName = ucfirst($controllerName);
                    $actionName = 'action'.ucfirst(array_shift($segments));
                    $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                    if(file_exists($controllerFile)){
                        include_once ($controllerFile);
                    }
                    //Cоздаем объект класса контроллера
                    $controllerObject = new $controllerName;
                    $result=$controllerObject->$actionName();
                    if ($result != null){
                        break;
                    }
                }	
            }
        }

}
?>