$(document).ready(function () {
	$("#imgup").hide();
	$("#clickUP").click(function () {
		$("#imgup").show();
		$("#imgDB").hide();
		$("#clickUP").hide();
		$("#colm").removeClass("col-6");
		$("#colm").addClass("col-10");
		$("#x").css("display", "block");
		$("#forward").val("yes");
	});
	$("#x").click(function () {
		$("#imgup").hide();
		$("#imgDB").show();
		$("#clickUP").show();
		$("#colm").removeClass("col-10");
		$("#colm").addClass("col-6");
		$("#x").css("display", "none");
		$("#forward").val("no");
	});
});
