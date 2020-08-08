$(document).ready(function(){ 

    $('#submit_profile_post').click(function(){
		var formData = new FormData($("form.profile_post")[0]);

		$.ajax({
			type: "POST",
			url: "includes/handlers/ajax_submit_profile_post.php",
			data: formData,
			processData: false,
			contentType: false,
			success: function(msg) {
				$("#post_form").modal('hide');
				location.reload();
			},
			error: function() {
				alert('Failure');
			}
		});

	});


}); 

function getUsers(value, user){ 
    $.post("includes/handlers/ajax_friend_search.php", {query:value, userLoggedIn:user}, function(data){ 
        $(".results").html(data);
    }); 
}