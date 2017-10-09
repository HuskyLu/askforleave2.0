function submit() {
    var startTime = $("#dutyDate").val();
    var start = new Date(startTime.replace("-", "/").replace("-", "/")+" 23:59:59");
    var end = new Date();
    if ($("#dutyDate").val() == "" || $("#time").val() == "" || $("#reason").val() == "") {
        alert("还有空白的选项没填！");
        return false;
    } else if (end > start) {
        alert("该系统不允许事后一天再请假！");
        return false;
    } else {
        $.ajax({
            url: 'php/dutyAdd.php',
            type: 'POST',
            async: true,
            dataType: 'json',
            data: {"date":startTime,"shift":$("#time").val(),"reason":$("#reason").val()},
            success: function (data) {
                var url = window.parent.location.pathname;
                alert("请假信息已提交！");
                if(url == "/askforleave/mobile/duty_log.html" || url == "/askforleave/duty_log.html"){
                    parent.addData();
                }
                parent.layer.closeAll('iframe');
            }
        });
    }
}