<section class="pass-recovery">
    <div class="container">
        <div class="card-form">
            <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Восстановление пароля</h2>

                <form class="login-form" action="#" method="post">

                    <div class="first_form" style="display: block;">

                        <div class="form-outline mb-4">
                            <label class="form-label"><strong>E-mail</strong></label>
                            <input type="email" id="email" placeholder="Введите email привязанный к вашему аккаунту" class="form-control form-control-lg" />

                            <label class="form-label" id="email_err" style="color: red"></label>
                        </div>


                        <div class="d-flex justify-content-center">
                            <button type="button" id="recovery" onclick="password_recovery()" class="btn login-btn">Отправить</button>
                        </div>
                        <p class="text-center text-muted mt-3 mb-0">Нет аккаунта? <a href="./?page=reg" class="fw-bold" style="color: black;"><u>Зарегистрируйтесь</u></a></p>
                        <p class="text-center text-muted mt-3 mb-0">Вы уже имеете аккаунт? <a href="./?page=log" class="fw-bold" style="color: black;"><u>Войдите</u></a></p>
                    </div>


                    
                </form>
            </div>
        </div>
    </div>
</section>