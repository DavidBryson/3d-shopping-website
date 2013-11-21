define(['jquery'], function ($) {
	return function (ID) {
		$.ajax({
			type: "GET",
			dataType: "text",
			url: "../has3D.php?ID="+ID,
			async: true,
			success: function (text) {
				document.getElementById("has3D").innerHTML=text;
			},
			error: function (x, status, error) {
				console.log(status + ": " + error);
			}
		})
	}
})