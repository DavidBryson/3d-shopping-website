define(['jquery'], function ($) {
	return function (numberOfItems) {
		$.ajax({
			type: "GET",
			dataType: "text",
			url: "loadItems.php?number="+numberOfItems,
			async: true,
			success: function (text) {
				document.getElementById("mainBody").innerHTML=text;
			},
			error: function (x, status, error) {
				console.log(status + ": " + error);
			}
		})
	}
})