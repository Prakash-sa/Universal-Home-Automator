$("#sign").click(function(){

        var Username = $("#user").val().trim();
      var Password = $("#pass").val().trim();

      if(Username == "" || Password == ""){

      }else{
         $.ajax({
        url: "signin.php",
        type: "post",
        data: {
          user: Username,
          pass: Password
        } ,
        success: function (response) {
              
          if(response == "1"){
         window.location.href = ' http://rajhosting-com.stackstaging.com/IOT/ ' ;
          }else{
          
            var clause = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            
            $("#error").html(response + clause);
            $("#error").css("display","block");
          
          
          }
        }


    });
      }

      })