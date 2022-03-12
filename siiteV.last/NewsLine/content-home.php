

<div class="secContainer">
    <div class="game-block">
        <p style="margin-bottom: 5px; font-weight: 500; font-size: 24px; line-height: 42px;">
            Игры
        </p>
        <ol class="list-group">

            <?php
            $games_all = get_games_all();
            $g = 0;
            foreach ($games_all as $Ngame) :
                if ($g <= 9) :
            ?>

                    <li class="list-group-item">
                        <a href="#">
                            <img class="Gimg" loading="lazy" src="<?php echo $Ngame["Gimg"] ?>" alt="">
                            <p class="game-heading"><?php echo $Ngame["name_game"] ?></p>
                        </a>
                    </li>


                <?php endif; ?>
                <?php $g++; ?>
            <?php endforeach; ?>

        </ol>
        <a href="#">
            <p style="text-align: center; margin-top: 20px;">Ещё...</p>
        </a>
    </div>

    <!--  Первые два в блоке с играми  -->

    <?php
    $FirstTwoSingles = get_FirstTwoSingles();
    $sinF = 0;
    foreach ($FirstTwoSingles as $FirstSingles) :
        if ($sinF <= 1) :
    ?>
            <?php $game = get_games_by_id($FirstSingles["games_id"]); ?>

            <div class="container" style="padding: 0;">
                <div class="news-block">
                    <div class="inner-box">
                        <div class="image">
                            <a href="./NewsLine/content-single.php?id=<?php echo $FirstSingles["id"]; ?>">
                                <img class="imga" loading="lazy" src="<?php echo $FirstSingles["img"]; ?>">
                            </a>
                        </div>
                        <div class="title">
                            <a href="./NewsLine/content-single.php?id=<?php echo $FirstSingles["id"]; ?>" class="heading"><?php echo $FirstSingles["title"]; ?></a>
                        </div>
                        <p class="text">
                            <?php

                            $stroka = iconv('UTF-8', 'windows-1251', $FirstSingles["prewie_text"]); //Меняем кодировку на windows-1251

                            $stroka = substr($stroka, 0, 300); //Обрезаем строку

                            $stroka = iconv('windows-1251', 'UTF-8', $stroka); //Возвращаем кодировку в utf-8

                            echo $stroka . " ..." . " <a href='./NewsLine/content-single.php?id=" . $FirstSingles["id"] . "'><span>[Далее]</span></a>";

                            ?>
                        </p>
                        <div class="descript-wrap">
                            <a href="#"><span style="color: #bfbfbf;"><?php echo $game; ?></span></a>
                            <span class="comments">
                                <img src="img/chat-bubble.png" class="imgi" alt="Комменты">
                                1
                            </span>
                            <span class="views">
                                <img src="img/view.png" class="imgi" alt="Просмотры">
                                <?php echo $FirstSingles["views"]; ?>
                            </span>
                            <span class="date" style="padding-right: 0;"><?php echo $FirstSingles["pubdate"]; ?></span>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>
        <?php $sinF++; ?>
    <?php endforeach; ?>


</div>

<!--  Главная лента  -->

<?php
$singles_minus_last_two = get_singles_minus_last_two();
$sin = 0;
foreach ($singles_minus_last_two as $single) :
    if ($sin < 12) :

?>
        <?php $game = get_games_by_id($single["games_id"]); ?>

        <div class="container" style="padding: 0;">
            <div class="news-block">
                <div class="inner-box">
                    <div class="image">
                        <a href="./NewsLine/content-single.php?id=<?php echo $single["id"]; ?>">
                            <img class="imga" loading="lazy" src="<?php echo $single["img"]; ?>">
                        </a>
                    </div>
                    <div class="title">
                        <a href="./NewsLine/content-single.php?id=<?php echo $single["id"]; ?>" class="heading"><?php echo $single["title"]; ?>
                        </a>
                    </div>
                    <p class="text">
                        <?php

                        $stroka = iconv('UTF-8', 'windows-1251', $single["prewie_text"]); //Меняем кодировку на windows-1251

                        $stroka = substr($stroka, 0, 600); //Обрезаем строку

                        $stroka = iconv('windows-1251', 'UTF-8', $stroka); //Возвращаем кодировку в utf-8

                        echo $stroka . " ..." . " <a href='./NewsLine/content-single.php?id=" . $single["id"] . "'><span>[Далее]</span></a>";

                        ?>
                    </p>
                    <div class="descript-wrap">
                        <a href="#"><span style="color: #bfbfbf;"><?php echo $game; ?></span></a>
                        <span class="comments">
                            <img src="img/chat-bubble.png" loading="lazy" class="imgi" alt="Комменты">
                            1
                        </span>
                        <span class="views">
                            <img src="img/view.png" class="imgi" alt="Просмотры">
                            <?php echo $single["views"]; ?>
                        </span>
                        <span class="date" style="padding-right: 0;"><?php echo $single["pubdate"]; ?></span>

                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>
    <?php $sin++; ?>
<?php endforeach; ?>