<?php
$dbhost = "192.168.0.148";
$dbname = "gamenews_db";
$username = "admin";
$password = "";


$db = new PDO("mysql:host=$dbhost;dbname=$dbname", $username, $password);
//Получение всех статей по лимиту
function get_singles_all($limit)
{
    global $db;
    $singles = $db->query("SELECT * FROM `articles` ORDER BY `pubdate` DESC LIMIT " . $limit);
    return $singles;
}

//Получение всех статей по лимиту 20, кроме 2 последних
function get_singles_minus_last_two()
{
    global $db;
    $singles_minus_last_two = $db->query("SELECT * FROM `articles` WHERE `id` not in (select max(`id`) from `articles`) and `id` not in (select max(`id`-1) from `articles`) ORDER BY `pubdate` DESC LIMIT 0,18");
    return $singles_minus_last_two;
}

//Получение 2 последних статей
function get_FirstTwoSingles()
{
    global $db; //область видимости
    $FirstTwoSingles = $db->query("SELECT * FROM `articles` WHERE `id` = (SELECT MAX(`id`) FROM `articles`) OR `id` = (SELECT MAX(`id` - 1) FROM `articles`)  ORDER BY `pubdate` DESC");
    return $FirstTwoSingles;
}

//Получение статьи по id  
function get_singele_by_id($id)
{
    global $db;
    $articles = $db->query("SELECT * FROM `articles` WHERE `id` = $id");
    if (is_array($articles) || is_object($articles)) {
        foreach ($articles as $article) {
            return $article;
        }
    }
}

//Получение игры по её ID
function get_games_by_id($id)
{
    global $db;
    $games = $db->query("SELECT * FROM `games` WHERE `id` = $id");
    if (is_array($games) || is_object($games)) {
        foreach ($games as $game) {
            return $game;
        }
    }
}
//Увеличение кол-ва просмотров статьи по id

function views_update($id)
{
    global $db;
    $views_update = $db->query("UPDATE `articles` SET `views` = `views` + 1 WHERE `id` = $id");
    return $views_update;
}

