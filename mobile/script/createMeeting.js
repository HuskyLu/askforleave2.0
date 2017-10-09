$("document").ready(function (){
	$("#dutyDate").blur(function (){
		if ($("#dutyDate").attr("value") != "" && $("#time").attr("value") != "" && $("#reason").attr("value") != "") {
			$("#submit").removeClass("disabled");
		} else {
			$("#submit").addClass("disabled");
		}
	});
	$("#time").blur(function (){
		if ($("#dutyDate").attr("value") != "" && $("#time").attr("value") != "" && $("#reason").attr("value") != "") {
			$("#submit").removeClass("disabled");
		} else {
			$("#submit").addClass("disabled");
		}
	});
	$("#reason").blur(function(){
		if ($("#dutyDate").attr("value") != "" && $("#time").attr("value") != "" && $("#reason").attr("value") != "") {
			$("#submit").removeClass("disabled");
		} else {
			$("#submit").addClass("disabled");
		}
	});
});