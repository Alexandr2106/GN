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
    $games = $db->query("SELECT * FROM `games` WHERE `id` = '$id'");
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
    $admin = "admin0000";
    $admin = password_hash($admin, PASSWORD_DEFAULT);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $db->query("INSERT INTO `user` (`id`, `login`, `email`, `password`, `admin`) VALUES (NULL, '$login', '$email', '$password', '$admin')");
}
//Проверка является ли пользователь админом
function check_admin($id)
{
    global $db;
    $admin = "admin1111";
    $results = $db->query("SELECT * FROM `user` WHERE `id` = '$id';");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            if (password_verify($admin, $result['admin'])) {
                $result = 1;
                return $result;
            } else {
                $result = 0;
                return $result;
            }
        }
    }
}
//Получение магазинов для игры по id
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
function add_new_comment($comment, $article_id, $user_id)
{
    global $db;
    $comments = $db->query("INSERT INTO `comments` (`id`, `user_id`, `article_id`, `comment`, `publication_date`) VALUES (NULL, '$user_id', '$article_id', '$comment', CURRENT_TIMESTAMP);");
    return $comments;
}
//Получение аватарки пользователя по логину
function get_ava_by_login($id)
{
    global $db;
    $user = $db->query("SELECT * FROM `user` WHERE `id` = '$id'");
    if (is_array($user) || is_object($user)) {
        foreach ($user as $user) {
            return $user;
        }
    }
}
//Получение кол-ва пользователей по id
function get_count_users($id)
{
    global $db;
    $results = $db->query("SELECT count(*) FROM `user` WHERE `id` = $id");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            return $result[0];
        }
    }
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
function add_new_article($article_title, $prewie_text, $full_text, $article_img, $game_id, $add_slider, $add_mailing)
{
    global $db;
    $results = $db->query("SELECT count(*) FROM `articles` WHERE `title` = '$article_title'");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            $result = $result[0];
        }
    }
    if ($result > 0) {
        $result = -1;
        return $result;
    } else {
        $db->query("INSERT INTO `articles` (`id`, `title`, `prewie_text`, `full_text`, `img`, `games_id`, `pubdate`, `views`, `slider`, `mailing`) VALUES (NULL, '$article_title', '$prewie_text', '$full_text', '$article_img', '$game_id', CURRENT_TIMESTAMP, '0', '$add_slider', '$add_mailing');");

        $results = $db->query("SELECT count(*) FROM `articles` WHERE `prewie_text` = '$prewie_text'");
        if (is_array($results) || is_object($results)) {
            foreach ($results as $result) {
                return $result[0];
            }
        }
    }
}

//Добавление новой игры
function add_new_game($game_name, $game_image, $description, $platform, $genre, $release_date, $Steam_price, $Steam_link, $GabeStore_price, $GabeStore_link, $EpicGames_price, $EpicGames_link, $SteamPay_price, $SteamPay_link, $Sous_Buy_price, $Sous_Buy_link, $Zaka_Zaka_price, $Zaka_Zaka_link)
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

        //sleep(2);

        $results = $db->query("SELECT `id` FROM `games` WHERE `name_game` = '$game_name'");
        if (is_array($results) || is_object($results)) {
            foreach ($results as $result) {
                $id = $result['id'];
            }
        }

        $db->query("INSERT INTO `shops` (`game_id`, `steam_link`, `steam_price`, `gabestore_link`, `gabestore_price`, `EpicGames_link`, `EpicGames_price`, `SteamPay_link`, `SteamPay_price`, `SousBuy_link`, `SousBuy_price`, `ZakaZaka_link`, `ZakaZAka_price`) VALUES ('$id', '$Steam_link', $Steam_price, '$GabeStore_link', $GabeStore_price, '$EpicGames_link', $EpicGames_price, '$SteamPay_link', $SteamPay_price, '$Sous_Buy_link', $Sous_Buy_price, '$Zaka_Zaka_link', $Zaka_Zaka_price);");

        //sleep(2);


        $db->query("UPDATE `shops` SET `steam_link` = NULL WHERE `game_id` = '$id' AND `steam_link` = 'NULL';");


        $db->query("UPDATE `shops` SET `gabestore_link` = NULL WHERE `game_id` = '$id' AND `gabestore_link` = 'NULL';");


        $db->query("UPDATE `shops` SET `EpicGames_link` = NULL WHERE `game_id` = '$id' AND `EpicGames_link` = 'NULL';");


        $db->query("UPDATE `shops` SET `SteamPay_link` = NULL WHERE `game_id` = '$id' AND `SteamPay_link` = 'NULL';");


        $db->query("UPDATE `shops` SET `SousBuy_link` = NULL WHERE `game_id` = '$id' AND `SousBuy_link` = 'NULL';");


        $db->query("UPDATE `shops` SET `ZakaZaka_link` = NULL WHERE `game_id` = '$id' AND `ZakaZaka_link` = 'NULL';");








        $results = $db->query("SELECT count(*) FROM `shops` WHERE `game_id` = '$id'");
        if (is_array($results) || is_object($results)) {
            foreach ($results as $result) {
                $result = $result[0];
                return $result;
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
        $db->query("DELETE FROM `shops` WHERE `game_id` = '$id'");
        //sleep(2);
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
function edit_article($article_id, $edit_article_title, $edit_prewie_text, $edit_full_text, $edit_article_img, $edit_game_id, $edit_slider, $edit_mailing)
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

        $db->query("UPDATE `articles` SET `title` = '$edit_article_title', `prewie_text` = '$edit_prewie_text', `full_text` = '$edit_full_text', `img` = '$edit_article_img', `games_id` = '$edit_game_id', `slider` = '$edit_slider', `mailing` = '$edit_mailing' WHERE `id` = '$article_id';");

        $result = 1;
        return $result;
    }
}

