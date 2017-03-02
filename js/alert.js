$(document).ready(function () {
    $('form[name="register"]').on("submit", function (e) {
    var email = $(this).find('input[name="username"]');
        if ($.trim(email.val()) === "") {
        e.preventDefault(); 
        $("#errorAlert").slideDown(400);  
    } else {

             $("#errorAlert").slideUp(400, function () {     
            email.val("");    
        });
    }
});

$(".alert").find(".close").on("click", function (e) {
    e.stopPropagation();   
    e.preventDefault();    
    $(this).closest(".alert").slideUp(400);  
     });
});

$(document).ready(function () {
    $('form[name="register"]').on("submit", function (e) {
    var email = $(this).find('input[name="password"]');
        if ($.trim(email.val()) === "") {
        e.preventDefault(); 
        $("#errorAlert2").slideDown(400);  
    } else {

             $("#errorAlert2").slideUp(400, function () {     
            email.val("");    
        });
    }
});

$(".alert").find(".close").on("click", function (e) {
    e.stopPropagation();   
    e.preventDefault();    
    $(this).closest(".alert").slideUp(400);  
     });
});