<div class="slider">
    
<?php
$singeles_for_slider = get_singeles_for_slider();

$slid = 0;
foreach ($singeles_for_slider as $sliderSing):   

?>


<?php if($slid == 0): ?>
    <div class="item">

        <div class="left-slide">



            <a href="./NewsLine/content-single.php?id=<?php echo $sliderSing["id"]; ?>">
                <img src="<?php echo $sliderSing['img']; ?>" loading="lazy" alt="Первый слайд">
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

<?php elseif($slid == 1): ?>
        <div class="right-slide">



            <a href="./NewsLine/content-single.php?id=<?php echo $sliderSing["id"]; ?>">
                <img src="<?php echo $sliderSing['img']; ?>" loading="lazy" alt="Первый слайд" style="margin-bottom: 20px;">
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

<?php elseif($slid == 2): ?>

            <a href="./NewsLine/content-single.php?id=<?php echo $sliderSing["id"]; ?>">
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

<?php elseif($slid == 3): ?>    

    <div class="item">
        <div class="left-slide">



            <a href="./NewsLine/content-single.php?id=<?php echo $sliderSing["id"]; ?>">
                <img src="<?php echo $sliderSing['img']; ?>" loading="lazy" alt="Первый слайд">
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

<?php elseif($slid == 4): ?>  

        <div class="right-slide">



            <a href="./NewsLine/content-single.php?id=<?php echo $sliderSing["id"]; ?>">
                <img src="<?php echo $sliderSing['img']; ?>" alt="Первый слайд" style="margin-bottom: 20px;">
                <!--<p class="slideText">Заголовок слайда 1</p>-->
                <div class="article-slide">
                    <span class="article-title"><?php echo $sliderSing['title']; ?></span>
                    <!--<div class="article-slide-info">
                        <a href="#"><span style="color: #bfbfbf;">Игра</span></a>
                        <span class="comments"><img src="img/chat-bubble.png" class="slide-imgi" alt="Комменты" style="width: 15px;">1</span>
                        <span class="views"><img src="img/view.png" class="slide-imgi" alt="Просмотры" style="width: 15px;">1</span>
                    </div>-->
                </div>
            </a>

<?php elseif($slid == 5): ?>

            <a href="./NewsLine/content-single.php?id=<?php echo $sliderSing["id"]; ?>">
                <img src="<?php echo $sliderSing['img']; ?>" loading="lazy" alt="Первый слайд">
                <!--<p class="slideText">Заголовок слайда 1</p>-->
                <div class="article-slide">
                    <span class="article-title"><?php echo $sliderSing['title']; ?></span>
                    <!--<div class="article-slide-info">
                        <a href="#"><span style="color: #bfbfbf;">Игра</span></a>
                        <span class="comments"><img src="img/chat-bubble.png" class="slide-imgi" alt="Комменты" style="width: 15px;">1</span>
                        <span class="views"><img src="img/view.png" class="slide-imgi" alt="Просмотры" style="width: 15px;">1</span>
                    </div>-->
                </div>
            </a>
        </div>
    </div>

<?php elseif($slid == 6): ?>   

    <div class="item">
        <div class="left-slide">



            <a href="./NewsLine/content-single.php?id=<?php echo $sliderSing["id"]; ?>">
                <img src="<?php echo $sliderSing['img']; ?>" loading="lazy" alt="Первый слайд">
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

<?php elseif($slid == 7): ?>       

        <div class="right-slide">



            <a href="./NewsLine/content-single.php?id=<?php echo $sliderSing["id"]; ?>">
                <img src="<?php echo $sliderSing['img']; ?>" alt="Первый слайд" style="margin-bottom: 20px;">
                <!--<p class="slideText">Заголовок слайда 1</p>-->
                <div class="article-slide">
                    <span class="article-title"><?php echo $sliderSing['title']; ?></span>
                    <!--<div class="article-slide-info">
                        <a href="#"><span style="color: #bfbfbf;">Игра</span></a>
                        <span class="comments"><img src="img/chat-bubble.png" class="slide-imgi" alt="Комменты" style="width: 15px;">1</span>
                        <span class="views"><img src="img/view.png" class="slide-imgi" alt="Просмотры" style="width: 15px;">1</span>
                    </div>-->
                </div>
            </a>

<?php elseif($slid == 8): ?>

            <a href="./NewsLine/content-single.php?id=<?php echo $sliderSing["id"]; ?>">
                <img src="<?php echo $sliderSing['img']; ?>" loading="lazy" alt="Первый слайд">
                <!--<p class="slideText">Заголовок слайда 1</p>-->
                <div class="article-slide">
                    <span class="article-title"><?php echo $sliderSing['title']; ?></span>
                    <!--<div class="article-slide-info">
                        <a href="#"><span style="color: #bfbfbf;">Игра</span></a>
                        <span class="comments"><img src="img/chat-bubble.png" class="slide-imgi" alt="Комменты" style="width: 15px;">1</span>
                        <span class="views"><img src="img/view.png" class="slide-imgi" alt="Просмотры" style="width: 15px;">1</span>
                    </div>-->
                </div>
            </a>
        </div>
</div>
<?php endif; ?>
<?php $slid ++; ?>
<?php endforeach; ?>    








    <a class="prev" onclick="minusSlide()">
        <p>&#10094;</p>
    </a>
    <a class="next" onclick="plusSlide()">
        <p>&#10095;</p>
    </a>
</div>

<div class="slider-dots">
    <span class="slider-dots_item" onclick="currentSlide(1)"></span>
    <span class="slider-dots_item" onclick="currentSlide(2)"></span>
    <span class="slider-dots_item" onclick="currentSlide(3)"></span>
</div>