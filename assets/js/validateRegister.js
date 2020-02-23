
    $(document).ready(function(){

    $('#submit').click(function(event)
    {    

        var username = $("#form_username").val();
        var email = $("#form_email").val();
        var password =$("#form_password").val();
        var ConiformPassword = $("#form_ConiformPassword").val();
        var gender = $("#form_gender").val();
        var phone = $("#form_phone").val();
        if(  username.length ===0 && email.length===0 && password.length===0 &&  
            ConiformPassword.length===0 && gender.length==0 && phone.length===0) {
            $("#username_error_message").html("username is Required");
            $("#username_error_message").show();
            $("#form_username").css("border-bottom","2px solid #F90A0A");
            error_username = true;

            $("#email_error_message").html("Email is Required");
            $("#email_error_message").show();
            $("#form_email").css("border-bottom","2px solid #F90A0A");
            error_email = true;

            $("#password_error_message").html("Passwords is Required");
            $("#password_error_message").show();
            $("#form_password").css("border-bottom","2px solid #F90A0A");
            error_password = true;

            $("#ConiformPassword_error_message").html(" Coniform Password is Required");
            $("#ConiformPassword_error_message").show();
            $("#form_ConiformPassword").css("border-bottom","2px solid #F90A0A");
            error_confirmpassword  = true;

            $("#gender_error_message").html("Gender is Required");
            $("#gender_error_message").show();
            $("#form_gender").css("border-bottom","2px solid #F90A0A");
            error_gender= true;

            $("#phone_error_message").html("phone is Required");
            $("#phone_error_message").show();
            $("#form_phone").css("border-bottom","2px solid #F90A0A");
            error_phone = true;
            event.preventDefault();
        }
        if( error_username === true || error_email === true || error_password === true 
            || error_confirmpassword === true || error_gender==true || error_phone === true){
                event.preventDefault();

        }
    });

    $(function(){
        $("#username_error_message").hide();
        $("#email_error_message").hide();
        $("#password_error_message").hide();
        $("#ConiformPassword_error_message").hide();
        $("#gender_error_message").hide();
        $("#phone_error_message").hide();

        var error_username = false;
        var error_email = false;
        var error_password = false;
        var error_confirmpassword = false;
        var error_gender = false;
        var error_phone = false;

        $("#form_username").focusout(function(){
            check_username();
        });
        $("#form_email").focusout(function(){
            check_email();
        });
        $("#form_password").focusout(function(){
            check_password();
        });
        $("#form_ConiformPassword").focusout(function(){
            check_ConiformPassword();
        });
        $("#form_gender").focusout(function(){
            check_gender();
        })
        $("#form_phone").focusout(function(){
            check_phone();
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
                event.preventDefault();
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

        function check_ConiformPassword(event){
            var password =$("#form_password").val();
            var ConiformPassword = $("#form_ConiformPassword").val();
            if(ConiformPassword.length===0){
                $("#ConiformPassword_error_message").html("Passwords is Required");
                $("#ConiformPassword_error_message").show();
                $("#form_ConiformPassword").css("border-bottom","2px solid #F90A0A");
                return error_confirmpassword  = true;
            }
            else if( password !== ConiformPassword){
                $("#ConiformPassword_error_message").html("Passwords Did not Matched");
                $("#ConiformPassword_error_message").show();
                $("#form_ConiformPassword").css("border-bottom","2px solid #F90A0A");
                return error_confirmpassword  = true;
            }
            else{
                $("#ConiformPassword_error_message").hide();
                $("#form_ConiformPassword").css("border-bottom","2px solid #34F458");
            }
        }
        
        function check_gender(){
            var gender =$("#form_gender").val();
            if( gender ==='Male' || gender == 'Female'){
                $("#gender_error_message").hide();
                $("#form_gender").css("border-bottom","2px solid #34F458");
            }
        }

        function check_email(event){
            var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/ ;
            var email =$("#form_email").val();
            if(pattern.test(email) && email !== ''){
                $("#email_error_message").hide();
                $("#form_email").css("border-bottom","2px solid #34F458");
            }else{
                $("#email_error_message").html("Invalid Email");
                $("#email_error_message").show();
                $("#form_email").css("border-bottom","2px solid #F90A0A");
                return error_email = true;
            }
        }
        function check_phone(event)
        {
            var pattern = /^[0-9]*$/;                     
            var phone = $("#form_phone").val();
            var phone_length = $("#form_phone").val().length;
            if(pattern.test(phone) &&  phone_length >=10){
                $("#phone_error_message").hide();
                $("#form_phone").css("border-bottom","2px solid #34F458");
            }else if(isNaN(phone)){
                $("#phone_error_message").html("Should contain only Number");
                $("#phone_error_message").show();
                $("#form_phone").css("border-bottom","2px solid #F90A0A");
                return error_phone = true;
            }else if (phone_length < 10){
                $("#phone_error_message").html("required 10 digits");
                $("#phone_error_message").show();
                $("#form_phone").css("border-bottom","2px solid #F90A0A");
                return error_phone = true;
            }
        }
       
    });

});