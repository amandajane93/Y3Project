$(document).ready(function() { 

    //on click signup, hide login form
    $("#signup").click(function(){ 
        $("#first").slideUp("slow", function(){ 
            $("#second").slideDown("slow")
        });
    });

        //on click signin, hide registration form
        $("#signin").click(function(){ 
            $("#second").slideUp("slow", function(){ 
                $("#first").slideDown("slow")
            });
        });

});