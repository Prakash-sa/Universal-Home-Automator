<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <title>Hello, world!</title>

<style type="text/css">
  body{
        background:linear-gradient(
      rgba(0, 0, 0, 0.5),
      rgba(0, 0, 0, 0.5)
    ), url(home.png) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;          
          margin: 0;
          padding: 0;
        }

        #main{
          text-align: center;
          margin: 0 auto;
          margin-top: 225px;

        }

      .form-control{
        width: 250px;
        height: 40px;
      }

      input[type="text"] {
             display: block;
             margin : 0 auto;

        }

        input[type="password"] {
             display: block;
             margin : 0 auto;

        }

    h1{
      color: white;
      font-family: 'Dancing Script', cursive;
      font-size: 65px;
    }

    p{

      color: white;
      font-family:  cursive;
      font-size: 20px;

    }

    #user{
      position: relative;
      margin-top : 30px;
    }

    #sign{
      margin-top : 20px;
    }

  #error{
    
    margin-top : 30px;
    display : none ;
    width: 40%;
  }

</style>

  </head>
  <body>
    
   <div id="main">
     

    <h1>Universal Home Automator</h1>

    <p>Control your home from anywhere in the world!</p>

    <input type="text" name="text1" id="user" class="form-control" placeholder="Username..."  >
    
    <br> 

    <input type="password" name="text2" id="pass" class="form-control" placeholder="Password..."  >

    <button type="button" class="btn btn-success" id="sign" >Sign In</button>
	
   <center>  <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error">
  
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
       
     </div></center>
    
    
  </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <script
  src="http://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

    <script type="text/javascript">

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
      
      




    </script>


  </body>
</html>