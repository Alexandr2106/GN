<?php
$count_singeles_for_slider = get_count_singeles_for_slider();
$count_singeles_for_slider = $count_singeles_for_slider[0];
if ($count_singeles_for_slider >= 9) :

?>



    <div class="container content" style="background-color: #fbfbfb;">
        <div class="blok-header">
            Важные новости
        </div>
        <div class="big-slider">
            <div class="slider">

                <?php

                $singeles_for_slider = get_singeles_for_slider();

                $slid = 0;
                foreach ($singeles_for_slider as $sliderSing) :

                ?>


                    <?php if ($slid == 0) : ?>
                        <div class="item">

                            <div class="left-slide">
                                <a href="./?id=<?php echo $sliderSing["id"]; ?>">
                                    <img src="<?php echo $sliderSing['img']; ?>" loading="lazy" alt="Первый слайд" height="520">
                                    <!--<p class="slideText">Заголовок слайда 1</p>-->
                                    <div class="article-slide">
                                        <span class="article-title-left"><?php echo $sliderSing['title']; ?></span>
                                        <!--<div class="article-slide-info">
                                <a href="#"><span style="color: #bfbfbf;">Игра</span></a>
                                <span class="comments"><img src="img/chat-bubble.png" class="slide-imgi" alt="Комменты" style="width: 15px;">1</span>
                                <span class="views"><img src="img/view.png" class="slide-imgi" alt="Просмотры" style="width: 15px;">1</span>
                                </div>-->
                                    </div>
                                </a>
                            </div>

                        <?php elseif ($slid == 1) : ?>
                            <div class="right-slide">
                                <div class="right-up">
                                    <a href="./?id=<?php echo $sliderSing["id"]; ?>">
                                        <img src="<?php echo $sliderSing['img']; ?>" loading="lazy" alt="Первый слайд">
                                        <!--<p class="slideText">Заголовок слайда 1</p>-->
                                        <div class="article-slide">
                                            <span class="article-title-right"><?php echo $sliderSing['title']; ?></span>
                                            <!--<div class="article-slide-info">
                                <a href="#"><span style="color: #bfbfbf;">Игра</span></a>
                                <span class="comments"><img src="img/chat-bubble.png" class="slide-imgi" alt="Комменты" style="width: 15px;">1</span>
                                <span class="views"><img src="img/view.png" class="slide-imgi" alt="Просмотры" style="width: 15px;">1</span>
                                </div>-->
                                        </div>
                                    </a>
                                </div>
                            <?php elseif ($slid == 2) : ?>
                                <div class="right-low">
                                    <a href="./?id=<?php echo $sliderSing["id"]; ?>">
                                        <img src="<?php echo $sliderSing['img']; ?>" loading="lazy" alt="Первый слайд">
                                        <!--<p class="slideText">Заголовок слайда 1</p>-->
                                        <div class="article-slide">
                                            <span class="article-title-right"><?php echo $sliderSing['title']; ?></span>
                                            <!--<div class="article-slide-info">
                                <a href="#"><span style="color: #bfbfbf;">Игра</span></a>
                                <span class="comments"><img src="img/chat-bubble.png" class="slide-imgi" alt="Комменты" style="width: 15px;">1</span>
                                <span class="views"><img src="img/view.png" class="slide-imgi" alt="Просмотры" style="width: 15px;">1</span>
                                </div>-->
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                    <?php elseif ($slid == 3) : ?>

                        <div class="item">
                            <div class="left-slide">
                                <a href="./?id=<?php echo $sliderSing["id"]; ?>">
                                    <img src="<?php echo $sliderSing['img']; ?>" loading="lazy" alt="Первый слайд" height="520">
                                    <!--<p class="slideText">Заголовок слайда 1</p>-->
                                    <div class="article-slide">
                                        <span class="article-title-left"><?php echo $sliderSing['title']; ?></span>
                                        <!--<div class="article-slide-info">
                        <a href="#"><span style="color: #bfbfbf;">Игра</span></a>
                        <span class="comments"><img src="img/chat-bubble.png" class="slide-imgi" alt="Комменты" style="width: 15px;">1</span>
                        <span class="views"><img src="img/view.png" class="slide-imgi" alt="Просмотры" style="width: 15px;">1</span>
                    </div>-->
                                    </div>
                                </a>
                            </div>

                        <?php elseif ($slid == 4) : ?>

                            <div class="right-slide">

                                <div class="right-up">
                                    <a href="./?id=<?php echo $sliderSing["id"]; ?>">
                                        <img src="<?php echo $sliderSing['img']; ?>" alt="Первый слайд">
                                        <!--<p class="slideText">Заголовок слайда 1</p>-->
                                        <div class="article-slide">
                                            <span class="article-title-right"><?php echo $sliderSing['title']; ?></span>
                                            <!--<div class="article-slide-info">
                                    <a href="#"><span style="color: #bfbfbf;">Игра</span></a>
                                    <span class="comments"><img src="img/chat-bubble.png" class="slide-imgi" alt="Комменты" style="width: 15px;">1</span>
                                    <span class="views"><img src="img/view.png" class="slide-imgi" alt="Просмотры" style="width: 15px;">1</span>
                                     </div>-->
                                        </div>
                                    </a>
                                </div>

                            <?php elseif ($slid == 5) : ?>
                                <div class="right-low">
                                    <a href="./?id=<?php echo $sliderSing["id"]; ?>">
                                        <img src="<?php echo $sliderSing['img']; ?>" loading="lazy" alt="Первый слайд">
                                        <!--<p class="slideText">Заголовок слайда 1</p>-->
                                        <div class="article-slide">
                                            <span class="article-title-right"><?php echo $sliderSing['title']; ?></span>
                                            <!--<div class="article-slide-info">
                                    <a href="#"><span style="color: #bfbfbf;">Игра</span></a>
                                    <span class="comments"><img src="img/chat-bubble.png" class="slide-imgi" alt="Комменты" style="width: 15px;">1</span>
                                    <span class="views"><img src="img/view.png" class="slide-imgi" alt="Просмотры" style="width: 15px;">1</span>
                                    </div>-->
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                    <?php elseif ($slid == 6) : ?>

                        <div class="item">
                            <div class="left-slide">
                                <a href="./?id=<?php echo $sliderSing["id"]; ?>">
                                    <img src="<?php echo $sliderSing['img']; ?>" loading="lazy" alt="Первый слайд" height="520">
                                    <!--<p class="slideText">Заголовок слайда 1</p>-->
                                    <div class="article-slide">
                                        <span class="article-title-left"><?php echo $sliderSing['title']; ?></span>
                                        <!--<div class="article-slide-info">
                        <a href="#"><span style="color: #bfbfbf;">Игра</span></a>
                        <span class="comments"><img src="img/chat-bubble.png" class="slide-imgi" alt="Комменты" style="width: 15px;">1</span>
                        <span class="views"><img src="img/view.png" class="slide-imgi" alt="Просмотры" style="width: 15px;">1</span>
                    </div>-->
                                    </div>
                                </a>
                            </div>

                        <?php elseif ($slid == 7) : ?>

                            <div class="right-slide">
                                <div class="right-up">
                                    <a href="./?id=<?php echo $sliderSing["id"]; ?>">
                                        <img src="<?php echo $sliderSing['img']; ?>" alt="Первый слайд">
                                        <!--<p class="slideText">Заголовок слайда 1</p>-->
                                        <div class="article-slide">
                                            <span class="article-title-right"><?php echo $sliderSing['title']; ?></span>
                                            <!--<div class="article-slide-info">
                        <a href="#"><span style="color: #bfbfbf;">Игра</span></a>
                        <span class="comments"><img src="img/chat-bubble.png" class="slide-imgi" alt="Комменты" style="width: 15px;">1</span>
                        <span class="views"><img src="img/view.png" class="slide-imgi" alt="Просмотры" style="width: 15px;">1</span>
                    </div>-->
                                        </div>
                                    </a>
                                </div>

                            <?php elseif ($slid == 8) : ?>
                                <div class="right-low">
                                    <a href="./?id=<?php echo $sliderSing["id"]; ?>">
                                        <img src="<?php echo $sliderSing['img']; ?>" loading="lazy" alt="Первый слайд">
                                        <!--<p class="slideText">Заголовок слайда 1</p>-->
                                        <div class="article-slide">
                                            <span class="article-title-right"><?php echo $sliderSing['title']; ?></span>
                                            <!--<div class="article-slide-info">
                        <a href="#"><span style="color: #bfbfbf;">Игра</span></a>
                        <span class="comments"><img src="img/chat-bubble.png" class="slide-imgi" alt="Комменты" style="width: 15px;">1</span>
                        <span class="views"><img src="img/view.png" class="slide-imgi" alt="Просмотры" style="width: 15px;">1</span>
                    </div>-->
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php $slid++; ?>
                <?php endforeach; ?>

                <a name="prev" class="prev" onclick="minusSlide()">
                    <p>&#10094;</p>
                </a>
                <a name="next" class="next" onclick="plusSlide()">
                    <p>&#10095;</p>
                </a>
            </div>

            <div class="slider-dots">
                <span class="slider-dots_item" onclick="currentSlide(1)">1</span>
                <span class="slider-dots_item" onclick="currentSlide(2)">2</span>
                <span class="slider-dots_item" onclick="currentSlide(3)">3</span>
            </div>
        </div>

        <div class="smart-slider">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">





                    <?php
                    $singeles_for_slider = get_singeles_for_slider();
                    $slid = 0;
                    foreach ($singeles_for_slider as $sliderSing) :

                    ?>


                        <?php if ($slid == 0) : ?>

                            <div class="carousel-item active">
                                <img src="<?php echo $sliderSing['img']; ?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption">
                                    <h5>
                                        <?php echo $sliderSing['title']; ?>
                                    </h5>
                                </div>
                            </div>

                        <?php elseif ($slid == 1) : ?>

                            <div class="carousel-item">
                                <img src="<?php echo $sliderSing['img']; ?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption">
                                    <h5>
                                        <?php echo $sliderSing['title']; ?>
                                    </h5>
                                </div>
                            </div>

                        <?php elseif ($slid == 2) : ?>

                            <div class="carousel-item">
                                <img src="<?php echo $sliderSing['img']; ?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption">
                                    <h5>
                                        <?php echo $sliderSing['title']; ?>
                                    </h5>
                                </div>
                            </div>

                        <?php elseif ($slid == 3) : ?>

                            <div class="carousel-item">
                                <img src="<?php echo $sliderSing['img']; ?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption">
                                    <h5>
                                        <?php echo $sliderSing['title']; ?>
                                    </h5>
                                </div>
                            </div>

                        <?php elseif ($slid == 4) : ?>

                            <div class="carousel-item">
                                <img src="<?php echo $sliderSing['img']; ?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption">
                                    <h5>
                                        <?php echo $sliderSing['title']; ?>
                                    </h5>
                                </div>
                            </div>

                        <?php elseif ($slid == 5) : ?>

                            <div class="carousel-item">
                                <img src="<?php echo $sliderSing['img']; ?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption">
                                    <h5>
                                        <?php echo $sliderSing['title']; ?>
                                    </h5>
                                </div>
                            </div>

                        <?php elseif ($slid == 6) : ?>

                            <div class="carousel-item">
                                <img src="<?php echo $sliderSing['img']; ?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption">
                                    <h5>
                                        <?php echo $sliderSing['title']; ?>
                                    </h5>
                                </div>
                            </div>

                        <?php elseif ($slid == 7) : ?>

                            <div class="carousel-item">
                                <img src="<?php echo $sliderSing['img']; ?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption">
                                    <h5>
                                        <?php echo $sliderSing['title']; ?>
                                    </h5>
                                </div>
                            </div>

                        <?php elseif ($slid == 8) : ?>

                            <div class="carousel-item">
                                <img src="<?php echo $sliderSing['img']; ?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption">
                                    <h5>
                                        <?php echo $sliderSing['title']; ?>
                                    </h5>
                                </div>
                            </div>

                        <?php endif; ?>
                        <?php $slid++; ?>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Предыдущий</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Следующий</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>