//Получение всех игр 
function get_games_all()
{
    global $db;
    $games_all = $db->query("SELECT * FROM `games`");
    return $games_all;
}
//Получение всех статей для слайдера 
function get_singeles_for_slider()
{
    global $db;
    $singeles_for_slider = $db->query("SELECT * FROM `articles` WHERE `slider` = 1 ORDER BY `pubdate` DESC");
    return $singeles_for_slider;
}
//Получение колличества статей для слайдера 
function get_count_singeles_for_slider()
{
    global $db;
    $count_sin = $db->query("SELECT * FROM `articles` WHERE `slider` = 1 ORDER BY `pubdate` DESC");
    if (is_array($count_sin) || is_object($count_sin)) {
        foreach ($count_sin as $count) {
            return $count;
        }
    }
}
//Получение кол-ва статей
function get_count_singels()
{
    global $db;
    $count_singels = $db->query("SELECT count(*) FROM `articles`");
    if (is_array($count_singels) || is_object($count_singels)) {
        foreach ($count_singels as $count) {
            return $count;
        }
    }
}
//Проверка логина
function check_logins($login)
{
    global $db;
    $check_logins = $db->query("SELECT count(`login`) FROM `user` WHERE `login` = '$login'");
    if (is_array($check_logins) || is_object($check_logins)) {
        foreach ($check_logins as $check_login) {
            return $check_login[0];
        }
    }
}
//Проверка почты
function check_emails($email)
{
    global $db;
    $check_emails = $db->query("SELECT count(`email`) FROM `user` WHERE `email` = '$email'");
    if (is_array($check_emails) || is_object($check_emails)) {
        foreach ($check_emails as $check_email) {
            return $check_email[0];
        }
    }
}
//Добавление нового пользователя в бд
function add_new_user($login, $email, $password)
{
    global $db;
    $password = password_hash($password, PASSWORD_DEFAULT);
    $db->query("INSERT INTO `user` (`id`, `login`, `email`, `password`) VALUES (NULL, '$login', '$email', '$password')");
}
//Получения магазинов для игры по id
function get_shops_by_game_id($id)
{
    global $db;
    $shops_all = $db->query("SELECT * FROM `shops` WHERE `game_id` = '$id'");
    if (is_array($shops_all) || is_object($shops_all)) {
        foreach ($shops_all as $shops) {
            return $shops;
        }
    }
}
//Получение игр по лимиту 
function get_games_by_limit($limit)
{
    global $db;
    $games = $db->query("SELECT * FROM `games` ORDER BY `id` DESC LIMIT " . $limit);
    return $games;
}
//Получение кол-ва игр
function get_count_games()
{
    global $db;
    $count_games = $db->query("SELECT count(*) FROM `games`");
    if (is_array($count_games) || is_object($count_games)) {
        foreach ($count_games as $count) {
            return $count;
        }
    }
}
//Сортировка игр по дате релиза
function sort_games_by_release_date($limit)
{
    global $db;
    $games = $db->query("SELECT * FROM `games` ORDER BY `release_date` DESC LIMIT " . $limit);
    return $games;
}
//Сортировка игр по алфавиту
function sort_games_by_name_game($limit)
{
    global $db;
    $games = $db->query("SELECT * FROM `games` ORDER BY `name_game` LIMIT " . $limit);
    return $games;
}
//Получение комментариев к статье по id
function get_comments_by_id($id)
{
    global $db;
    $comments = $db->query("SELECT * FROM `comments` WHERE `article_id` = '$id' ORDER BY `publication_date` DESC");
    return $comments;
}
//Получение колличества комментариев к статье по id
function get_comments_count_by_id($id)
{
    global $db;
    $comments_count = $db->query("SELECT count(*) FROM `comments` WHERE `article_id` = '$id' ORDER BY `publication_date` DESC");
    if (is_array($comments_count) || is_object($comments_count)) {
        foreach ($comments_count as $count) {
            return $count[0];
        }
    }
}
//Добавление нового комментария к статье
function add_new_comment($user_login, $comment, $article_id, $user_avatar)
{
    global $db;
    $comments = $db->query("INSERT INTO `comments` (`id`, `article_id`, `comment`, `user_login`, `user_avatar`, `publication_date`) VALUES (NULL, '$article_id', '$comment', '$user_login', '$user_avatar', CURRENT_TIMESTAMP);");
    return $comments;
}
//Получение пользователя из БД по логину и паролю
function get_login_data($login, $password)
{
    global $db;
    $results = $db->query("SELECT count(*) FROM `user` WHERE `login` = '$login' OR `email` = '$login'");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            $results = $result[0];
        }
    }
    if ($results == 1) {

        $results = $db->query("SELECT * FROM `user` WHERE `login` = '$login' OR `email` = '$login'");
        if (is_array($results) || is_object($results)) {
            foreach ($results as $result) {
                if (password_verify($password, $result['password'])) {
                    return $result;
                } else {
                    $results = "Неверный логин или пароль.";
                    return $results;
                }
            }
        }
    } elseif ($results == 0) {
        $results = "Неверный логин или пароль.";
        return $results;
    }
}
//Получение статей к игре по id
function get_articles_by_game_id($id, $limit)
{
    global $db;
    $articles = $db->query("SELECT * FROM `articles` WHERE `games_id` = '$id' ORDER BY `pubdate` DESC LIMIT " . $limit);
    return $articles;
}
//Получение кол-ва статей к игре по id
function get_articles_count_by_game_id($id)
{
    global $db;
    $count = $db->query("SELECT count(*) FROM `articles` WHERE `games_id` = '$id' ORDER BY `pubdate` DESC");
    if (is_array($count) || is_object($count)) {
        foreach ($count as $count) {
            return $count[0];
        }
    }
}
//Смена логина
function change_login_on_db($new_login, $login)
{
    global $db;
    $db->query("UPDATE `user` SET `login` = '$new_login' WHERE `login` = '$login'");
}
//Получение пользователя по id
function get_user($id)
{
    global $db;
    $user = $db->query("SELECT * FROM `user` WHERE `id` = '$id'");
    if (is_array($user) || is_object($user)) {
        foreach ($user as $user) {
            return $user;
        }
    }
}
//Смена пароля
function change_password_on_db($login, $new_password, $password)
{
    global $db;
    $results = $db->query("SELECT count(*) FROM `user` WHERE `login` = '$login'");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            $result = $result[0];
        }
    }
    if ($result > 0) {
        $results = $db->query("SELECT * FROM `user` WHERE `login` = '$login'");
        if (is_array($results) || is_object($results)) {
            foreach ($results as $result) {
                $result = $result;
            }
        }
        if (password_verify($password, $result['password'])) {

            if (password_verify($new_password, $result['password'])) {
                $results = "*Новый пароль не может быть таким же как старый!";
                return $results;
            } else {
                $new_password = password_hash($new_password, PASSWORD_DEFAULT);
                $db->query("UPDATE `user` SET `password` = '$new_password' WHERE `login` = '$login'");
                $results = "Пароль успешно изменён.";
                return $results;
            }
        } else {
            $results = "*Старый пароль введён неверно.";
            return $results;
        }
    } else {
        echo "*Обновите страницу!";
    }
}
//Восстановление пароля
function password_recovery_db($email)
{
    global $db;
    $results = $db->query("SELECT count(*) FROM `user` WHERE `email` = '$email'");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            $result = $result[0];
        }
    }
    if ($result > 0) {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $password = substr(str_shuffle($permitted_chars), 0, 8);
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $db->query("UPDATE `user` SET `password` = '$password_hash' WHERE `email` = '$email'");
        return $password;
    } else {
        $result = "*Пользователя с такой почтой не существует.";
        return $result;
    }
}
//Добавление ссылки на аватар пользователя в бд
function add_user_avatar($url, $login)
{
    global $db;
    $db->query("UPDATE `user` SET `user_avatar` = '$url' WHERE `login` = '$login';");
}
//Добавление новой статьи
function add_new_article($article_title, $prewie_text, $full_text, $article_img, $game_id, $add_slider)
{
    global $db;
    $results = $db->query("SELECT count(*) FROM `articles` WHERE `title` = '$article_title'");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            $result = $result[0];
        }
    }
    if ($result > 0) {
        $result = 0;
        return $result;
    } else {
        $db->query("INSERT INTO `articles` (`id`, `title`, `prewie_text`, `full_text`, `img`, `games_id`, `pubdate`, `views`, `slider`) VALUES (NULL, '$article_title', '$prewie_text', '$full_text', '$article_img', '$game_id', CURRENT_TIMESTAMP, '0', '$add_slider');");

        $results = $db->query("SELECT count(*) FROM `articles` WHERE `prewie_text` = '$prewie_text'");
        if (is_array($results) || is_object($results)) {
            foreach ($results as $result) {
                return $result[0];
            }
        }
    }
}

