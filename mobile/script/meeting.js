function submit(){
    if ($("#meeting").val() == "" || $("#time").val() == "" || $("#reason").val() == "") {
        alert("还有空白的选项没填！");
        return false;
    } else {
        $.ajax({
            url: 'php/askMeetingAdd.php',
            type: 'POST',
            async: true,
            dataType: 'json',
            data: {"meeting":$("#meeting").val(),"time":$("#time").val(),"reason":$("#reason").val()},
            success: function (data) {
                alert("请假信息已提交！");
                var url = window.parent.location.pathname;
                if(url == "/askforleave/mobile/meeting_log.html" || url == "/askforleave/meeting_log.html"){
                    parent.addData();
                }
                parent.layer.closeAll('iframe');
            }
        });
    }
}