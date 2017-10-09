/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function submit(){
    if ($("#oldPassword").val() == "" || $("#newPassword").val() == "" || $("#checkPassword").val() == "") {
        alert("还有空白的选项没填！");
        return false;
    } else if($("#newPassword").val() != $("#checkPassword").val()){
        alert("确认密码与新密码不相同！");
        return false;
    }else {
        $.ajax({
            url: 'php/changePassword.php',
            type: 'POST',
            async: true,
            dataType: 'json',
            data: {"oldPassword":$("#oldPassword").val(),"newPassword":$("#newPassword").val()},
            success: function (data) {
                if(data == 1){
                    alert("密码已更改！");
                    window.open("home.html","_self");
                } else if(data == 0) {
                    alert("原始密码有误！请重新输入！");
                    $("#oldPassword").val("");
                    $("#newPassword").val("");
                    $("#checkPassword").val("");
                }
            }
        });
    }
}

