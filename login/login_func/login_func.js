//Валидация и отправка данных для регистрации
var code = "";
let action = "";
function registration() {

    action = "registration";
    let login = $('#login').val().replace(/ +/g, ' ').trim();
    let email = $('#email').val().trim();
    let password = $('#password').val().replace(/ +/g, ' ').trim();
    let return_password = $('#return_password').val().trim();






    if (login.length < 4 || login.length > 20) {
        $('#login_err').html("*Логин не может содержать меньше 4 и больше 20 символов!");
        $('#login').css("border-color", "red");
    } else if (login.includes(".") || login.includes(",") || login.includes("!") ||
        login.includes("?") || login.includes("@") || login.includes("/") ||
        login.includes("%") || login.includes("~") || login.includes("^") ||
        login.includes(":") || login.includes(";") || login.includes("'") ||
        login.includes('"') || login.includes("`") || login.includes("|") ||
        login.includes("+") || login.includes(" ")) {

        $('#login_err').html("*Логин не может символы * @ & % ~ ^ / | +, а также ковычки, знаки препинания и пробел!");
        $('#login').css("border-color", "red");
    } else {
        $('#login').css("border-color", "#ced4da");
        $('#login_err').html("");
    }


    if (isEmail($('#email').val().trim()) === false) {
        $('#email_err').html("*Вы не правильно ввели почту (пример: xxxxxx@xxx.xx)");
        $('#email').css("border-color", "red");
    } else {
        $('#email_err').html("");
        $('#email').css("border-color", "#ced4da");
    }



    if (password.length < 8 || password.length > 20) {
        $('#pass_err').html("*Пароль не может содержать меньше 8 и больше 20 символов!");
        $('#return_password').css("border-color", "red");
        $('#password').css("border-color", "red");
    } else if (password.includes(".") || password.includes(",") || password.includes("!") ||
        password.includes("?") || password.includes("@") || password.includes("/") ||
        password.includes("%") || password.includes("~") || password.includes("^") ||
        password.includes(":") || password.includes(";") || password.includes("'") ||
        password.includes('"') || password.includes("`") || password.includes("|") ||
        password.includes("+") || password.includes(" ") ||
        password.includes("й") || password.includes("ц") || password.includes("у") ||
        password.includes("к") || password.includes("е") || password.includes("н") ||
        password.includes("г") || password.includes("ш") || password.includes("щ") ||
        password.includes("з") || password.includes("х") || password.includes("ъ") ||
        password.includes('ф') || password.includes("ы") || password.includes("в") ||
        password.includes("а") || password.includes("п") || password.includes("р") ||
        password.includes("о") || password.includes("л") || password.includes("д") ||
        password.includes("ж") || password.includes("э") || password.includes("я") ||
        password.includes("ч") || password.includes("с") || password.includes("м") ||
        password.includes("и") || password.includes("т") || password.includes("ь") ||
        password.includes("б") || password.includes("ю") ||
        password.includes("Й") || password.includes("Ц") || password.includes("У") ||
        password.includes("К") || password.includes("Е") || password.includes("Н") ||
        password.includes("Г") || password.includes("Ш") || password.includes("Щ") ||
        password.includes("З") || password.includes("Х") || password.includes("Ъ") ||
        password.includes('Ф') || password.includes("Ы") || password.includes("В") ||
        password.includes("А") || password.includes("П") || password.includes("Р") ||
        password.includes("О") || password.includes("Л") || password.includes("Д") ||
        password.includes("Ж") || password.includes("Э") || password.includes("Я") ||
        password.includes("Ч") || password.includes("С") || password.includes("М") ||
        password.includes("И") || password.includes("Т") || password.includes("Ь") ||
        password.includes("Б") || password.includes("Ю")) {

        $('#pass_err').html("*Пароль не может содержать кирилицу, символы * @ & % ~ ^ / | +, а также ковычки, знаки препинания и пробел!");
        $('#password').css("border-color", "red");
    } else if ((password.includes("1") || password.includes("2") || password.includes("3") ||
        password.includes("4") || password.includes("5") || password.includes("6") ||
        password.includes("7") || password.includes("8") || password.includes("9") ||
        password.includes("0")) &&
        (password.includes("q") || password.includes("w") || password.includes("e") ||
            password.includes("r") || password.includes("t") || password.includes("y") ||
            password.includes("u") || password.includes("i") || password.includes("o") ||
            password.includes("p") || password.includes("a") || password.includes("s") ||
            password.includes("d") || password.includes("f") || password.includes("g") ||
            password.includes("h") || password.includes("j") || password.includes("k") ||
            password.includes("l") || password.includes("z") || password.includes("x") ||
            password.includes("c") || password.includes("v") || password.includes("b") ||
            password.includes("n") || password.includes("m") || password.includes("Q") ||
            password.includes("W") || password.includes("E") || password.includes("R") ||
            password.includes("T") || password.includes("Y") || password.includes("U") ||
            password.includes("I") || password.includes("O") || password.includes("P") ||
            password.includes("A") || password.includes("S") || password.includes("D") ||
            password.includes("F") || password.includes("G") || password.includes("H") ||
            password.includes("J") || password.includes("K") || password.includes("L") ||
            password.includes("Z") || password.includes("X") || password.includes("C") ||
            password.includes("V") || password.includes("B") || password.includes("N") ||
            password.includes("M"))) {

        $('#pass_err').html("");
        $('#password').css("border-color", "#ced4da");
    } else {
        $('#pass_err').html("*Пароль должен содержать хотябы одну цыфру и хотябы один символ латинского алфавита!");
        $('#password').css("border-color", "red");
    }


    if (password != return_password) {

        $('#return_password').css("border-color", "red");
        $('#pass_err').html("");
        $('#password').css("border-color", "#ced4da");

    } else {
        $('#return_password').css("border-color", "#ced4da");
    }

    if ($('#user_agreement').is(":checked") === true) {

        $("#user_agreement_err").html("");
        $('#user_agreement').css("border-color", "#ced4da");
        $(".reg_btn").prop("disabled", false);

        if (($('#pass_err').closest('label').text() == "") && ($('#email_err').closest('label').text() == "") && ($('#login_err').closest('label').text() == "")) {



            $.ajax({
                url: "./login/login_func/login_func.php",
                type: "POST",
                cache: false,
                data: {

                    login: login,
                    email: email,
                    password: password,
                    action: action

                },
                beforeSend: function () {

                    $("#reg_btn").prop("disabled", true);

                },
                success: function (data) {
                    $("#reg_btn").prop("disabled", false);

                    if (!data) {
                        alert("Операция не выполнена, попробуйте позже.");
                    }

                    if (data.includes("*Такой логин уже существует, придумайте новый.") === true) {
                        $('#login_err').html("*Такой логин уже существует, придумайте новый.");
                        $('#login').css("border-color", "red");
                    } else {
                        $('#login_err').html("");
                        $('#login').css("border-color", "#ced4da");
                    }
                    if (data.includes("*Пользователь с такой электронной почтой уже существует.") === true) {
                        $('#email_err').html("*Пользователь с такой электронной почтой уже существует.");
                        $('#email').css("border-color", "red");
                    } else {
                        $('#email_err').html("");
                        $('#email').css("border-color", "#ced4da");
                    }
                    if ($.trim(data).length == 8) {

                        alert("Код подтверждения успешно отправлен. Проверьте свою почту")
                        $('.first_form').css("display", "none");
                        $('.sec_form').css("display", "block");
                        code = data;

                    }

                }
            })

        }
    } else {
        $(".reg_btn").prop("disabled", true);
        $("#user_agreement_err").html("*");
        $('#user_agreement').css("border-color", "red");

    }
}
function confirmation_email() {
    let enter_code = $("#activation_code").val().trim();
    if (enter_code == code) {
        action = "complete_reg";
        $.ajax({
            url: "./login/login_func/login_func.php",
            type: "POST",
            cache: false,
            data: {

                action: action

            },
            beforeSend: function () {

                $("#conf-btn").prop("disabled", true);

            },
            success: function (data) {

                if (!data) {
                    alert("Операция не выполнена, попробуйте позже.");
                } else {
                    alert(data);
                    url = "./?page=log";
                    setTimeout('location.href=url', 100);
                    this.href = 'javascript:void(0)';
                }

            }
        })
    } else {
        $('#activation_code_err').html("*Неверный код.");
        $('#activation_code').css("border-color", "red");
    }

}
function get_new_code() {
    action = "recoding";
    $.ajax({
        url: "./login/login_func/login_func.php",
        type: "POST",
        cache: false,
        data: {

            action: action

        },
        beforeSend: function () {

            $("#timer_url").prop("disabled", true);

        },
        success: function (data) {

            if (!data) {
                alert("Операция не выполнена, попробуйте позже.");
            } else {
                alert("Код подтверждения успешно отправлен. Проверьте свою почту")
                $('.first_form').css("display", "none");
                $('.sec_form').css("display", "block");
                code = data;
            }

        }
    })
}
function change_reg_data(){
    $('.first_form').css("display", "block");
    $('.sec_form').css("display", "none");
}
function user_login(){
    let login = $("#login").val().trim();
    let password = $("#password").val().trim();

    action = "login";
    $.ajax({
        url: "./login/login_func/login_func.php",
        type: "POST",
        cache: false,
        data: {

            login: login,
            password: password,
            action: action

        },
        beforeSend: function () {

            $(".login-btn").prop("disabled", true);

        },
        success: function (data) {
            //$(".login-btn").prop("disabled", false);
            if(data == "Неверный логин или пароль."){
                $("#login_error").html(data);
                $(".login-btn").prop("disabled", false);
            }else{
                $("#login_error").html("");
                url = "./index.php";
                setTimeout('location.href=url', 100);
                this.href = 'javascript:void(0)';
            }

        }
    })
}
function password_recovery() {
    let action = "password_recovery";
    let email = $('#email').val().trim();

    if (isEmail($('#email').val().trim()) === false) {
        $('#email_err').html("*Вы не правильно ввели почту (пример: xxxxxx@xxx.xx)");
        $('#email').css("border-color", "red");
    } else {
        $('#email_err').html("");
        $('#email').css("border-color", "#ced4da");

        let confirmation = confirm(`Если вы нажмёте ДА, к вам на почту будет отправлен новый пароль.`)
        if (confirmation == true) {
            $.ajax({
                url: "./login/login_func/login_func.php",
                type: "POST",
                cache: false,
                data: {

                    email: email,
                    action: action

                },
                beforeSend: function () {

                    $("#recovery").prop("disabled", true);

                },
                success: function (data) {


                    if (!data) {
                        alert("Операция не выполнена, попробуйте позже.");
                    } else if (data.includes("*Пользователя с такой почтой не существует.") === true) {
                        $('#email_err').css("color", "red");
                        $('#email_err').html(data);
                        $('#email').css("border-color", "red");
                        $("#recovery").prop("disabled", false);
                    } else {
                        $('#email_err').css("color", "green");
                        $('#email_err').html("Новый пароль был отправлен вам на почту");
                        
                        url = "./?page=log";
                        setTimeout('location.href=url', 500);
                        this.href = 'javascript:void(0)';
                    }

                }
            })
        }
    }
}