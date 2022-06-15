<div class="container content-game">
    <div class="layout">
        <aside class="sidebar">
            <nav class="sorts">
                <div class="blok-header">
                    Помощь
                </div>
                <ul class="sort">
                    <li class="sort-item">
                        <a href="./?page=help"><span class="filter sort-selected">Форумы</span></a>
                    </li>
                    <li class="sort-item">
                        <a href="./?page=about_us"><span class="filter">О нас</span></a>
                    </li>
                    <li class="sort-item">
                        <a href="./?page=advanceded"><span class="filter">Реклама</span></a>
                    </li>
                </ul>
            </nav>
        </aside>


        <main class="help">
            <section aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|';">
                <ol class="breadcrumb" style="margin: 0;">
                    <li class="breadcrumb-item"><a href="./index.php">Главная</a></li>
                    <li class="breadcrumb-item"><a href="#" class="disabled" style="text-decoration: none; cursor: auto;" disabled>Помощь</a></li>
                </ol>
            </section>

            <div class="blok-header">Спрашивайте и узнавайте</div>
            <? if (isset($_SESSION['user_id'])) : ?>
                <div class="ask-question">
                    <div class="ask-button-item">
                        <a href="./?page=adding-post" class="btn">
                            <span>Создать пост</span>
                        </a>
                    </div>
                </div>
            <? else : ?>
                <!--В СЛУЧАЕ, ЕСЛИ ПОЛЬЗОВАТЕЛЬ НЕ АВТОРИЗИРОВАН-->
                <div class="if-form">
                    <div class="com-anotation">Авторизуйтесь, чтобы создать пост.</div>
                    <div class="login_block">
                        <a href="./?page=log" style="color: black;">Войти под своим логином</a>
                        <a href="./?page=reg" style="color: black;">Зарегистрироваться</a>
                    </div>
                </div>
            <? endif; ?>

            <!-- СУЩЕСТВУЮЩИЕ ПОСТЫ -->
            <section>
                <div class="help-list">
                    <div class="help-items">
                        <?
                        $limit_start = 0;
                        $limit_end = 10;
                        if (isset($_GET['go'])) {
                            $limit_start += $_GET['go'];
                        }
                        $posts = get_activ_posts("$limit_start,$limit_end");
                        if ($posts == 0) {
                        ?>
                            <p>На данный момент тем для обсуждения нет.</p>
                            <?
                        } else {
                            foreach ($posts as $post) :
                            ?>
                                <div class="help-item">
                                    <div class="question">
                                        <a href="./?page=post&post_id=<? echo $post['post_id'] ?>"><? echo $post['post_title'] ?></a>
                                    </div>

                                    <div class="help-info">
                                        <div class="help-descript">
                                            <span class="date" style="padding-right: 0;"><? echo $post['pubdate'] ?></span>

                                            <span class="views">
                                                <img src="img/view-dark.png" class="imgi" alt="Просмотры">
                                                <? echo $post['views']; ?>
                                            </span>

                                            <span class="comments">
                                                <img src="img/chat-bubble-dark.png" class="imgi" alt="Комменты">
                                                <? $comments_count = get_count_post_comments($post['post_id']); ?>
                                                <? echo $comments_count; ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="annotation">
                                        <? echo $post['post_comment'] ?>
                                    </div>

                                    <!--<div class="status">
                                <span class="status-open">Открыт <img src="/img/close.png" alt="Вопрос открыт"></span>
                            </div>
                            <div class="status">
                                <span class="status-check">Закрыт <img src="/img/check.png" alt="Вопрос открыт"></span>
                            </div>-->
                                </div>

                            <? endforeach; ?>

                            <div class="pages">
                                <?php
                                $count = get_count_activ_posts();
                                $count_1 = $count;
                                $count = $count;
                                $go = 10;
                                $page_count = 0;
                                for ($i = 1;; $i++) {
                                    if ($count > 0) {
                                        $page_count++;
                                    } else {
                                        break;
                                    }
                                    $count -= 10;
                                }
                                $page_num = $_GET['page_num'];
                                if ($page_count > 2) {
                                ?>
                                    <!-- Шаг назад -->
                                    <? if ($_GET['go'] > 0) : ?>
                                        <a href="./?page=help&go=<? print($_GET['go'] - 10); ?>&page_num=<? echo $_GET['page_num'] - 1; ?>">&#10094;</a>
                                    <? endif; ?>
                                    <?
                                    if ($page_num <= 4 || $page_count < 8) {
                                    ?>
                                        <a class="<?php if ($page_num == 1) {
                                                        echo " a-active";
                                                    } ?>" href="./?page=help&go=0&page_num=1">1</a>
                                    <?
                                    } else {
                                    ?>
                                        <a class="<?php if ($page_num == 1) {
                                                        echo " a-active";
                                                    } ?>" href="./?page=help&go=0&page_num=1">1</a>
                                        <p style="line-height: 32px;">...</p>
                                    <?
                                    }
                                    for ($i = 2; $i <= $page_count - 1; $i++) {
                                        if ($page_num > 4 && $page_num < ($page_count - 2)) {
                                            if ($i <= ($page_num + 2) && $i >= ($page_num - 2)) {
                                                echo "<a class='";
                                                if ($page_num == $i) {
                                                    echo " a-active";
                                                }
                                                echo "' href='./?page=help&go=$go&page_num=$i'>$i</a>";
                                            }
                                        } elseif ($page_num <= 4) {
                                            if ($i >= 2 && $i <= 6) {
                                                echo "<a class='";
                                                if ($page_num == $i) {
                                                    echo " a-active";
                                                }
                                                echo "' href='./?page=help&go=$go&page_num=$i'>$i</a>";
                                            }
                                        } elseif ($page_num > ($page_count - 3)) {
                                            if ($i >= ($page_count - 5) && $i <= $page_count) {
                                                echo "<a class='";
                                                if ($page_num == $i) {
                                                    echo " a-active";
                                                }
                                                echo "' href='./?page=help&go=$go&page_num=$i'>$i</a>";
                                            }
                                        }
                                        $go += 10;
                                    }
                                    if ($page_num > ($page_count - 4) || $page_count < 8) {
                                    ?>
                                        <a class="<?php if ($page_num == $page_count) {
                                                        echo " a-active";
                                                    } ?>" href="./?page=help&go=<? echo $go; ?>&page_num=<? echo $page_count; ?>"><? echo $page_count; ?></a>
                                    <?
                                    } else {
                                    ?>
                                        <p style="line-height: 32px;">...</p>
                                        <a class="<?php if ($page_num == $page_count) {
                                                        echo " a-active";
                                                    } ?>" href="./?page=help&go=<? echo $go; ?>&page_num=<? echo $page_count; ?>"><? echo $page_count; ?></a>
                                    <?
                                    }




                                    //Шаг вперёд
                                    if (($_GET['go'] + 10) < $count_1) : ?>
                                        <a href="./?page=help&go=<? print($_GET['go'] + 10); ?>&page_num=<? echo $_GET['page_num'] + 1; ?>">&#10095;</a>
                                    <? endif;
                                } else {
                                    //Шаг назад
                                    if ($_GET['go'] > 0) :
                                    ?>
                                        <a href="./?page=help&go=<? print($_GET['go'] - 10); ?>&page_num=<? echo $_GET['page_num'] - 1; ?>">&#10094;</a>
                                    <?
                                    endif;
                                    $go = 0;
                                    for ($i = 1; $i <= $page_count; $i++) {

                                        echo "<a class='";
                                        if ($page_num == $i) {
                                            echo " a-active";
                                        }
                                        echo "' href='./?page=help&go=$go&page_num=$i'>$i</a>";

                                        $go += 10;
                                    }
                                    //Шаг вперёд
                                    if (($_GET['go'] + 10) < $count_1) :
                                    ?>
                                        <a href="./?page=help&go=<? print($_GET['go'] + 10); ?>&page_num=<? echo $_GET['page_num'] + 1; ?>">&#10095;</a>
                                <?
                                    endif;
                                }
                                ?>
                            </div>
                        <? } ?>
                    </div>

                </div>
            </section>
        </main>
    </div>
</div>