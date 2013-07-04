 $(document).ready(function() {

$('#rsvp_status').hide();
$('form').submit(function(){
    the_data = $(this).serialize();
	$.ajax({
		url: "guest",
		method: 'POST',
		data: the_data,
		success: function(data) {
			$('#rsvp_status').html('');
			if (data.success === true){
				status = $("input:radio[name=status]:checked").val();
				if (status == 1){
					the_message = "We can't wait to see you!";
				}
				else
				{
					the_message = "We'll miss you!";
				}
				$('#rsvp_status').html('Thank you ' + $('#rsvp_first').val() + '! ' + the_message);
				$('input.rsvp_form').animate({color: '#FFFFFF'}, function (){
					$('.rsvp_form').val('');
					$('input.rsvp_form').css({'color': ''});
				});
				$('#rsvp_status').fadeIn('slow');
				$('#rsvp_first').focus();
			}
			else
			{
				$('#rsvp_status').html('<p class="text-error">Please check the following errors:</p>');
				$('#rsvp_status').fadeIn('slow');
				$.each(data.messages, function(k, v){
					$('#' + k).addClass('error');
					$('#rsvp_status').append(this + '<br>');
				});
			}
		},
		error:function(){
		 	$('#rsvp_status').fadeIn('slow');
        	$('#rsvp_status').html('There was an error, please try again.');
         }
    });

    return false;
})

	$("body").keypress(function() {
	  $('.control-group').removeClass('error');
	});

	$("#pood_pic").click(function() {
	  $('#poodModal').modal({show: true});
	});
	$("#squid_pic").click(function() {
	  $('#squidModal').modal({show: true});
	});
	$("#pood_pic").mouseenter(function() {
		 $('#kate_name').css({'opacity': 1});
	}).mouseleave(function() {
   	 	  $('#kate_name').css({'opacity': 0});
  	});
  	$("#squid_pic").mouseenter(function() {
		 $('#jimmy_name').css({'opacity': 1});
	}).mouseleave(function() {
   	 	  $('#jimmy_name').css({'opacity': 0});
  	});
});

