$( document ).ready(function() {
    $('.reg_btn').on('click', function(event){ 

        function isFormValid(){
            var flag = true;
            var firstName = $('.reg_first_name').val();
            var surname = $('.reg_surname').val();
            var email = $('.reg_email').val();
            var password = $('.reg_password').val();
            var confirmPassword = $('.reg_confirm_password').val();

            if(firstName.length < 2 || firstName.length > 20){
                alert("Некорректная длина имени (< 2 или > 20)");
                flag = false;
            }

            if(surname.length < 2 || surname.length > 20){
                alert("Некорректная длина фамилии (< 2 или > 20)");
                flag = false;
            }

            if(email.length < 5 || email.length > 30){
                alert("Некорректная длина почты (< 5 или > 30)");
                flag = false;
            }

            if(password.length < 5 || password.length > 20){
                alert("Некорректная длина пароля (< 5 или > 20)");
                flag = false;
            }

            if(confirmPassword.length < 5 || confirmPassword.length > 20){
                alert("Некорректная длина подтверждения пароля (< 5 или > 20)");
                flag = false;
            }

            if(password != confirmPassword){
                alert("Пароли не совпадают");
                flag = false;
            }

            return flag;
        }

        if(isFormValid() === false){
            event.preventDefault();
        } 
    })

    $('.auth_btn').on('click', function(event){ 

        function isFormValid(){
            var flag = true;
            var email = $('.auth_email').val();
            var password = $('.auth_password').val();

            if(email.length < 5 || email.length > 30){
                alert("Некорректная длина почты (< 5 или > 30)");
                flag = false;
            }

            if(password.length < 5 || password.length > 20){
                alert("Некорректная длина пароля (< 5 или > 20)");
                flag = false;
            }

            return flag;
        }

        if(isFormValid() === false){
            event.preventDefault();
        } 
    })    
})