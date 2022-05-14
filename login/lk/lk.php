<div class="container content-lk">
    <div class="user-profile-header">
        <div class="flexbox-container">
            <div class="user-profile-header-info">
                <div class="flex-item">
                    <a href="#">
                        <? if ($user['user_avatar'] == NULL) : ?>
                            <img class="avatar" src="img/svg/login.png">
                        <? else : ?>
                            <!--<img src="<? echo $user['user_avatar']; ?>" alt="" width="32px" height="32px">-->
                            <img class="avatar" src="<? echo $user['user_avatar']; ?>">
                        <? endif; ?>
                        <!--<div class="avatar-form-group">
                            <span class="avatar-file">
                                <input name="file" type="file" accept=".jpg,.jpeg,.gif,.png,.webp" name="file" id="input__file" class="input input__file" multiple>
                                <label for="input__file" class="avatar-file-botton">
                                    <span class="avatar-file"><img class="input__file-icon" src="/img/download.png" alt="Выбрать файл" width="32"></span>
                                </label>
                            </span>
                        </div>-->
                    </a>
                </div>
                <div class="flex-item">
                    <div>Логин: </div>
                    <? if ($admin == 0) : ?>
                        <div><span class="login"><? echo $user['login']; ?></span></div>
                    <? elseif ($admin == 1) : ?>
                        <div><span class="login"><? echo $user['login']; ?><sup class="sup">Админ</sup></span></div>
                    <? endif; ?>
                </div>
            </div>
            <div class="flex-item">
            
                <div class="mailing mail-lk">
                    <h4>Подписывайтесь на нашу рассылку!</h4>
                    <p class="undt-p">И будьте в курсе свежих новостей каждую неделю</p>
                    <form class="form-mailing" method="POST">
                        <input type="text" class="form-control" id="mailing_login_lk" value="<? echo $user['id']; ?>" style="display: none;">
                        <input type="email" class="form-control" id="mailing_email_lk" placeholder="Ваш e-mail">
                        <label for="mailing_email_lk" id="mailing_email_lk_message" style="color: red;"></label>
                        <button type="submit" class="btn" id="mailing_lk">Подписаться</button>
                    </form>
                    <p class="footnote">Нажимая на кнопку, вы даете согласие на обработку персональных данных и политику конфиденциальности.</p>
                </div>
            
            </div>
        </div>
    </div>

    <div class="content-lk">
        <nav class="lk-nav">
            <span class="lk-nav-item">
                <a class="tab nav-selected" href="./?page=lk">
                    <span class="text">Данные</span>
                </a>
            </span>
            <? if ($admin == 1) : ?>
                <span class="lk-nav-item">
                    <a class="tab" href="./?page=admin">
                        <span class="text">Панель Администратора</span>
                    </a>
                </span>
            <? endif; ?>
        </nav>

        <div class="form-group login-password">
            <div class="switch-login">
                <div class="form-group-left">
                    <label class="block-heading">Отображаемое имя</label>
                </div>


                <div class="form-group-right">
                    <input type="text" id="login" style="display: none;" class="form-control" value="<? echo $user['login']; ?>">
                    <input type="text" id="new_login" class="form-control" placeholder="Введите новый логин">
                    <label class="form-label" id="new_login_err" style="color: red" for="password"></label>
                    <button type="button" id="change_login" onclick="change_login()" class="btn btn-switch">Сменить логин</button>
                </div>


            </div>
            <div class="switch-pass">
                <div class="form-group-left">
                    <label class="block-heading">Пароль</label>
                </div>
                <!-- <div class="form-group-left">
                    <label class="block-heading">Пароль</label>
                    <input type="email" id="email" style="display: none;" class="form-control" value="<? echo $user['email']; ?>">
                    <div class="block-subheading" onclick="password_recovery()"><a href="#" style="color: black;"><u>Я не помню пароль</u></a></div>
                    <label class="form-label" id="get_my_pass" style="color: red"></label>
                </div> -->


                <div class="form-group-right">
                    <input type="text" id="login_pass" style="display: none;" class="form-control" value="<? echo $user['login']; ?>">
                    <input type="password" id="password" class="form-control" placeholder="Введите текущий пароль">
                    <input type="password" id="new_password" class="form-control" placeholder="Введите новый пароль">
                    <label class="form-label" id="pass_err" style="color: red" for="new_password"></label><br>
                    <input type="checkbox" id="show_password" class="form-check-input">
                    <label class="form-label">Показать пароль</label>
                    <button type="button" id="change_pass" onclick="change_password()" class="btn btn-switch">Сменить пароль</button>
                </div>

            </div>
        </div>

        <div class="lk-avatar">
            <div class="lk-avatar-contain">
                <div class="block-heading">
                    Аватар
                </div>
                <div class="form-group">
                    <div class="user-avatar">

                        <form method="post" enctype="multipart/form-data" id="file_form">
                            <div class="form-group">
                                <span class="file">
                                    <!--<input title="Выбрать изображение" type="file" accept=".jpg,.jpeg,.gif,.png,.webp" name="image" class="file-inputs" style="left: -212px; top: -9px;">-->
                                    <input type="text" id="login_for_file" style="display: none;" class="form-control" value="<? echo $user['login']; ?>">
                                    <input name="file" type="file" accept=".jpg,.jpeg,.png" name="file" id="input__file" class="input input__file" multiple>
                                    <label for="input__file" class="input__file-button">
                                        <span class="input__file-icon-wrapper"><img class="input__file-icon" src="/img/download.png" alt="Выбрать файл" width="25"></span>
                                        <span class="input__file-button-text">Выберите файл</span>
                                    </label>

                                    <label for="file-submit" class="submit-btn">
                                        <input type="submit" id="file-submit" value="Загрузить">
                                    </label>
                                    <label class="form-label" id="file_message"></label><br>

                                </span>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>