//Редактирование игры
function edit_game($game_id, $edit_game_name, $edit_game_img, $edit_description, $edit_platform, $edit_genre, $edit_release_date, $Steam_price, $Steam_link, $GabeStore_price, $GabeStore_link, $EpicGames_price, $EpicGames_link, $SteamPay_price, $SteamPay_link, $Sous_Buy_price, $Sous_Buy_link, $Zaka_Zaka_price, $Zaka_Zaka_link)
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

        $db->query("UPDATE `shops` SET `steam_link` = '$Steam_link', `steam_price` = $Steam_price, `gabestore_link` = '$GabeStore_link', `gabestore_price` = $GabeStore_price, `EpicGames_link` = '$EpicGames_link', `EpicGames_price` = $EpicGames_price, `SteamPay_link` = '$SteamPay_link', `SteamPay_price` = $SteamPay_price, `SousBuy_link` = '$Sous_Buy_link', `SousBuy_price` = $Sous_Buy_price, `ZakaZaka_link` = '$Zaka_Zaka_link', `ZakaZAka_price` = $Zaka_Zaka_price WHERE `game_id` = '$game_id';");

        $db->query("UPDATE `shops` SET `steam_link` = NULL WHERE `game_id` = '$game_id' AND `steam_link` = 'NULL';");

        $db->query("UPDATE `shops` SET `gabestore_link` = NULL WHERE `game_id` = '$game_id' AND `gabestore_link` = 'NULL';");

        $db->query("UPDATE `shops` SET `EpicGames_link` = NULL WHERE `game_id` = '$game_id' AND `EpicGames_link` = 'NULL';");

        $db->query("UPDATE `shops` SET `SteamPay_link` = NULL WHERE `game_id` = '$game_id' AND `SteamPay_link` = 'NULL';");

        $db->query("UPDATE `shops` SET `SousBuy_link` = NULL WHERE `game_id` = '$game_id' AND `SousBuy_link` = 'NULL';");

        $db->query("UPDATE `shops` SET `ZakaZaka_link` = NULL WHERE `game_id` = '$game_id' AND `ZakaZaka_link` = 'NULL';");

        $result = 1;
        return $result;
    }
}
//Добавление новой почты в рассылку
function add_new_mailing($email, $login)
{
    global $db;

    $results = $db->query("SELECT count(*) FROM `mailing` WHERE `email` = '$email'");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            $result = $result[0];
        }
    }
    if ($result == 0) {
        if ($login == 'NULL') {
            $db->query("INSERT INTO `mailing` (`id`, `email`, `user`) VALUES (NULL, '$email', NULL);");
        } else {
            $db->query("INSERT INTO `mailing` (`id`, `email`, `user`) VALUES (NULL, '$email', '$login');");
        }

        $results = $db->query("SELECT count(*) FROM `mailing` WHERE `email` = '$email'");
        if (is_array($results) || is_object($results)) {
            foreach ($results as $result) {
                $result = $result[0];
            }
        }
        if ($result > 0) {
            return $result;
        } else {
            return $result;
        }
    } else {
        $result = -1;
        return $result;
    }
}
//Получение статей для недельной рассылки
function add_mailing_articles()
{
    global $db;
    $today = date("Y-m-d H:i:s");
    $lastWeek = date("Y-m-d H:i:s", strtotime($today . "-1 week"));
    $results = $db->query("SELECT * FROM `articles` WHERE `pubdate` BETWEEN '$lastWeek' AND '$today' ORDER BY `pubdate` DESC");
    return $results;
}
//Получение адрессов электронных почт для рассылки
function add_mailing_emails()
{
    global $db;
    $results = $db->query("SELECT * FROM `mailing`");
    return $results;
}
//Добавление нового поста
function add_new_post($post_user, $post_title, $post_comment, $post_id)
{
    global $db;
    $db->query("INSERT INTO `posts` (`id`, `post_id`, `post_title`, `post_comment`, `user_id`, `status`, `pubdate`) VALUES (NULL, '$post_id', '$post_title', '$post_comment', '$post_user', 0, CURRENT_TIMESTAMP);");

    $results = $db->query("SELECT * FROM `posts` WHERE `post_id` = '$post_id'");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            $result = $result[0];
        }
    }
    if ($result = 0) {
        return "error";
    } else {
        return "success";
    }
}
//Получение всех неодобренных тем
function get_unactiv_posts($limit)
{
    global $db;
    $results = $db->query("SELECT count(*) FROM `posts` WHERE `status` = 0");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            $result = $result[0];
        }
    }
    if ($result == 0) {
        return $result;
    } else {
        $results = $db->query("SELECT * FROM `posts` WHERE `status` = 0 LIMIT " . $limit);
        return $results;
    }
}
//Получение кол-ва всех неодобренных тем
function get_count_unactiv_posts()
{
    global $db;
    $results = $db->query("SELECT count(*) FROM `posts` WHERE `status` = 0");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            return $result[0];
        }
    }
}
//Публикация темы
function publishPost($id)
{
    global $db;
    $db->query("UPDATE `posts` SET `status` = '1' WHERE `id` = $id;");

    $results = $db->query("SELECT count(*) FROM `posts` WHERE `id` = $id;");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            $result = $result[0];
        }
    }
    if ($result = 0) {
        return "error";
    } else {
        return "success";
    }
}
//Удаление темы
function deletePost($id)
{
    global $db;
    $data = $db->query("SELECT * FROM `posts` WHERE `id` = $id;");
    if (is_array($data) || is_object($data)) {
        foreach ($data as $data) {
            $newData = [];
            $newData[1] = $data['user_id'];
            $newData[2] = $data['post_id'];
        }
    }
    $db->query("DELETE FROM `posts` WHERE `id` = $id;");

    $results = $db->query("SELECT count(*) FROM `posts` WHERE `id` = $id;");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            $result = $result[0];
        }
    }
    if ($result > 0) {
        return "error";
    } else {
        $newData[0] = "success";
        return $newData;
    }
}
//Получение всех одобренных тем
function get_activ_posts($limit)
{
    global $db;
    $results = $db->query("SELECT count(*) FROM `posts` WHERE `status` = 1");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            $result = $result[0];
        }
    }
    if ($result == 0) {
        return $result;
    } else {
        $results = $db->query("SELECT * FROM `posts` WHERE `status` = 1 ORDER BY `pubdate` DESC LIMIT $limit");
        return $results;
    }
}
//Получение кол-ва всех одобренных тем
function get_count_activ_posts()
{
    global $db;
    $results = $db->query("SELECT count(*) FROM `posts` WHERE `status` = 1");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            return $result[0];
        }
    }
}
//Получение темы по id
function get_post($id)
{
    global $db;
    $results = $db->query("SELECT * FROM `posts` WHERE `post_id` = '$id'");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            return $result;
        }
    }
}
//Увеличение кол-ва просмотров темы по id
function postViews_update($id)
{
    global $db;
    $views_update = $db->query("UPDATE `posts` SET `views` = `views` + 1 WHERE `post_id` = '$id'");
    return $views_update;
}
//Добавление ответа в теме
function add_new_post_comment($comment, $post_id, $user_id)
{
    global $db;
    $db->query("INSERT INTO `post_comments` (`id`, `user_id`, `post_id`, `comment`, `publication_date`) VALUES (NULL, '$user_id', '$post_id', '$comment', CURRENT_TIMESTAMP);");
}
//Получение кол-ва ответов на пост
function get_count_post_comments($id)
{
    global $db;
    $results = $db->query("SELECT count(*) FROM `post_comments` WHERE `post_id` = '$id'");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            return $result[0];
        }
    }
}
//Получение ответов на пост
function get_post_comments($id)
{
    global $db;
    $results = $db->query("SELECT * FROM `post_comments` WHERE `post_id` = '$id'");
    return $results;
}
//Получение результатов поиска
function get_search_results($Query)
{
    global $db;
    $results = $db->query($Query);
    return $results;
}
//Проверка подписки
function mailing_check($email)
{
    global $db;
    $results = $db->query("SELECT count(*) FROM `mailing` WHERE `email` = '$email'");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            return $result[0];
        }
    }
}
//Отписка от рассылки
function drop_mailing($email)
{
    global $db;
    
    $db->query("DELETE FROM `mailing` WHERE `email` = '$email'");
    
    $results = $db->query("SELECT count(*) FROM `mailing` WHERE `email` = '$email'");
    if (is_array($results) || is_object($results)) {
        foreach ($results as $result) {
            return $result[0];
        }
    }
}