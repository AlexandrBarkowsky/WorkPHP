Рабочие страницы:
<li>     /login/ => Страница авторизации
<li>     /download/ => Страница просмотра и загрузки файлов
***
<li>  models:
<li>    File.php => Модель для работы с файлами
<li>     Lifo.php => Сортировка LIFO(стек)
<li>     User.php => Модель работы с пользователем
***
<li> controllers:
<li> 	DownloadController.php => Контроллер download
<li> 	UserController.php => Контроллер user
***
<li>  config:
<li> 	db_params.php => Массив для подключение к БД
<li> 	routes.php => Массив возможных маршрутов
***
<li>  view:
<li> 	login.php => Представление для пользоваля(форма ввода пароля и логина)
<li> 	download.php => Представление для работы с файлами(загрузка и отображение)
***
<li>  components:
<li> 	AutoEXE.php => Подключение файлов(компонентов и моделей)
<li> 	Db.php => Подключение к БД
<li> 	Router.php => Файл маршрутизатор(роутер)
***
<li>  template => Папка с фалами css, js, font
<li>  upload => папка хранящая файлы загруженные пользователями 
<li>  workphp.sql => копия БД
***
<li> Время потраченное на разработку: 10 часов(Изучение MVC, PDO, Git).
