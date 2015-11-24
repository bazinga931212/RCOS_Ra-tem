/*
* @Author: Zhiying
* @Date:   2015-11-22 21:37:36
* @Last Modified by:   Zhiying
* @Last Modified time: 2015-11-23 01:45:15
*/
$(document).ready(function(){
    $(".signup").click(function(){
        $(this).addClass('active');
        $(".login").removeClass("active");
        $("#verify, #email").show();
    });
    $(".login").click(function(){
        $(this).addClass('active');
        $(".signup").removeClass("active");
        $("#verify, #email").hide();
    });
    $(".error").hide();
});
