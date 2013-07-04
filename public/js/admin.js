var total = 0;
var attending = 0;

function get_data() { 
	$.ajax({
		url: "guest",
		method: 'GET',
		success: function(data) {
			$.each(data, function(k,v){
				$('#main-table > tbody').append('<tr><td>' + v.first_name + ' ' + v.last_name + '</td><td><a href="mailto:'+ v.email + '"> ' + v.email + '</a></td><td>' + v.message + '</td><td>' + v.updated_at + '</td><td><button ' + ((v.status == 1 ) ? 'class="btn btn-success">Yes': 'class="btn btn-danger">No') + '</button></td>');
			});
		},
		error:function(){
         }
    });
}

$(document).ready(function() {

	$.getJSON("login",function(result){
		if (result.success){
			get_data();
		}
		else{
			console.log('error')
		}
	});

    
    $('form').submit(function(){
    	the_data = JSON.stringify($(this).serializeObject());
    	console.log(the_data);
		$.ajax({
			url: "login",
			method: 'POST',
			data: the_data,
			dataType: "json",
			success: function(data) {
				if (data.success == true){
						get_data();	
				}
				else{
					console.log('incorrect login');
				}
			},
			 error:function(){
				console.log('something went wrong');
			 }
		});
		    return false;
    });
	
	


});

	