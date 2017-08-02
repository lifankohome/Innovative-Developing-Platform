/**
 * Created by Administrator on 16-1-27.
 */
$(document).ready(function () {
    document.onkeydown = function (e) {
        var theEvent = window.event || e;
        var code = theEvent.keyCode || theEvent.which;
        if (code == 13) {
            $(".searchBtn").click();
        }
    };
    $(".searchBtn").on("click", function () {
        $("#hide").slideUp();
        $("#tip").text("搜索中…");
        var url = "http://127.0.0.1:81/components/Index/search";
        $.get(url, {keywords: $("#keywords").val()}, function (data) {
            $("#result").html(data);
            $("#tip").text("");
        }).error(function () {
            $("#tip").text("搜索失败");
        });
    });
});