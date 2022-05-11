<section class="authorization">
    <div class="container">
        <div class="card-form">
            <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Войти</h2>

                <form class="login-form" action="#" method="post">

                    <div class="first_form" style="display: block;">

                        <div class="form-outline mb-4">
                            <label class="form-label"><strong>Логин или E-mail</strong></label>
                            <input type="text" id="login" class="form-control form-control-lg" />

                            <label class="form-label" style="color: red"></label>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label"><strong>Пароль</strong></label>
                            <input type="password" id="password" class="form-control form-control-lg" />
                            <input type="checkbox" id="show_password" class="form-check-input">
                            <label class="form-label">Показать пароль</label>
                            <label class="form-label" id="login_error" style="color: red"></label>
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="button" onclick="user_login()" class="btn login-btn">Войти</button>
                        </div>
                        <p class="text-center text-muted mt-3 mb-0">Нет аккаунта? <a href="./?page=reg" class="fw-bold" style="color: black;"><u>Зарегистрируйтесь</u></a></p>
                        <p class="text-center mt-2"><a href="./?page=pass_recovery" style="color: black; font-weight: bold;"><u>Я не помню пароль</u></a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>