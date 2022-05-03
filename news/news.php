<div class="container content" id="container_content">
    <div class="titling-news">
        <section aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';">
            <ol class="breadcrumb" style="margin: 0;">
                <li class="breadcrumb-item"><a href="./index.php">Главная</a></li>
                <li class="breadcrumb-item"><a href="#" class="disabled" style="text-decoration: none; cursor: auto;" disabled>Новости</a></li>
            </ol>
        </section>

        <div class="blok-header">Игровые новости</div>
    </div>

    <?php

    $limit_start = 0;
    $limit_end = 15;
    if (isset($_GET['go'])) {
        $limit_start += $_GET['go'];
    }
    $get_singles_all = get_singles_all("$limit_start,$limit_end");

    foreach ($get_singles_all as $single) :




        $comments_count = get_comments_count_by_id($single["id"]);
        $game = get_games_by_id($single["games_id"]);

    ?>


        <div class="container">
            <div class="news-block">
                <div class="inner-box">
                    <div class="image">
                        <a href="./?id=<?php echo $single["id"]; ?>">
                            <img class="imga" src="<?php echo $single["img"]; ?>">
                        </a>
                    </div>
                    <div class="title">
                        <a href="./?id=<?php echo $single["id"]; ?>" class="heading"><?php echo $single["title"]; ?>
                        </a>
                    </div>
                    <div class="text">
                        <?php

                        $stroka = iconv('UTF-8', 'windows-1251', $single["prewie_text"]); //Меняем кодировку на windows-1251

                        $stroka = substr($stroka, 0, 600); //Обрезаем строку

                        $stroka = iconv('windows-1251', 'UTF-8', $stroka); //Возвращаем кодировку в utf-8

                        echo $stroka . "  ...  " . " <a href='./?id=" . $single["id"] . "'><span>     [Далее]</span></a>";

                        ?>
                    </div>
                    <div class="descript-wrap">
                        <a href="#"><span style="color: #bfbfbf;"><?php echo $game['name_game']; ?></span></a>
                        <span class="comments">
                            <img src="img/chat-bubble.png" class="imgi" alt="Комменты">
                            <?php echo $comments_count; ?>
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

    <?php



    endforeach;

    ?>
    <div class="pages">
        <?php
        $count = get_count_singels();
        $count_1 = $count[0];
        $count = $count[0];
        $go = 15;
        $page_count = 0;
        for ($i = 1;; $i++) {
            if ($count > 0) {
                $page_count++;
            } else {
                break;
            }
            $count -= 15;
        }
        $page_num = $_GET['page_num'];
        if ($page_count > 2) {
        ?>



            <!-- Шаг назад -->
            <? if ($_GET['go'] > 0) : ?>
                <a href="./?page=news&go=<? print($_GET['go'] - 15); ?>&page_num=<? echo $_GET['page_num'] - 1; ?>">&#10094;</a>
            <? endif; ?>



            <?
            if ($page_num <= 4) {
            ?>

                <a class="<?php if ($page_num == 1) {
                                echo " a-active";
                            } ?>" href="./?page=news&go=0&page_num=1">1</a>

            <?
            } else {
            ?>
                <a class="<?php if ($page_num == 1) {
                                echo " a-active";
                            } ?>" href="./?page=news&go=0&page_num=1">1</a>
                <p style="line-height: 32px;">...</p>

            <?
            }
            ?>





            <?php

            for ($i = 2; $i <= $page_count - 1; $i++) {



                if ($page_num > 4 && $page_num < ($page_count - 2)) {

                    if ($i <= ($page_num + 2) && $i >= ($page_num - 2)) {
                        echo "<a class='";
                        if ($page_num == $i) {
                            echo " a-active";
                        }
                        echo "' href='./?page=news&go=$go&page_num=$i'>$i</a></li>";
                    }
                } elseif ($page_num <= 4) {

                    if ($i >= 2 && $i <= 6) {
                        echo "<a class='";
                        if ($page_num == $i) {
                            echo " a-active";
                        }
                        echo "' href='./?page=news&go=$go&page_num=$i'>$i</a></li>";
                    }
                } elseif ($page_num > ($page_count - 3)) {

                    if ($i >= ($page_count - 5) && $i <= $page_count) {
                        echo "<a class='";
                        if ($page_num == $i) {
                            echo " a-active";
                        }
                        echo "' href='./?page=news&go=$go&page_num=$i'>$i</a></li>";
                    }
                }

                $go += 15;
            }

            ?>



            <?
            if ($page_num > ($page_count - 3) || $page_count < 7) {
            ?>

                <a class="<?php if ($page_num == $page_count) {
                                echo " a-active";
                            } ?>" href="./?page=news&go=<? echo $count_1 - 15; ?>&page_num=<? echo $page_count; ?>"><? echo $page_count; ?></a>

            <?
            } else {
            ?>
                <p style="line-height: 32px;">...</p>
                <a class="<?php if ($page_num == $page_count) {
                                echo " a-active";
                            } ?>" href="./?page=news&go=<? echo $count_1 - 15; ?>&page_num=<? echo $page_count; ?>"><? echo $page_count; ?></a>
            <?
            }
            ?>



            <!-- Шаг вперёд -->
            <? if (($_GET['go'] + 15) < $count_1) : ?>
                <a href="./?page=news&go=<? print($_GET['go'] + 15); ?>&page_num=<? echo $_GET['page_num'] + 1; ?>">&#10095;</a>
            <? endif; ?>

            <?
        } else {
            //Шаг назад
            if ($_GET['go'] > 0) :
            ?>
                <a href="./?page=games&go=<? print($_GET['go'] - 15); ?>&page_num=<? echo $_GET['page_num'] - 1; ?>">&#10094;</a>
            <?
            endif;
            $go = 0;
            for ($i = 1; $i <= $page_count; $i++) {

                echo "<a class='";
                if ($page_num == $i) {
                    echo " a-active";
                }
                echo "' href='./?page=games&go=$go&page_num=$i'>$i</a></li>";

                $go += 15;
            }
            //Шаг вперёд
            if (($_GET['go'] + 15) < $count_1) :
            ?>
                <a href="./?page=games&go=<? print($_GET['go'] + 15); ?>&page_num=<? echo $_GET['page_num'] + 1; ?>">&#10095;</a>
        <?
            endif;
        }
        ?>
    </div>

</div>