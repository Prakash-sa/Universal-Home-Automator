<?php

session_start();

if(!isset($_SESSION["user_id"])){

  header("Location: Login.php");

}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
	<link href="styles.css" rel="stylesheet">


    <title>IOT</title>
    
    
    
  </head>
  <body>
    
    <input type="hidden" id="hidden">
    
    <div class="bulbBox">

      
      <div class="shadow-lg">
        <h3 style="margin-top : 25px;"> Universal Switch </h3>
<div class="bulbIndicate">
<img id="myImage" src="pic_bulboff.gif">
</div><br>

<input type="checkbox" name="" style="margin-bottom : 15px;">
      </div>
</div>
    
    <div class="container">
      
      <div class="shadow-lg">
      <center> <h3 style="margin-top:25px;"> Room Temperature and Humidity </h3> </center>
      
      <canvas id="myChart" style="width: 50%;height: 50%;"></canvas>
      <br>
      <center><button class="btn btn-primary" type="button" id="add" style="margin-bottom : 15px;"> Update Feed </button></center>
      </div>
      <br><br>
      
      <div class="shadow-lg">
      <center> <h3 style="margin-top:25px;"> Room Air Quality </h3> </center>
      
      <canvas id="myChart2" style="width: 50%;height: 50%;"></canvas>
      <br>
      <center><button class="btn btn-success" type="button" id="add2" style="margin-bottom:15px;"> Update Feed </button></center>
      </div>
      <br><br>
      
      <div class="shadow-lg">
        <center> <h3 style="margin-top:25px;"> Slide ON to start Active Mode </h3> </center>
        
        <center><input type="checkbox"  data-toggle="toggle" data-onstyle="success" data-offstyle="danger" id="toggle-event"></center>
        
        <center><a href="logout.php" class="btn btn-warning" style="margin-top:20px; margin-bottom:20px;">Log Out</a></center>
      </div>
      <br> <br>
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
    <script src="decimal.js"></script>
    	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
	
	// project javascript
	
	<script src="script.js"></script>
    
    
    
  </body>
</html>