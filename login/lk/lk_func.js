function change_login() {
    let new_login = $('#new_login').val().trim();
    let login = $('#login').val().trim();
    if (new_login.length < 4 || new_login.length > 20) {
        $('#new_login_err').css("color", "red");
        $('#new_login_err').html("*Логин не может содержать меньше 4 и больше 20 символов!");
        $('#new_login').css("border-color", "red");
    } else if (new_login.includes(".") || new_login.includes(",") || new_login.includes("!") ||
        new_login.includes("?") || new_login.includes("@") || new_login.includes("/") ||
        new_login.includes("%") || new_login.includes("~") || new_login.includes("^") ||
        new_login.includes(":") || new_login.includes(";") || new_login.includes("'") ||
        new_login.includes('"') || new_login.includes("`") || new_login.includes("|") ||
        new_login.includes("+") || new_login.includes(" ")) {
        $('#new_login_err').css("color", "red");
        $('#new_login_err').html("*Логин не может символы * @ & % ~ ^ / | +, а также ковычки, знаки препинания и пробел!");
        $('#new_login').css("border-color", "red");
    } else {
        $('#new_login').css("border-color", "#ced4da");
        $('#new_login_err').html("");
    }

    if ($('#new_login_err').closest('label').text() == "") {

        $.ajax({
            url: "./login/lk/lk_func.php",
            type: "POST",
            cache: false,
            data: {

                new_login: new_login,
                login: login,

            },
            beforeSend: function () {

                $("#change_login").prop("disabled", true);

            },
            success: function (data) {


                if (!data) {
                    alert("Операция не выполнена, попробуйте позже.");
                } else if (data.includes("Такой логин уже существует. Придумайте новый.") === true) {
                    $('#new_login_err').css("color", "red");
                    $('#new_login_err').html("*Такой логин уже существует, придумайте новый.");
                    $('#new_login').css("border-color", "red");
                    $("#change_login").prop("disabled", false);
                } else {
                    $('#new_login_err').css("color", "green");
                    $('#new_login_err').html(data);
                    $('#new_login').css("border-color", "#ced4da");
                    $('#login').attr("value", new_login);
                    document.getElementById("new_login").value = "";
                    $("#change_login").prop("disabled", false);
                    /* location.reload();
                    return false; */
                }

            }
        })
    }
}
function change_password() {
    let password = $('#password').val().trim();
    let new_password = $('#new_password').val().trim();
    let login = $('#login_pass').val().trim();
    if (new_password.length < 8 || new_password.length > 20) {
        $('#pass_err').html("*Пароль не может содержать меньше 8 и больше 20 символов!");
        $('#new_password').css("border-color", "red");
        //$('#password').css("border-color", "red");
    } else if (new_password.includes(".") || new_password.includes(",") || new_password.includes("!") ||
        new_password.includes("?") || new_password.includes("@") || new_password.includes("/") ||
        new_password.includes("%") || new_password.includes("~") || new_password.includes("^") ||
        new_password.includes(":") || new_password.includes(";") || new_password.includes("'") ||
        new_password.includes('"') || new_password.includes("`") || new_password.includes("|") ||
        new_password.includes("+") || new_password.includes(" ") ||
        new_password.includes("й") || new_password.includes("ц") || new_password.includes("у") ||
        new_password.includes("к") || new_password.includes("е") || new_password.includes("н") ||
        new_password.includes("г") || new_password.includes("ш") || new_password.includes("щ") ||
        new_password.includes("з") || new_password.includes("х") || new_password.includes("ъ") ||
        new_password.includes('ф') || new_password.includes("ы") || new_password.includes("в") ||
        new_password.includes("а") || new_password.includes("п") || new_password.includes("р") ||
        new_password.includes("о") || new_password.includes("л") || new_password.includes("д") ||
        new_password.includes("ж") || new_password.includes("э") || new_password.includes("я") ||
        new_password.includes("ч") || new_password.includes("с") || new_password.includes("м") ||
        new_password.includes("и") || new_password.includes("т") || new_password.includes("ь") ||
        new_password.includes("б") || new_password.includes("ю") ||
        new_password.includes("Й") || new_password.includes("Ц") || new_password.includes("У") ||
        new_password.includes("К") || new_password.includes("Е") || new_password.includes("Н") ||
        new_password.includes("Г") || new_password.includes("Ш") || new_password.includes("Щ") ||
        new_password.includes("З") || new_password.includes("Х") || new_password.includes("Ъ") ||
        new_password.includes('Ф') || new_password.includes("Ы") || new_password.includes("В") ||
        new_password.includes("А") || new_password.includes("П") || new_password.includes("Р") ||
        new_password.includes("О") || new_password.includes("Л") || new_password.includes("Д") ||
        new_password.includes("Ж") || new_password.includes("Э") || new_password.includes("Я") ||
        new_password.includes("Ч") || new_password.includes("С") || new_password.includes("М") ||
        new_password.includes("И") || new_password.includes("Т") || new_password.includes("Ь") ||
        new_password.includes("Б") || new_password.includes("Ю")) {

        $('#pass_err').html("*Пароль не может содержать кирилицу, символы * @ & % ~ ^ / | +, а также ковычки, знаки препинания и пробел!");
        $('#new_password').css("border-color", "red");
    } else if ((new_password.includes("1") || new_password.includes("2") || new_password.includes("3") ||
        new_password.includes("4") || new_password.includes("5") || new_password.includes("6") ||
        new_password.includes("7") || new_password.includes("8") || new_password.includes("9") ||
        new_password.includes("0")) &&
        (new_password.includes("q") || new_password.includes("w") || new_password.includes("e") ||
            new_password.includes("r") || new_password.includes("t") || new_password.includes("y") ||
            new_password.includes("u") || new_password.includes("i") || new_password.includes("o") ||
            new_password.includes("p") || new_password.includes("a") || new_password.includes("s") ||
            new_password.includes("d") || new_password.includes("f") || new_password.includes("g") ||
            new_password.includes("h") || new_password.includes("j") || new_password.includes("k") ||
            new_password.includes("l") || new_password.includes("z") || new_password.includes("x") ||
            new_password.includes("c") || new_password.includes("v") || new_password.includes("b") ||
            new_password.includes("n") || new_password.includes("m") || new_password.includes("Q") ||
            new_password.includes("W") || new_password.includes("E") || new_password.includes("R") ||
            new_password.includes("T") || new_password.includes("Y") || new_password.includes("U") ||
            new_password.includes("I") || new_password.includes("O") || new_password.includes("P") ||
            new_password.includes("A") || new_password.includes("S") || new_password.includes("D") ||
            new_password.includes("F") || new_password.includes("G") || new_password.includes("H") ||
            new_password.includes("J") || new_password.includes("K") || new_password.includes("L") ||
            new_password.includes("Z") || new_password.includes("X") || new_password.includes("C") ||
            new_password.includes("V") || new_password.includes("B") || new_password.includes("N") ||
            new_password.includes("M"))) {

        $('#pass_err').html("");
        $('#new_password').css("border-color", "#ced4da");
    } else {
        $('#pass_err').html("*Пароль должен содержать хотябы одну цыфру и хотябы один символ латинского алфавита!");
        $('#new_password').css("border-color", "red");
    }


    if ($('#pass_err').closest('label').text() == "") {

        $.ajax({
            url: "./login/lk/lk_func.php",
            type: "POST",
            cache: false,
            data: {

                new_password: new_password,
                password: password,
                login: login
            },
            beforeSend: function () {

                $("#change_pass").prop("disabled", true);

            },
            success: function (data) {


                if (!data) {
                    alert("Операция не выполнена, попробуйте позже.");
                } else if (data.includes("*Новый пароль не может быть таким же как старый!") === true) {
                    $('#pass_err').css("color", "red");
                    $('#pass_err').html(data);
                    $('#new_password').css("border-color", "red");
                    $("#change_pass").prop("disabled", false);
                } else if (data.includes("*Старый пароль введён неверно.") === true) {
                    $('#pass_err').css("color", "red");
                    $('#pass_err').html(data);
                    $('#password').css("border-color", "red");
                    $("#change_pass").prop("disabled", false);
                } else if (data.includes("*Обновите страницу!") === true) {
                    $('#pass_err').css("color", "red");
                    $('#pass_err').html(data);
                } else {
                    $('#pass_err').css("color", "green");
                    $('#pass_err').html(data);
                    $('#new_password').css("border-color", "#ced4da");
                    $('#password').css("border-color", "#ced4da");
                    document.getElementById("new_password").value = "";
                    document.getElementById("password").value = "";
                    $("#change_pass").prop("disabled", false);

                }

            }
        })
    }
}


$('#file-submit').click(function (event) {
    event.preventDefault();
    var data = jQuery('#file_form').find('input').serialize();
    let login = $('#login_for_file').val();
    //--console.debug(data);


    var fd = new FormData();
    fd.append('file', $('#input__file')[0].files[0]);
    fd.append('login', login);
    $.ajax({
        type: 'POST',
        url: './login/lk/lk_func.php',
        data: fd,

        processData: false,
        contentType: false,
        //          dataType: "json",
        dataType: "text",
        beforeSend: function () {

            $("#file-submit").prop("disabled", true);

        },
        success: function (data) {
            if (data) {
                $("#file_message").css("color", "green");
                $("#file_message").html(data);
                location.reload();
                return false;
            } else if (!data) {
                $("#file_message").css("color", "red");
                $("#file_message").html("*Файл не выбран.");
                $("#file-submit").prop("disabled", false);
            }

        },
    });
});