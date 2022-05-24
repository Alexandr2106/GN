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
                        <a href="#"><span class="filter">О нас</span></a>
                    </li>
                    <li class="sort-item">
                        <a href="#"><span class="filter">Реклама</span></a>
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

            <div class="alert-info">
                Заголовок вопроса должен содержать главную мысль поста/вопроса, чтобы можно было понять, о чем будет тема, например, «Где найти все ключи в Dead Cells» или «Посоветуйте игру» и т.п.
            </div>

            <section>
                <form enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="post_user" style="display: none;" value="<? echo $_SESSION['user_id']; ?>">
                        <input type="text" class="form-control" id="post_title" placeholder="Заголовок темы" style="padding: 20px; font-size: 16px;">
                        <label for="post_title" id="post_title_message"></label>
                    </div>

                    <div class="alert-info">
                        Просим вас воздержаться от <strong>агрессии</strong> и вести обсуждение в рамках российского законодательства<br>
                        Проявление <strong>ксенофобии</strong> и <strong>обсуждение политики</strong> запрещены.
                    </div>
                    <div class="form-group new-post-textarea">
                        <textarea class="form-control" style="height: 250px; padding: 20px;" id="post_comment" placeholder="Комментарий к теме"></textarea>
                    </div>

                    <div class="files">
                        <span class="file">
                            <input type="file" id="UploadFiles" multiple onchange="showFile(this)" class="input__file" />
                            <button><img class="input__file-icon" src="/img/download.png" alt="Выбрать файл" width="25"></button>
                        </span>
                    </div>
                    <div class="images" style="text-align: right;">

                    </div>
                    <label id="images_message"></label>
                    <script>
                        function showFile(input) {
                            let file = input.files;
                            let reader = [];
                            let img = "";

                            for (let i = 0; i < file.length; i++) {
                                reader[i] = new FileReader();
                                reader[i].readAsDataURL(file[i]);

                                reader[i].onload = function() {
                                    //$('#img_1').attr("src", reader.result);
                                    img += `<img width='200px' src='${reader[i].result}'>`;
                                    $('.images').html(img);
                                };

                                reader[i].onerror = function() {
                                    console.log(reader[i].error);
                                };
                            }

                        }
                    </script>

                    <div class="form-action">
                        <button class="btn btn-send-post" type="submit" id="add_new_post">
                            Опубликовать
                        </button>
                        <label id="add_new_post_message"></label>
                    </div>
                </form>
            </section>
        </main>
    </div>
</div>