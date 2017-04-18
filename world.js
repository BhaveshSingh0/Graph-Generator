
		function info(Co){
			$.ajax({
				url : "data.php",
				type: "GET",
				success : function (data) {
			      for (var i = 0; i < data.length; i++) {
			      	if (data[i].Country == Co) {
			      		console.log(country);
			      		alert("Country: " + data[i].Country + ": GDP" + data[i].GDP + ": Population" + data[i].Population);
			      	}
			      }

				},
				error : function (data) {
					console.log(data);
				}
			});
		}
