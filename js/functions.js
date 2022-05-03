function isEmail(email) {
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}
$('#show_password').on("click", function () {
    if ($('#show_password').is(":checked")) {
        $('#password').attr("type", "text");
        $('#return_password').attr("type", "text");
    } else {
        $('#password').attr("type", "password");
        $('#return_password').attr("type", "password");
    }
})


