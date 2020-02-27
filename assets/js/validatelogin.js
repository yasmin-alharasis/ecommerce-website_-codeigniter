
$(document).ready(function(){
    
    $('#submit').click(function(event)
    {    
        var username = $("#form_username").val();
        var password =$("#form_password").val();
        var captcha = $("#form_userCaptcha").val();
        if(  username.length ===0 && password.length===0 && captcha.length ===0) {
            $("#username_error_message").html("username is Required");
            $("#username_error_message").show();
            $("#form_username").css("border-bottom","2px solid #F90A0A");
            error_username = true;

            $("#password_error_message").html("Passwords is Required");
            $("#password_error_message").show();
            $("#form_password").css("border-bottom","2px solid #F90A0A");
            error_password = true;

            $("#captcha_error_message").html("feild is Required");
            $("#captcha_error_message").show();
            $("#form_userCaptcha").css("border-bottom","2px solid #F90A0A");
            error_captcha = true;

            event.preventDefault();
        }
        if( error_username === true || error_password === true || error_captcha === true){
                event.preventDefault();
        }
    });
    $(function(){
        $("#username_error_message").hide();
        $("#password_error_message").hide();
        $("#captcha_error_message").hide();
        var error_username = false;
        var error_password = false;
        var error_captcha = false;

        $("#form_username").focusout(function(){
            check_username();
        });

        $("#form_password").focusout(function(){
            check_password();
        });

        $("#form_userCaptcha").focusout(function(){
            check_userCaptcha();
        });


        function check_username(event){
            var pattern = /^[a-zA-Z]*$/;
            var username = $("#form_username").val()
            if(pattern.test(username)&& username !== ''){
                $("#username_error_message").hide();
                $("#form_username").css("border-bottom","2px solid #34F458");
            }else{
                $("#username_error_message").html("Should contain only Characters");
                $("#username_error_message").show();
                $("#form_username").css("border-bottom","2px solid #F90A0A");
                return error_username = true;
            }
        }

        function check_password(event){
            var password_length = $("#form_password").val().length;
            if( password_length < 5){
                $("#password_error_message").html("At least 5 Characters");
                $("#password_error_message").show();
                $("#form_password").css("border-bottom","2px solid #F90A0A");
                return error_password = true;
            }else{
                $("#password_error_message").hide();
                $("#form_password").css("border-bottom","2px solid #34F458");
            }
        }

        function check_userCaptcha(event){
            var userCaptcha = $("#form_userCaptcha").val().length;
            if( userCaptcha > 0){
                $("#captcha_error_message").hide();
                $("#form_userCaptcha").css("border-bottom","2px solid #34F458");
                return error_captcha = false;
            }
        }

    });
});
   