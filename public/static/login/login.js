$(document).ready(function () {
    var head = $(".head");
    var login = $(".login");

    head.fadeOut(0);
    login.fadeOut(0);

    head.delay(500).fadeIn(1000);
    login.delay(1500).fadeIn(1000);

    $("#login-button").on("click", function (event) {
        event.preventDefault();
        $(".tipText").text("正在登陆，请稍等……");
        var url = "http://127.0.0.1:81/login/Index/login";
        $.get(url, {stuId: $("#stuId").val(), password: $("#password").val()}, function (data) {
            $(".tipText").html(data);
        }).error(function () {
            $(".tipText").text("网络错误，请稍后重试");
        });
    });
    $("#register-button").on("click", function (event) {
        event.preventDefault();

        var tip = $(".tipText");
        tip.text("正在注册信息，请稍等……");
        $.get("register.php", {
            stu_id: $("#stuId0").val(),
            ID: $("#ID").val(),
            name: $("#name").val(),
            class: $("#class").val(),
            phone: $("#phone").val(),
            password: $("#password0").val()
        }, function (data) {
            tip.text(data);
            if (data == "注册成功，即将跳转……") {
                $(".tip").hide().text("正在登录……").show(1000);
                setInterval(function () {
                    window.location.href = "../index.php";
                }, 2000);
            }
        }).error(function () {
            $(".tip").text("网络错误，请稍后重试");
        });
    });
});
function cambiar_login(event) {
    document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_login";
    document.querySelector('.cont_form_login').style.display = "block";
    document.querySelector('.cont_form_sign_up').style.opacity = "0";

    setTimeout(function () {
        document.querySelector('.cont_form_login').style.opacity = "1";
    }, 400);

    setTimeout(function () {
        document.querySelector('.cont_form_sign_up').style.display = "none";
    }, 200);
}
function cambiar_sign_up(at) {
    document.querySelector('.cont_forms').className = "cont_forms cont_forms_active_sign_up";
    document.querySelector('.cont_form_sign_up').style.display = "block";
    document.querySelector('.cont_form_login').style.opacity = "0";

    setTimeout(function () {
        document.querySelector('.cont_form_sign_up').style.opacity = "1";
    }, 100);

    setTimeout(function () {
        document.querySelector('.cont_form_login').style.display = "none";
    }, 400);


}
function ocultar_login_sign_up() {

    document.querySelector('.cont_forms').className = "cont_forms";
    document.querySelector('.cont_form_sign_up').style.opacity = "0";
    document.querySelector('.cont_form_login').style.opacity = "0";

    setTimeout(function () {
        document.querySelector('.cont_form_sign_up').style.display = "none";
        document.querySelector('.cont_form_login').style.display = "none";
    }, 500);

}