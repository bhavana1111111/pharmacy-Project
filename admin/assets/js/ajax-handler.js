function getState(val) {
	$.ajax({
		type: "POST",
		url: "./ajax/get-state-ep.php",
		data:'category='+val,
		beforeSend: function() {
			$("#state-list").addClass("loader");
		},
		success: function(data){
			$("#state-list").html(data);
			$('#city-list').find('option[value]').remove();
			$("#state-list").removeClass("loader");
		}
	});
}

