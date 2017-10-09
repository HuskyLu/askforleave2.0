/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $.ajax({
        url: "php/getName.php",
        dataType: "text",
        success: function (data) {
            if (data == '0') {
                alert("你未登陆，请登录！");
                window.open("../index.html", "_self");
            } else {
                $("#name").text(data);
            }
        }
    });
});

