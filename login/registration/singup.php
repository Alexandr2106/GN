<section class="authorization">
    <div class="container">
        <div class="card-form">
            <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Регистрация</h2>

                <form class="reg-form" action="#" method="post">

                    <div class="first_form" style="display: block;">

                        <div class="form-outline mb-4">
                            <label class="form-label" for="login"><strong>Логин</strong></label>
                            <input type="text" id="login" class="form-control form-control-lg" />

                            <label class="form-label" id="login_err" style="color: red" for="login"></label>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="email"><strong>E-mail</strong></label>
                            <input type="email" id="email" class="form-control form-control-lg" />

                            <label class="form-label" id="email_err" style="color: red" for="email"></label>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="password"><strong>Пароль</strong></label>
                            <input type="password" id="password" class="form-control form-control-lg" />
                            <input type="checkbox" id="show_password" class="form-check-input">
                            <label class="form-label" for="show_password">Показать пароль</label>
                            <label class="form-label" id="pass_err" style="color: red" for="password"></label>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="return_password"><strong>Повторите пароль</strong></label>
                            <input type="password" id="return_password" class="form-control form-control-lg" />

                        </div>

                        <div class="form-check d-flex justify-content-center mb-3">
                            <label class="form-label" id="user_agreement_err" style="color: red" for="user_agreement"></label>
                            <input class="form-check-input me-2" type="checkbox" value="" id="user_agreement" />
                            <label class="form-check-label" for="user_agreement">
                                Я согласен с <a href="#!" class="text-body"><u>пользовательским соглашением.</u></a>
                            </label>
                        </div>


                        <div class="d-flex justify-content-center">
                            <button type="button" onclick="registration()" id="reg-btn" class="btn reg-btn">Зарегистрироваться</button>
                        </div>

                    </div>

                    <div class="sec_form" style="display: none;">

                        <div class="form-outline mb-4">
                            <label class="form-label" for="activation_code"><strong>Подтверждение почты</strong></label>
                            <input type="text" id="activation_code" class="form-control form-control-lg" placeholder="Код активации" />

                            <label class="form-label" id="activation_code_err" style="color: red" for="activation_code"></label>
                            <label class="form-label" id="form-check-label" for="activation_code">К вам на указанную почту должно прийти письмо с кодом активации.</label>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="button" onclick="confirmation_email()" id="conf-btn" class="btn reg-btn">Подтвердить</button>
                        </div>

                        <p class="text-center text-muted mt-3 mb-0">Долго не приходит письмо? <a href="#" id="timer_url" onclick="get_new_code()" class="fw-bold" style="color: black;"><u>Нажмите сюда</u></a></p>
                        <p class="text-center text-muted mt-3 mb-0">Указали неверную почту? <a href="#" id="timer_url" onclick="change_reg_data()" class="fw-bold" style="color: black;"><u>Нажмите сюда</u></a></p>
                    </div>
                    <p class="text-center text-muted mt-3 mb-0">Вы уже имеете аккаунт? <a href="./?page=log" class="fw-bold" style="color: black;"><u>Войдите</u></a></p>
                </form>
            </div>
        </div>
    </div>
</section>