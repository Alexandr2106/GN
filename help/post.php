<? $post = get_post($_GET['post_id']); ?>
<? $comments_count = get_count_post_comments($_GET['post_id']); ?>
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
                    <li class="breadcrumb-item"><a href="./?page=help" class="disabled">Помощь</a></li>
                    <li class="breadcrumb-item"><a href="#" onclick="window.history.back();">Назад</a></li>
                </ol>
            </section>

            <section class="quest-header">
                <h1 class="quest-title"><? echo $post['post_title']; ?></h1>

                <? $post_user = get_user_by_id($post['user_id']); ?>

                <div class="descript">
                    <span><img src="<? echo $post_user['user_avatar']; ?>" alt="" width="32px" height="32px"></span>
                    <span><? echo $post_user['login']; ?></span>
                    <span><? echo $post['pubdate']; ?></span>
                    <span><img src="img/view-dark.png" alt="Просмотры"><? echo $post['views']; ?></span>
                    <span><img src="img/chat-bubble-dark.png" alt="Комменты"><? echo $comments_count; ?></span>
                </div>
            </section>

            <section class="quest-main">
                <p>
                    <? echo $post['post_comment']; ?>
                </p>
            </section>

            <section class="quest-images">
                <?
                $user_id = $post['user_id'];
                $post_id = $post['post_id'];
                $fimg = "";
                $dimg = "";
                $wimage = "";
                if (file_exists("./img/posts_img/" . $user_id . "/" . $post_id)) {
                    $dir = "./img/posts_img/" . $user_id . "/" . $post_id; // Папка с изображениями
                    $images = scandir($dir); // сканируем папку
                    if ($images !== false) { // если нет ошибок при сканировании
                        $images = preg_grep("/\.(?:png|gif|jpe?g)$/i", $images); // через регулярку создаем массив только изображений
                        if (is_array($images)) { // если изображения найдены
                            $i = 0;
                            foreach ($images as $image) { // делаем проход по массиву

                                $fimg .= "<img src='" . $dir . "/" . $path . htmlspecialchars(urlencode($image)) . "' alt='" . $dir . "' width='200px' class='openImageZoom$i'/>

                                <dialog class='imageZoom imageZoom$i'>
                                    <div class='zoom-inner'>
                                        <img src='" . $dir . "/" . $path . htmlspecialchars(urlencode($image)) . "' alt='" . $dir . "' width='200px' class='closeImageZoom$i'/>
                                    </div>
                                </dialog>
                                <script>
                                        const openImageZoom$i = document.querySelector('.openImageZoom$i');
                                        const closeImageZoom$i = document.querySelector('.closeImageZoom$i');
                                        const imageZoom$i = document.querySelector('.imageZoom$i');

                                        openImageZoom$i.addEventListener('click', () => {
                                        imageZoom$i.showModal()
                                        })

                                        closeImageZoom$i.addEventListener('click', () => {
                                        imageZoom$i.close()
                                        })

                                        imageZoom$i.addEventListener('click', (e) => {
                                        if (e.target === imageZoom$i) imageZoom$i.close()
                                        })
                                </script>";

                                $i++;
                            }
                            $wimage .= $fimg;
                        } else { // иначе, если нет изображений
                            $wimage .= "<div style='text-align:center'>Не обнаружено изображений в директории!</div>\n";
                        }
                    } else { // иначе, если директория пуста или произошла ошибка
                        $wimage .= "<div style='text-align:center'>Директория пуста или произошла ошибка при сканировании.</div>";
                    }
                    echo $wimage; // выводим полученный результат
                }
                ?>
            </section>



            <? if (empty($_SESSION['user_id'])) : ?>
                <section>
                    <div class="comments">
                        <!--В СЛУЧАЕ, ЕСЛИ ПОЛЬЗОВАТЕЛЬ НЕ АВТОРИЗИРОВАН-->
                        <div class="if-form">
                            <div class="com-anotation">Авторизуйтесь, чтобы принять участие в обсуждении.</div>
                            <div class="login_block">
                                <a href="./?page=log" style="color: black;">Войти под своим логином</a>
                                <a href="./?page=reg" style="color: black;">Зарегистрироваться</a>
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
                                    <form onsubmit="return false" method="POST">
                                        <div class="field">

                                            <input type="text" id="post_id" style="display: none;" value="<? echo $_GET['post_id']; ?>">
                                            <input type="text" id="user_id" style="display: none;" value="<? echo $_SESSION['user_id']; ?>">
                                            <textarea class="comment-input" id="comment" placeholder="Ответить на вопрос"></textarea>
                                            <div style="color: red;" id="comment_error"></div>
                                        </div>
                                        <div class="comment-btn">
                                            <button type="button" onclick="add_new_post_comment()" id="postcom-btn" class="btn submit">Отправить</button>
                                            <input type="reset" class="btn reset" value="Очистить">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <? endif; ?>
                    <!--КОЛЛИЧЕСТВО КОММЕНТАРЕВ-->

                    <div class="value-comment">Ответы: <? echo $comments_count; ?></div>

                    <!--ВСЕ КОММЕНТАРИИ-->

                    <div class="comment-blok">


                        <?
                        if ($comments_count > 0) :
                            $comments = get_post_comments($_GET['post_id']);
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
        </main>
    </div>
</div>