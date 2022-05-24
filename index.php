<?php
require "./DB.php";
if (isset($_GET['id'])) {
    if (!isset($_COOKIE['ViewsCookie'])) {
        setcookie("ViewsCookie", $_GET['id'], time() + 900);
        views_update($_GET['id']);
    } else if (isset($_COOKIE['ViewsCookie'])) {
        if (stristr($_COOKIE['ViewsCookie'], $_GET['id']) == false) {
            $arr =  $_COOKIE['ViewsCookie'];
            setcookie("ViewsCookie", "", time() - 900);
            $arr .= "-" . $_GET['id'];
            setcookie("ViewsCookie", $arr, time() + 900);
            views_update($_GET['id']);
        }
    }
}
if (isset($_GET['post_id'])) {
    if (!isset($_COOKIE['PostViewsCookie'])) {
        setcookie("PostViewsCookie", $_GET['post_id'], time() + 900);
        postViews_update($_GET['post_id']);
    } else if (isset($_COOKIE['PostViewsCookie'])) {
        if (stristr($_COOKIE['PostViewsCookie'], $_GET['post_id']) == false) {
            $arr =  $_COOKIE['PostViewsCookie'];
            setcookie("PostViewsCookie", "", time() - 900);
            $arr .= "-" . $_GET['post_id'];
            setcookie("PostViewsCookie", $arr, time() + 900);
            postViews_update($_GET['post_id']);
        }
    }
}
session_start();
if (isset($_SESSION['user_id'])) {
    $user = get_user($_SESSION['user_id']);
    $admin = check_admin($user['id']);
} else {
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="libs/bootstrap.css" rel="stylesheet">
    <title>GameNews</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="news/newsline.css">
    <link rel="stylesheet" href="slider/slider.css">
    <link rel="stylesheet" href="single/single.css">
    <link rel="stylesheet" href="login/login.css">
    <link rel="stylesheet" href="form/mailing.css">
    <link rel="stylesheet" href="games/games-style.css">
    <link rel="stylesheet" href="games/game-single.css">
    <link rel="stylesheet" href="help/help.css">
    <link rel="stylesheet" href="login/lk/lk.css">
    <link rel="stylesheet" href="login/admin-panel/admin.css">

</head>


<body>
    <div class="wrapper">
        <div class="brand" style="display:none;background-image: url(https://avatars.mds.yandex.net/get-adfox-content/2765366/220415_adfox_1708047_4631112_2.4976c3d47ff0f51a7e78a8cf5af25f86.jpg/optimize.webp);"></div>
        <!--<div class="fakeShift" style="height: 180px;"></div>-->

        <header id="header" class="#">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-xxl">
                    <a class="navbar-brand a-title" data-toggle="tooltip" data-placement="bottom" title="На главную" href="index.php" style="text-decoration: none;">
                        <img src="img/svg/loogoo.svg" alt="" width="70px" height="70px">
                        GameNews
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="./?page=games&go=0&page_num=1">ИГРЫ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./?page=news&go=0&page_num=1">НОВОСТИ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./?page=help&go=0&page_num=1">ПОМОЩЬ</a>
                            </li>
                        </ul>

                        <ul class="nav search">
                            <li class="nav-item">
                                <!-- КНОМКА ДЛЯ ПОИСКА -->
                                <button type="button" class="btn btn-dark search" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <img src="img/svg/search.svg" alt="" width="24px" height="24px">
                                    ПОИСК
                                </button>
                            </li>

                            <!-- МОДАЛКА ПОИСКА -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="ssearch_modal">
                                            <div class="ssearch_mod">
                                                <div class="ssearch_in">
                                                    <form id="search_form">
                                                        <div class="ssearch_inner">

                                                            <input type="text" id="search" class="ssearch_inp" placeholder="Найти игру..." required>

                                                        </div>

                                                        <div class="search_tag">
                                                            <input label="Игры" type="radio" value="s-games" name="tag" checked>
                                                            <input label="Новости" type="radio" value="s-news" name="tag">
                                                            <input label="Форумы" type="radio" value="s-help" name="tag">
                                                        </div>
                                                    </form>
                                                </div>

                                                <!-- КОНТЕНТ ОТОБРАЖАЕМЫЙ В ПОИСКЕ -->
                                                <div class="ssearch_container" id="ssearch">

                                                </div>

                                     
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </ul>

                        <ul class="nav user">
                            <!--НЕ АВТОРИЗИРОВАННЫЙ-->
                            <? if (empty($_SESSION['user_id'])) : ?>
                                <li class="nav-item">
                                    <a href="./?page=log">
                                        <button type="button" class="btn btn-dark">
                                            <img src="img/svg/login.png" alt="" width="24px" height="24px">
                                            ВОЙТИ
                                        </button>
                                    </a>
                                </li>

                            <? elseif (isset($_SESSION['user_id'])) : ?>
                                <!--АВТОРИЗИРОВАННЫЙ-->
                                <li class="nav-item">
                                    <a href="./?page=lk">
                                        <button type="button" class="btn btn-dark">
                                            <span class="main-nickname"><? echo $user['login']; ?></span>
                                            <? if ($user['user_avatar'] == NULL) : ?>
                                                <img src="img/svg/login.png" alt="" width="32px" height="32px">
                                            <? else : ?>
                                                <img src="<? echo $user['user_avatar']; ?>" alt="" width="32px" height="32px">
                                            <? endif; ?>
                                        </button>
                                    </a>
                                    <a href="./login/logout.php" class="small-exit"><img src="img/logout.png" alt="">Выйти</a>

                                    <!--ПОЯВЛЯЕТСЯ ПРИ НАВЕДЕНИИ-->
                                    <div class="hover-lk">
                                        <a class="lk-link" href="./?page=lk">
                                            <? echo $user['login']; ?>
                                            <span style="color: white; font-size: 11px; line-height: 11px; display: block;">
                                                Комментарии: <i style="color: #19B95B; font-size: 12px">Разрешенны</i>
                                            </span>
                                        </a>
                                        <ul style="list-style: none; padding: 0; margin-top: -15px;">
                                            <li class="user-link"><a href="./?page=lk"><img src="img/svg/login.png" alt="">Изменить профиль</a></li>
                                            <li class="user-link"><a href="./login/logout.php"><img src="img/logout.png" alt="">Выйти</a></li>
                                        </ul>
                                    </div>
                                </li>
                            <? endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>


        <?php

        if (isset($_GET['id'])) : //isset sпроверяет переменную на существование

            require "./single/content-single.php";

        elseif (isset($_GET['page']) && $_GET['page'] == "news") :

            require "./news/news.php";

        elseif (isset($_GET['game_id'])) :

            require "./games/game-single.php";

        elseif (isset($_GET['page']) && $_GET['page'] == "log") :

            require "./login/login.php";

        elseif (isset($_GET['page']) && $_GET['page'] == "reg") :

            require "./login/registration/singup.php";

        elseif (isset($_GET['page']) && $_GET['page'] == "games") :

            require "./games/games.php";

        elseif (isset($_GET['page']) && $_GET['page'] == "help") :

            require "./help/help.php";

        elseif (isset($_GET['page']) && $_GET['page'] == "lk"  && isset($_SESSION['user_id'])) :

            require "./login/lk/lk.php";

        elseif (isset($_GET['page']) && $_GET['page'] == "pass_recovery") :

            require "./login/password_recovery.php";

        elseif (isset($_GET['page']) && $_GET['page'] == "admin" && isset($_SESSION['user_id']) && $admin == 1) :

            require "./login/admin-panel/admin.php";

        elseif (isset($_GET['page']) && $_GET['page'] == "adding-post") :

            require "./help/adding-post.php";

        elseif (isset($_GET['page']) && $_GET['page'] == "post") :

            require "./help/post.php";
        else :
            require "./slider/slider-home.php";
            require "./news/content-home.php";
            require "./form/mailing-home.php";

        endif;
        ?>

        <footer id="footer" class="footer">
            <div class="container-xxl cfoot">
                <table class="table social" style="color: #ffffff;">
                    <tr>
                        <td><a href="" target="_blank"><img src="img/svg/vk.svg" alt="" style="width: 24px; height: 24px;"></a></td>
                        <td><a href="" target="_blank"><img src="img/svg/tg.svg" alt="" style="width: 24px; height: 24px;"></a></td>
                        <td><a href="https://discord.gg/jAzpUmug" target="_blank"><img src="img/svg/discord.png" alt="" style="width: 24px; height: 24px;"></a></td>
                    </tr>
                </table>

                <section>
                    <div class="drop-links">
                        <a href="#" class="lin">О НАС</a>
                        <a href="#" class="lin">РЕКЛАМА</a>
                        <a href="#" class="lin">ПОМОЩЬ</a>
                    </div>
                    <div class="r18" style="color: white;">
                        <span class="r18"><img src="img/svg/r18.svg" alt="" style="width: 24px; height: 24px;"></span>
                    </div>
                    <div class="foot-info">
                        <p class="pi">© 2021 GameNews.ru</p>
                        <p class="pi">Использование любых материалов сайта без согласования с администрацией запрещено.
                        </p>
                    </div>
                </section>
            </div>
            </nav>
        </footer>
    </div>

    <script src="./libs/jQuery.js"></script>
    <script src="./js/functions.js"></script>
    <script src="./libs/bootstrap.bundle.js"></script>
    <script src="./slider/slider.js"></script>
    <script src="./login/login_func/login_func.js"></script>
    <script src="./single/comments_controller.js"></script>
    <script src="./login/lk/lk_func.js"></script>
    <script src="./login/admin-panel/admin_func.js"></script>
    <script src="./login/admin-panel/mailing/mailing.js"></script>
    <script src="search.js"></script>
    <script src="./help/forum_func.js"></script>
    <script src="./search.js"></script>
</body>

</html>