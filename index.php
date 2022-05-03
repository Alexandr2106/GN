<?php require "./DB.php";
session_start();
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
    <link rel="stylesheet" href="help/help.css">
    <link rel="stylesheet" href="login/lk/lk.css">
    <link rel="stylesheet" href="login/admin-panel/admin.css">

</head>


<body>
    <div class="wrapper">
        <header id="header" class="#">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-xxl">
                    <a class="navbar-brand active" data-toggle="tooltip" data-placement="bottom" title="На главную" href="index.php" style="text-decoration: none;">
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
                                <a class="nav-link" href="./?page=help">ПОМОЩЬ</a>
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
                                                    <div class="ssearch_inner">
                                                        <input type="Text" class="ssearch_inp" placeholder="Найти игру...">
                                                    </div>
                                                </div>

                                                <!-- КОНТЕНТ ОТОБРАЖАЕМЫЙ В ПОИСКЕ -->
                                                <div class="ssearch_container" style="display:none;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ul>

                        <ul class="nav user">
                            <!--НЕ АВТОРИЗИРОВАННЫЙ-->
                            <? if (empty($_SESSION['login'])) : ?>
                                <li class="nav-item">
                                    <a href="./?page=log">
                                        <button type="button" class="btn btn-dark">
                                            <img src="img/svg/login.png" alt="" width="24px" height="24px">
                                            ВОЙТИ
                                        </button>
                                    </a>
                                </li>

                            <? elseif (isset($_SESSION['login'])) : ?>
                                <!--АВТОРИЗИРОВАННЫЙ-->
                                <li class="nav-item">
                                    <a href="./?page=lk">
                                        <button type="button" class="btn btn-dark">
                                            <span class="main-nickname"><? echo $_SESSION['login']; ?></span>
                                            <img src="img/svg/login.png" alt="" width="32px" height="32px">
                                        </button>
                                    </a>

                                    <!--ПОЯВЛЯЕТСЯ ПРИ НАВЕДЕНИИ-->
                                    <div class="hover-lk">
                                        <a class="lk-link" href="./?page=lk">
                                            <? echo $_SESSION['login']; ?>
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

        elseif (isset($_GET['page']) && $_GET['page'] == "lk") :

            require "./login/lk/lk.php";

        elseif (isset($_GET['page']) && $_GET['page'] == "admin") :

            require "./login/admin-panel/admin.php";
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
                        <td><a href=""><img src="img/svg/vk.svg" alt="" style="width: 24px; height: 24px;"></a></td>
                        <td><a href=""><img src="img/svg/tg.svg" alt="" style="width: 24px; height: 24px;"></a></td>
                        <td><a href=""><img src="img/svg/ins.svg" alt="" style="width: 24px; height: 24px;"></a></td>
                        <td><a href=""><img src="img/svg/face.svg" alt="" style="width: 24px; height: 24px;"></a></td>
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
</body>

</html>