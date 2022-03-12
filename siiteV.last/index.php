<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="css/bootstrap.css" rel="stylesheet">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="NewsLine/newsline.css">
    <link rel="stylesheet" href="css/anima.scss">
    <link rel="stylesheet" href="NewsLine/slider.scss">
    <script src="./js/jQuery.js"></script>

</head>

<body>
    <div class="page">
        <div id="header" class="#">
            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #151719;">
                <div class="container-xxl">
                    <a class="navbar-brand active" href="#">
                        <img src="img/svg/loogoo.svg" alt="" width="70px" height="70px">
                        GameNews
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#">ИГРЫ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./news.php">НОВОСТИ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">ПОМОЩЬ</a>
                            </li>
                        </ul>

                        <ul class="nav search">
                            <li class="nav-item">
                                <button type="button" class="btn btn-dark search" style="background-color: #151719; border-color: #151719;">
                                    <img src="img/search.png" alt="" width="24px" height="24px">
                                    ПОИСК
                                </button>
                            </li>
                        </ul>

                        <ul class="nav user">
                            <li class="nav-item">
                                <button type="button" class="btn btn-dark" style="background-color: #151719; border-color: #151719; margin: 0;
                                    padding: 0;">
                                    <img src="img/login.png" alt="" width="24px" height="24px">
                                    <!--<img
                                        src="img/ligstick.svg" alt="">
                                    Войти-->
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>


        <div class="container cont-slider">
            <div class="blok-header" style="margin-bottom: 20px; font-weight: 500; font-size: 35px; line-height: 62px;">Главное сегодня</div>
            <!--Корявая хуйня-->
            <!--<div class="container-xxl" style="height: 655px; background-color: white; overflow: hidden; padding: 20px;">
            <p style="font-weight: 500; font-size: 36px; line-height: 42px; margin-bottom: 40px;">Главное сегодня</p>

            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="height: 400px; width: 100%; margin: auto; overflow: hidden; border-radius: 20px;">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" style="max-height: 400px;">
                        <img src="img/games-prews/Marvel's Spider-Man.jpg" class="d-block w-100" alt="..." style="filter: brightness(70%);">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Метка первого слайда</h5>
                        </div>
                    </div>
                    <div class="carousel-item" style="max-height: 400px;">
                        <img src="img/games-prews/Marvel's Spider-Man.jpg" class="d-block w-100" alt="..." style="filter: brightness(70%);">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Метка второго слайда</h5>
                        </div>
                    </div>
                    <div class="carousel-item" style="max-height: 400px;">
                        <img src="img/games-prews/Marvel's Spider-Man.jpg" class="d-block w-100" alt="..." style="filter: brightness(70%);">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Метка третьего слайда</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-group" style="height: 40px;width: 100px;float: right;margin-top: 20px;">
                <button class="carousel-control-prev bg-dark" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" style="opacity: 100; opacity: 100;width: 40px;border-radius: 50%;position: relative; margin-right: 20px;">
                    <span class="carousel-control-prev-icon" aria-hidden="true" style="width: 20px;"></span>
                    <span class="visually-hidden">Предыдущий</span>
                </button>
                <button class="carousel-control-next bg-dark" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" style="opacity: 100; opacity: 100;width: 40px;border-radius: 50%;position: relative;">
                    <span class="carousel-control-next-icon" aria-hidden="true" style="width: 20px;"></span>
                    <span class="visually-hidden">Следующий</span>
                </button>
            </div>
        </div>-->


            
            <?php require "./php/DB.php"; ?>
<!--НЕ Корявая хуйня-->
            <?php //require "./NewsLine/slider-home.php"; ?>

        </div>


        <div class="container content" style="background-color: white;">

            <?php require "./NewsLine/content-home.php"; ?>

            <div class="link-more-news">

                <a href="./news.php" class="link-mn">
                    <p>больше новостей</p>
                </a>

            </div>
        </div>

        <div id="footer" class="footer" style="background-color: #151719;">
            <div class="container-xxl cfoot">
                <table class="table social" style="color: #ffffff;">
                    <tr>
                        <td><a href=""><img src="img/svg/vk.svg" alt="" style="width: 24px; height: 24px;"></a></td>
                        <td><a href=""><img src="img/svg/tg.svg" alt="" style="width: 24px; height: 24px;"></a></td>
                        <td><a href=""><img src="img/svg/ins.svg" alt="" style="width: 24px; height: 24px;"></a></td>
                        <td><a href=""><img src="img/svg/face.svg" alt="" style="width: 24px; height: 24px;"></a></td>
                    </tr>
                </table>

                <!--<table class="table anotation" style="color: white;">
                    <tr>
                        <td>18+</td>
                        <td>fdsfsdfsdfsfsdfsdffd <br> sgdfssdfsdfdsffdsfsdfsfds</td>
                        <td>Htrkfvf</td>
                        <td>J yfc</td>
                        <td>Gjvjo</td>
                    </tr>
                </table>-->
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
        </div>


        <script src="js/bootstrap.bundle.js"></script>
        <script src="./js/slider.js"></script>
    </div>
</body>

</html>