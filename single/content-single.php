<?php
$single = get_singele_by_id($_GET['id']);
$game = get_games_by_id($single['games_id']);
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

                <? if ($admin == 1) : ?>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><button class="admin-btn openModalEdit openModalEdit<? echo $single['id']; ?>">Редактировать</button>
                            <!-- МОДАЛЬНОЕ ОКНО С ФОРМОЙ РЕДАКТИРОВАНИЯ -->
                            <dialog class="ModalEdit ModalEdit<? echo $single['id']; ?>" style="width: 60%;">
                                <div class="Modal-inner">

                                    <h2>Редактировать статью</h2>

                                    <form class="article-form" id="edit_article_form" onsubmit="return false" method="POST">
                                        <div class="adding">
                                            <label for="edit_article_title">Заголовок статьи:</label>

                                            <input type="text" name="title" id="edit_article_title<? echo $single['id']; ?>" value="<? echo $single['title']; ?>">
                                        </div>

                                        <?
                                        $prewie_text = $single['prewie_text'];

                                        $prewie_text = str_replace('"', '&quot;', $prewie_text);
                                        ?>

                                        <div class="adding">
                                            <label for="edit_prewie_text">Превью текс:</label>
                                            <textarea name="preview" id="edit_prewie_text<? echo $single['id']; ?>" cols="30" rows="10"><? echo $prewie_text; ?></textarea>
                                        </div>

                                        <?
                                        $full_text = $single['full_text'];
                                        $full_text = str_replace('"', '&quot;', $full_text);
                                        ?>

                                        <div class="adding">
                                            <label for="edit_full_text">Полный текст статьи:</label>
                                            <textarea name="full-text" id="edit_full_text<? echo $single['id']; ?>" cols="40" rows="10"><? echo $full_text; ?></textarea>
                                        </div>

                                        <div class="adding">
                                            <label for="edit_article_img">Изображение для превью:</label>
                                            <input type="text" name="image" id="edit_article_img<? echo $single['id']; ?>" value="<? echo $single['img']; ?>">
                                        </div>

                                        <div class="adding">
                                            <label for="edit_game_id">Игра:</label>
                                            <select name="game" id="edit_game_id<? echo $single['id']; ?>">
                                                <option value="13">Другое</option>
                                                <? $Games = sort_games_by_name_game("0,99999");
                                                foreach ($Games as $Game) :
                                                    if ($Game['id'] == 13) :
                                                        continue;
                                                    else :
                                                        if ($Game['id'] == $single['games_id']) {
                                                ?>
                                                            <option value="<? echo $Game['id'] ?>" selected><? echo $Game['name_game'] ?></option>

                                                        <?
                                                        } else {

                                                        ?>
                                                            <option value="<? echo $Game['id'] ?>"><? echo $Game['name_game'] ?></option>

                                                <?
                                                        }
                                                    endif;
                                                endforeach;
                                                ?>
                                            </select>
                                        </div>

                                        <div class="adding">
                                            <label for="edit_slider<? echo $single['id']; ?>">Добавить на слайдер:</label>
                                            <select name="slider" id="edit_slider<? echo $single['id']; ?>">
                                                <? if ($single['slider'] == 1) : ?>
                                                    <option value="1" selected>Да</option>
                                                    <option value="0">Нет</option>
                                                <? else : ?>
                                                    <option value="1">Да</option>
                                                    <option value="0" selected>Нет</option>
                                                <? endif; ?>
                                            </select>
                                        </div>

                                        <div class="adding">
                                            <label for="edit_mailing<? echo $single['id']; ?>">Добавить в недельную рассылку:</label>
                                            <select name="mailing" id="edit_mailing<? echo $single['id']; ?>">
                                                <? if ($single['mailing'] == 1) : ?>
                                                    <option value="1" selected>Да</option>
                                                    <option value="0">Нет</option>
                                                <? else : ?>
                                                    <option value="1">Да</option>
                                                    <option value="0" selected>Нет</option>
                                                <? endif; ?>
                                            </select>
                                        </div>

                                        <div class="article-button">
                                            <label id="edit_article_message<? echo $single['id']; ?>"></label>
                                            <button class="btn add-button" style="margin: auto;" id="edit_article<? echo $single['id']; ?>" onclick="edit_article_by_id(<? echo $single['id']; ?>)">Сохранить</button>

                                        </div>
                                    </form>

                                    <button class="btn add-button closeModalEdit closeModalEdit<? echo $single['id']; ?>">Закрыть</button>
                            </dialog>
                            <script>
                                const openModalEdit<? echo $single['id']; ?> = document.querySelector('.openModalEdit<? echo $single['id']; ?>');
                                const closeModalEdit<? echo $single['id']; ?> = document.querySelector('.closeModalEdit<? echo $single['id']; ?>');
                                const ModalEdit<? echo $single['id']; ?> = document.querySelector('.ModalEdit<? echo $single['id']; ?>');

                                openModalEdit<? echo $single['id']; ?>.addEventListener('click', () => {
                                    ModalEdit<? echo $single['id']; ?>.showModal()
                                })

                                closeModalEdit<? echo $single['id']; ?>.addEventListener('click', () => {
                                    ModalEdit<? echo $single['id']; ?>.close()
                                })

                                ModalEdit<? echo $single['id']; ?>.addEventListener('click', (e) => {
                                    if (e.target === ModalEdit<? echo $single['id']; ?>) ModalEdit<? echo $single['id']; ?>.close()
                                })
                            </script>
                        </li>
                        <!-- /МОДАЛЬНОЕ ОКНО С ФОРМОЙ РЕДАКТИРОВАНИЯ -->
                        <li class="breadcrumb-item"><button class="admin-btn" onclick="delete_article(<? echo $single['id']; ?>, '<? echo $single['title']; ?>',1)">Удалить</button></li>
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
                            <h1>Посмотреть <?php echo $game["name_game"]; ?>:</h1>
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
                                            <?php if ($shops['steam_price'] == 0) {
                                            ?>
                                                <span class="price-value">Бесплатно</span>
                                            <?
                                            } else {
                                            ?>
                                                <span class="price-value"><? echo $shops['steam_price']; ?></span>
                                                <span class="currency">₽</span>
                                            <? } ?>
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
                                            <?php if ($shops['gabestore_price'] == 0) {
                                            ?>
                                                <span class="price-value">Бесплатно</span>
                                            <?
                                            } else {
                                            ?>
                                                <span class="price-value"><? echo $shops['gabestore_price']; ?></span>
                                                <span class="currency">₽</span>
                                            <? } ?>
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
                                            <?php if ($shops['EpicGames_price'] == 0) {
                                            ?>
                                                <span class="price-value">Бесплатно</span>
                                            <?
                                            } else {
                                            ?>
                                                <span class="price-value"><? echo $shops['EpicGames_price']; ?></span>
                                                <span class="currency">₽</span>
                                            <? } ?>
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
                                            <?php if ($shops['SteamPay_price'] == 0) {
                                            ?>
                                                <span class="price-value">Бесплатно</span>
                                            <?
                                            } else {
                                            ?>
                                                <span class="price-value"><? echo $shops['SteamPay_price']; ?></span>
                                                <span class="currency">₽</span>
                                            <? } ?>
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
                                            <?php if ($shops['SousBuy_price'] == 0) {
                                            ?>
                                                <span class="price-value">Бесплатно</span>
                                            <?
                                            } else {
                                            ?>
                                                <span class="price-value"><? echo $shops['SousBuy_price']; ?></span>
                                                <span class="currency">₽</span>
                                            <? } ?>
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
                                            <?php if ($shops['ZakaZAka_price'] == 0) {
                                            ?>
                                                <span class="price-value">Бесплатно</span>
                                            <?
                                            } else {
                                            ?>
                                                <span class="price-value"><? echo $shops['ZakaZAka_price']; ?></span>
                                                <span class="currency">₽</span>
                                            <? } ?>
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

                                        <input type="text" id="article_id" style="display: none;" value="<? echo $_GET['id']; ?>">
                                        <input type="text" id="user_id" style="display: none;" value="<? echo $_SESSION['user_id']; ?>">
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

                            $count_users = get_count_users($comment['user_id']);
                            if ($count_users > 0) {

                                $user_comment = get_ava_by_login($comment['user_id']);

                                $user_comment_admin = check_admin($user_comment['id']);
                    ?>
                                <div class="comments-container">
                                    <div class="comment-item-avatar">
                                        <div class="comment-avatar">
                                            <? if ($user_comment['user_avatar'] == NULL) : ?>
                                                <img src="/img/svg/login.png" alt="Аватар пользователя">
                                            <? else : ?>
                                                <img src="<? echo $user_comment['user_avatar']; ?>" alt="Аватар пользователя">
                                            <? endif; ?>
                                        </div>
                                    </div>

                                    <div class="comment">
                                        <div class="comments-item-header">
                                            <? if ($user_comment_admin == 1) : ?>
                                                <span class="comments-author" style="color: red;"><? echo "Администратор: " . $user_comment['login']; ?></span>
                                            <? else : ?>
                                                <span class="comments-author"><? echo $user_comment['login']; ?></span>
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
                            } else {
                                continue;
                            }
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