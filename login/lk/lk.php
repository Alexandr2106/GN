<div class="container content-lk">
    <div class="user-profile-header">
        <div class="flexbox-container">
            <div class="user-profile-header-info">
                <div class="flex-item">
                    <a href="#">
                        <img class="avatar" src="https://i.playground.ru/a/MFS1RYdHiQre8i2RPXoRMg.jpeg?130x130" alt="Leg_endary">
                    </a>
                </div>
                <div class="flex-item">
                    <div>Логин: </div>
                    <div><span class="login"><? echo $_SESSION['login']; ?></span></div>
                </div>
            </div>
            <div class="flex-item">
                <div class="mailing mail-lk">
                    <h4>Подписывайтесь на нашу рассылку!</h4>
                    <p class="undt-p">И будьте в курсе свежих новостей каждую неделю</p>
                    <form action="" class="form-mailing">
                        <input type="email" class="form-control" placeholder="Ваш e-mail">

                        <button type="submit" class="btn">Подписаться</button>
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
            <span class="lk-nav-item">
                <a class="tab" href="./?page=admin">
                    <span class="text">Панель Администратора</span>
                </a>
            </span>
        </nav>

        <div class="form-group login-password">
            <div class="switch-login">
                <div class="form-group-left">
                    <label class="block-heading">Отображаемое имя</label>
                </div>
                <div class="form-group-right">
                    <input type="text" class="form-control" placeholder="Введите новый логин">
                    <button type="button" class="btn btn-switch">Сменить логин</button>
                </div>
            </div>
            <div class="switch-pass">
                <div class="form-group-left">
                    <label class="block-heading">Пароль</label>
                </div>
                <div class="form-group-right">
                    <input type="password" class="form-control" placeholder="Введите текущий пароль">
                    <input type="password" class="form-control" placeholder="Введите новый пароль">
                    <button type="button" class="btn btn-switch">Сменить пароль</button>
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
                        <form>
                            <div class="form-group">
                                <span class="file">
                                    <!--<input title="Выбрать изображение" type="file" accept=".jpg,.jpeg,.gif,.png,.webp" name="image" class="file-inputs" style="left: -212px; top: -9px;">-->

                                    <input name="file" type="file" accept=".jpg,.jpeg,.gif,.png,.webp" name="file" id="input__file" class="input input__file" multiple>
                                    <label for="input__file" class="input__file-button">
                                        <span class="input__file-icon-wrapper"><img class="input__file-icon" src="/img/download.png" alt="Выбрать файл" width="25"></span>
                                        <span class="input__file-button-text">Выберите файл</span>
                                    </label>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>