//Добавление новой игры
function add_new_game($game_name, $game_image, $description, $platform, $genre, $release_date)
{
    global $db;
    $results = $db->query("SELECT count(*) FROM `games` WHERE `name_game` = '$game_name'");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            $result = $result[0];
        }
    }
    if ($result > 0) {
        $result = 0;
        return $result;
    } else {
        $db->query("INSERT INTO `games` (`id`, `name_game`, `Gimg`, `description`, `platform`, `genre`, `release_date`) VALUES (NULL, '$game_name', '$game_image', '$description', '$platform', '$genre', '$release_date');");

        $results = $db->query("SELECT count(*) FROM `games` WHERE `name_game` = '$game_name'");
        if (is_array($results) || is_object($results)) {
            foreach ($results as $result) {
                return $result[0];
            }
        }
    }
}

//Удаление игры по id
function delete_game($id)
{
    global $db;

    $results = $db->query("SELECT count(*) FROM `articles` WHERE `games_id` = '$id'");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            $result = $result[0];
        }
    }

    if ($result == 0) {
        $db->query("DELETE FROM `games` WHERE `games`.`id` = '$id'");

        $results = $db->query("SELECT count(*) FROM `games` WHERE `id` = '$id'");
        if (is_array($results) || is_object($results)) {
            foreach ($results as $result) {
                return $result[0];
            }
        }
    } else {
        $result = "К этой игре привязаны статьи.";
        return $result;
    }
}

//Удаление статьи по id
function delete_article($id)
{
    global $db;

    $results = $db->query("SELECT count(*) FROM `articles` WHERE `id` = '$id'");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            $result = $result[0];
        }
    }

    $db->query("DELETE FROM `articles` WHERE `articles`.`id` = '$id'");

    $results = $db->query("SELECT count(*) FROM `articles` WHERE `id` = '$id'");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            return $result[0];
        }
    }
}
//Редактирование статьи
function edit_article($article_id, $edit_article_title, $edit_prewie_text, $edit_full_text, $edit_article_img, $edit_game_id, $edit_slider)
{
    global $db;
    $results = $db->query("SELECT count(*) FROM `articles` WHERE `id` = '$article_id'");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            $result = $result[0];
        }
    }
    if ($result == 0) {
        $result = -1;
        return $result;
    } else {

        $db->query("UPDATE `articles` SET `title` = '$edit_article_title', `prewie_text` = '$edit_prewie_text', `full_text` = '$edit_full_text', `img` = '$edit_article_img', `games_id` = '$edit_game_id', `slider` = '$edit_slider' WHERE `id` = '$article_id';");

        $result = 1;
        return $result;
    }
}

//Редактирование игры
function edit_game($game_id, $edit_game_name, $edit_game_img, $edit_description, $edit_platform, $edit_genre, $edit_release_date)
{
    global $db;
    $results = $db->query("SELECT count(*) FROM `games` WHERE `id` = '$game_id'");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            $result = $result[0];
        }
    }
    if ($result == 0) {
        $result = -1;
        return $result;
    } else {

        $db->query("UPDATE `games` SET `name_game` = '$edit_game_name', `Gimg` = '$edit_game_img', `description` = '$edit_description', `platform` = '$edit_platform', `genre` = '$edit_genre', `release_date` = '$edit_release_date' WHERE `id` = '$game_id';");

        $result = 1;
        return $result;
    }
}
