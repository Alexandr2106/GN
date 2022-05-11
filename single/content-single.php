<?php
$single = get_singele_by_id($_GET['id']);
$game = get_games_by_id($single["games_id"]);
$comments_count = get_comments_count_by_id($_GET['id']);
?>
<div class="container content">
    <div class="main-content">
        <div class="content-single">
            <section aria-label="breadcrumb" style="--bs-breadcrumb-divider: '|'; display: flex; justify-content: space-between; flex-wrap: wrap;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="./index.php">Главная</a></li>
                    <li class="breadcrumb-item"><a href="./?page=news">Новости</a></li>
                    <li class="breadcrumb-item"><a href="#" onclick="window.history.back();">Назад</a></li>
                </ol>

                <? if ($user['admin'] == "1") : ?>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><button class="admin-btn">Редактировать</button></li>
                        <li class="breadcrumb-item"><button class="admin-btn">Добавить на слайдер</button></li>
                        <li class="breadcrumb-item"><button class="admin-btn">Удалить</button></li>
                    </ol>
                <? endif; ?>
            </section>
            <div>
                <h2><?php echo $single["title"]; ?></h2>
                <div class="descript">
                    <span><?php echo $single["pubdate"]; ?></span>
                    <span><?php echo $game['name_game']; ?></span>
                    <span><img src="img/view-dark.png" alt="Просмотры"><?php echo $single["views"]; ?></span>
                    <span><img src="img/chat-bubble-dark.png" alt="Комменты"><?php echo $comments_count; ?></span>
                </div>

                <div class="single-content">
                    <?php echo $single["full_text"]; ?>
                </div>

            </div>
        </div>

        <?
        if ($single["games_id"] != 13) {
        ?>
            <div class="price-block">
                <div>
                    <div class="game-price-header">
                        <div class="game-price-name">
                            <h1>Посмтореть <?php echo $game['name_game']; ?>:</h1>
                        </div>
                    </div>

                    <div class="game-prices">
                        <div class="shop-list">

                            <?
                            $shops = get_shops_by_game_id($single["games_id"]);
                            $shopsQuantity = 0;
                            if ($shops['steam_link'] != NULL) {
                                $shopsQuantity++;
                            ?>

                                <a href="<?php echo $shops['steam_link']; ?>" target="_blank" class="game-prices-item">
                                    <div class="item-one">
                                        <img src="/img/logo-shop/steam.png" alt="Steam" title="Steam" sizes="(max-width: 164px) 100vw, 164px">
                                    </div>

                                    <div class="item-two">
                                        <div class="game-price">
                                            <span class="price-value"><?php echo $shops['steam_price']; ?></span>
                                            <span class="currency">₽</span>
                                            <span class="buy-btn">посмотреть</span>
                                        </div>
                                    </div>
                                </a>
                            <?
                            }
                            if ($shops['gabestore_link'] != NULL) {
                                $shopsQuantity++;
                            ?>
                                <a href="<?php echo $shops['gabestore_link']; ?>" target="_blank" class="game-prices-item">
                                    <div class="item-one">
                                        <img src="/img/logo-shop/gabestore.png" alt="GabeStore" title="GabeStore" sizes="(max-width: 164px) 100vw, 164px">
                                    </div>

                                    <div class="item-two">
                                        <div class="game-price">
                                            <span class="price-value"><?php echo $shops['gabestore_price']; ?></span>
                                            <span class="currency">₽</span>
                                            <span class="buy-btn">посмотреть</span>
                                        </div>
                                    </div>
                                </a>
                            <?
                            }
                            if ($shops['EpicGames_link'] != NULL) {
                                $shopsQuantity++;
                            ?>
                                <a href="<?php echo $shops['EpicGames_link']; ?>" target="_blank" class="game-prices-item">
                                    <div class="item-one">
                                        <img src="/img/logo-shop/epic.png" alt="Epic Games" title="Epic Games" sizes="(max-width: 164px) 100vw, 164px">
                                    </div>

                                    <div class="item-two">
                                        <div class="game-price">
                                            <span class="price-value"><?php echo $shops['EpicGames_price']; ?></span>
                                            <span class="currency">₽</span>
                                            <span class="buy-btn">посмотреть</span>
                                        </div>
                                    </div>
                                </a>
                            <?
                            }
                            if ($shops['SteamPay_link'] != NULL) {
                                $shopsQuantity++;
                            ?>
                                <a href="<?php echo $shops['SteamPay_link']; ?>" target="_blank" class="game-prices-item">
                                    <div class="item-one">
                                        <img src="/img/logo-shop/steampay.png" alt="STEAMPAY" title="STEAMPAY" sizes="(max-width: 164px) 100vw, 164px">
                                    </div>

                                    <div class="item-two">
                                        <div class="game-price">
                                            <span class="price-value"><?php echo $shops['SteamPay_price']; ?></span>
                                            <span class="currency">₽</span>
                                            <span class="buy-btn">посмотреть</span>
                                        </div>
                                    </div>
                                </a>
                            <?
                            }
                            if ($shops['SousBuy_link'] != NULL) {
                                $shopsQuantity++;
                            ?>
                                <a href="<?php echo $shops['SousBuy_link']; ?>" target="_blank" class="game-prices-item">
                                    <div class="item-one">
                                        <img src="/img/logo-shop/sous.png" alt="SousBuy" title="SousBuy" sizes="(max-width: 164px) 100vw, 164px">
                                    </div>

                                    <div class="item-two">
                                        <div class="game-price">
                                            <span class="price-value"><?php echo $shops['SousBuy_price']; ?></span>
                                            <span class="currency">₽</span>
                                            <span class="buy-btn">посмотреть</span>
                                        </div>
                                    </div>
                                </a>
                            <?
                            }
                            if ($shops['ZakaZaka_link'] != NULL) {
                                $shopsQuantity++;
                            ?>
                                <a href="<?php echo $shops['ZakaZaka_link']; ?>" target="_blank" class="game-prices-item">
                                    <div class="item-one">
                                        <img src="/img/logo-shop/zaka.png" alt="Zaka-Zaka" title="Zaka-Zaka" sizes="(max-width: 164px) 100vw, 164px">
                                    </div>

                                    <div class="item-two">
                                        <div class="game-price">
                                            <span class="price-value"><?php echo $shops['ZakaZAka_price']; ?></span>
                                            <span class="currency">₽</span>
                                            <span class="buy-btn">посмотреть</span>
                                        </div>
                                    </div>
                                </a>
                            <?
                            }
                            if ($shopsQuantity == 0) {
                            ?>
                                <p>В данный момент игра не продаётся ни в каком магазине.</p>
                            <?
                            }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
        <?
        }
        ?>

        <? if (empty($_SESSION['user_id'])) : ?>
            <section>
                <div class="comments">
                    <!--В СЛУЧАЕ, ЕСЛИ ПОЛЬЗОВАТЕЛЬ НЕ АВТОРИЗИРОВАН-->
                    <div class="if-form">
                        <div class="com-anotation">Авторизуйтесь, чтобы принять участие в обсуждении.</div>
                        <div class="login_block">
                            <a href="./?page=log">Войти под своим логином</a>
                            <a href="./?page=reg">Зарегистрироваться</a>
                        </div>
                    </div>
                <? elseif (isset($_SESSION['user_id'])) : ?>
                    <!--ВВОД КОММЕНТАРИЯ-->
                    <div class="post-comment">
                        <div class="comment-alert">Проявление <strong>ксенофобии</strong> и <strong>обсуждение политики</strong> в комментариях запрещены.</div>
                        <div class="main-comments">
                            <div class="comment-item-avatar">
                                <div class="comment-avatar">
                                    <? if ($user['user_avatar'] == NULL) : ?>
                                        <img src="/img/svg/login.png" alt="Аватар пользователя">
                                    <? else : ?>
                                        <img src="<? echo $user['user_avatar']; ?>" alt="Аватар пользователя">
                                    <? endif; ?>
                                </div>
                            </div>
                            <div class="input-comment">
                                <form>
                                    <div class="field">
                                        <? if ($user['admin'] == "0") : ?>
                                            <input type="text" id="user_login" style="display: none;" value="<? echo $user['login']; ?>">
                                        <? elseif ($user['admin'] == "1") : ?>
                                            <input type="text" id="user_login" style="display: none;" value="Администратор: <? echo $user['login']; ?>">
                                        <? endif; ?>
                                        <input type="text" id="user_avatar" style="display: none;" value="<? echo $user['user_avatar'] ?>">
                                        <input type="text" id="article_id" style="display: none;" value="<? echo $_GET['id'] ?>">
                                        <textarea class="comment-input" id="comment" placeholder="Оставьте ваше мнение в комментариях"></textarea>
                                        <div style="color: red;" id="comment_error"></div>
                                    </div>
                                    <div class="comment-btn">
                                        <button type="button" onclick="add_new_comment()" id="com-btn" class="btn submit">Отправить</button>
                                        <input type="reset" class="btn reset" value="Очистить">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <? endif; ?>
                <!--КОЛЛИЧЕСТВО КОММЕНТАРЕВ-->
                <? $comments_count = get_comments_count_by_id($_GET['id']); ?>
                <div class="value-comment">Комментарии: <? echo $comments_count; ?></div>

                <!--ВСЕ КОММЕНТАРИИ-->

                <div class="comment-blok">


                    <?
                    if ($comments_count > 0) :
                        $comments = get_comments_by_id($_GET['id']);
                        foreach ($comments as $comment) :
                    ?>
                            <div class="comments-container">
                                <div class="comment-item-avatar">
                                    <div class="comment-avatar">
                                        <? if ($comment['user_avatar'] == NULL) : ?>
                                            <img src="/img/svg/login.png" alt="Аватар пользователя">
                                        <? else : ?>
                                            <img src="<? echo $comment['user_avatar']; ?>" alt="Аватар пользователя">
                                        <? endif; ?>
                                    </div>
                                </div>

                                <div class="comment">
                                    <div class="comments-item-header">
                                        <? if (strpos($comment['user_login'], "Администратор:") !== false) : ?>
                                            <span class="comments-author" style="color: red;"><? echo $comment['user_login']; ?></span>
                                        <? else : ?>
                                            <span class="comments-author"><? echo $comment['user_login']; ?></span>
                                        <? endif; ?>
                                        <span class="comments-item-timestamp">
                                            <? echo $comment['publication_date']; ?>
                                        </span>
                                    </div>

                                    <div class="comments-item-content">
                                        <div class="comment-text">
                                            <div>
                                                <p><? echo $comment['comment']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?
                        endforeach;
                    else :
                        ?>
                        <p>Будьте первым кто оставит комментарий под этой статьей!</p>
                    <?
                    endif;
                    ?>
                </div>
            </section>
    </div>
</div>