define(['jquery'], function ($) {
	return function (ID) {
		$.ajax({
			type: "GET",
			dataType: "text",
			url: "getItemInfo.php?ID="+ID,
			async: true,
			success: function (text) {
				document.getElementById("description").innerHTML=text;
			},
			error: function (x, status, error) {
				console.log(status + ": " + error);
			}
		})
	}
})