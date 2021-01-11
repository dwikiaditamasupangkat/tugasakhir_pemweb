const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});



$('document').ready(function()
    { 
         /* validation */
      $("#login-form").validate({
          rules:
       {
       password: {
       required: true,
       },
       username: {
                required: true,
                username: true
                },
        },
           messages:
        {
                password:{
                          required: "please enter your password"
                         },
                usernamr: "please enter your username",
           },
        submitHandler: submitForm 
           });  

       function submitForm()
       {  
       var data = $("#login-form").serialize();

       $.ajax({

       type : 'POST',
       url  : 'login.php',
       data : data,
       beforeSend: function()
       { 
        $("#error").fadeOut();
        $("#login").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
       },
       success :  function(response)
          {      
         if(response == "ok"){

          $("#login").html('<img src="https://github.com/maulayyacyber/phantom0308/raw/master/btn-ajax-loader.gif" />   login ...');
          setTimeout(' window.location.href = "dashboard.php"; ',4000);
         }
         else{

          $("#error").fadeIn(1000, function(){   

          $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span>   username atau password salah!.</div>');
               $("#login").html('<span class="glyphicon glyphicon-log-in"></span>   login');

           });
          }
         }
       });
        return false;
      }
    });
