$(document).ready(function(){
    $("#verify, #email").hide();
    $(".signup").click(function(){
        $(this).addClass('active');
        $(".login").removeClass("active");
        $("#verify, #email").show();
    });
    $(".login").click(function(){
        $(this).addClass('active');
        $(".signup").removeClass("active");
        $("#verify, #email").hide();
    })
});

