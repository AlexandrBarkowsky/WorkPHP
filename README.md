Рабочие страницы:
<li>     /login/ => Страница авторизации
<li>     /download/ => Страница просмотра и загрузки файлов
***
<li> <li> models:
<li>    File.php => Модель для работы с файлами
<li>     Lifo.php => Сортировка LIFO(стек)
<li>     User.php => Модель работы с пользователем
***
<li> <li> controllers:
<li> 	DownloadController.php => Контроллер download
<li> 	UserController.php => Контроллер user
***
<li> <li> config:
<li> 	db_params.php => Массив для подключение к БД
<li> 	routes.php => Массив возможных маршрутов
***
<li> <li> view
<li> 	login.php => Представление для пользоваля(форма ввода пароля и логина)
<li> 	download.php => Представление для работы с файлами(загрузка и отображение)
***
<li><li>  components:
<li> 	AutoEXE.php => Подключение файлов(компонентов и моделей)
<li> 	Db.php => Подключение к БД
<li> 	Router.php => Файл маршрутизатор(роутер)
***
<li> <li> template => Папка с фалами css, js, font
<li> <li> <li> upload => папка хранящая файлы загруженные пользователями 
<li> <li> workphp.sql => копия БД
***
<li> <li> Время потраченное на разработку: 10 часов(Изучение MVC, PDO, Git).
