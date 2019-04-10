$( document ).ready(function() {
	$(':button').on('click', function(event) {	
	
		var id = $(this).attr('id');
		
		if (id == "f1Submit") {                       	        
	        var dataString = "button=Add&Fname=" + $('#Fname').val() + "&Lname=" + $('#Lname').val() + "&Address=" + $('#Address').val() + "&City=" + $('#City').val() + "&State=" + $('#State').val() + "&Zip=" + $('#Zip').val() + "&Phone=" + $('#Phone').val() + "&Email=" + $('#Email').val() + "&Gender=" + $('#Gender').val();
	        $('#form1')[0].reset();
			$.ajax({
				url: "db-handler.php",
				data: dataString,
				dataType: 'json',
				beforeSend:function(){									
				},
				success: function(result) {					
				} 
			});
	    }
	    else if (id == "f2Submit") {                       	        
	        var dataString = "button=Search&Fname=" + $('#f2Fname').val() + "&Lname=" + $('#f2Lname').val();
	        $('#form2')[0].reset();
	        
			$.ajax({
				url: "db-handler.php",
				data: dataString,
				dataType: 'json',
				beforeSend:function(){									
				},
				success: function(result) {					
				} 
			});
	    }	
    }); 
}); 