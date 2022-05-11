<?

include("../../DB.php");

//Функции для добавления файла
function can_upload($file)
{
    // если имя пустое, значит файл не выбран
    if ($file['name'] == '')
        return 'Вы не выбрали файл.';

    /* если размер файла 0, значит его не пропустили настройки 
	сервера из-за того, что он слишком большой */
    if ($file['size'] == 0)
        return 'Файл слишком большой.';

    // разбиваем имя файла по точке и получаем массив
    $getMime = explode('.', $file['name']);
    // нас интересует последний элемент массива - расширение
    $mime = strtolower(end($getMime));
    // объявим массив допустимых расширений
    $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');

    // если расширение не входит в список допустимых - return
    if (!in_array($mime, $types))
        return 'Недопустимый тип файла.';

    return true;
}

function make_upload($file, $login)
{
    $getMime = explode('.', $file['name']);

    $mime = strtolower(end($getMime));

    // формируем уникальное имя картинки: случайное число и name
    if (file_exists("../../img/users_logo/" . $login)) {

        $imges = glob("../../img/users_logo/" . $login . "/*"); // get all file names
        foreach ($imges as $imge) { // iterate files
            if (is_file($imge))
                unlink($imge); // delete file
        }

        $name = mt_rand(0, 10000) . $login . "." . $mime /*. $file['name']*/;
        copy($file['tmp_name'], '../../img/users_logo/' . "$login/" . $name);
        add_user_avatar('img/users_logo/' . "$login/" . $name, $login);
    } else {

        $files = glob("../../img/users_logo/" . $login . "/*"); // get all file names
        foreach ($files as $file) { // iterate files
            if (is_file($file))
                unlink($file); // delete file
        }

        mkdir("../../img/users_logo/" . $login, 0700);
        $name = mt_rand(0, 10000) . $login . "." . $mime /*. $file['name']*/;
        copy($file['tmp_name'], '../../img/users_logo/' . "$login/" . $name);
        add_user_avatar('img/users_logo/' . "$login/" . $name, $login);
    }
}


//Другие функции
function change_login($new_login, $login)
{
    $result = check_logins($new_login);
    if ($result > 0) {
        echo "Такой логин уже существует. Придумайте новый.";
    } else {

        change_login_on_db($new_login, $login);


        echo "Логин был успешно изменён.";
    }
}



if (isset($_POST['new_login']) && isset($_POST['login'])) {
    $new_login = $_POST['new_login'];
    $login = $_POST['login'];

    change_login($new_login, $login);
}
if (isset($_POST['new_password']) && isset($_POST['password'])) {
    $new_password = $_POST['new_password'];
    $password = $_POST['password'];
    $login = $_POST['login'];
    $result = change_password_on_db($login, $new_password, $password);
    echo $result;
}

// если была произведена отправка формы
if (isset($_FILES['file'])) {
    // проверяем, можно ли загружать изображение
    $check = can_upload($_FILES['file']);
    if ($check === true) {
        // загружаем изображение на сервер
        make_upload($_FILES['file'], $_POST['login']);
        echo "<strong id='file_status' style='color: green'>Файл успешно загружен!</strong>";
    } else {
        // выводим сообщение об ошибке
        echo "<strong style='color: red'>*$check</strong>";
        $_FILES = array();
    }
}
