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


    <title>IOT</title>
    
    <style>
      
      body{
		padding: 0;
		margin: 0;
		background-color: #333333;

	}

	.bulbBox{

		width: 600px;
		height: 400px;
		margin: 0 auto;
		text-align: center;
      	margin-top : 50px;
	}


.bulbIndicate{

	width: 500px;
	height: 200px;
	margin: 0 auto;
	

}

input[type="checkbox"]{
	position: relative;
	width: 120px;
	height: 40px;
	-webkit-appearance : none;
	background : linear-gradient(0deg,#333,#000);
	outline: none;
	border-radius: 20px;
	box-shadow: 0 0 0 4px #353535, 0 0 0 5px #3e3e3e, inset 0 0 10px rgba(0,0,0,1), 0 5px 20px rgba(0,0,0,.5), inset 0 0 15px rgba(0,0,0,.2);
}

input:checked[type="checkbox"]{
	background : linear-gradient(0deg,#6dd1ff,#20bf77);
	box-shadow: 0 0 2px #6dd1ff, 0 0 0 4px #353535, 0 0 0 5px #3e3e3e, inset 0 0 10px rgba(0,0,0,1), 0 5px 20px rgba(0,0,0,.5), inset 0 0 15px rgba(0,0,0,.2);
}

input[type="checkbox"]:before{
	content: '';
	position: absolute;
	top:0;
	left:0;
	width: 80px;
	height: 40px;
	background : linear-gradient(0deg,#000,#6b6b6b);
	border-radius: 20px;
	box-shadow: 0 0 0 1px #232323;
	transform: scale(.98,.96);
	transition: .5s;
}

input:checked[type="checkbox"]:before{
	left: 40px;

}

input[type="checkbox"]:after{
	content: '';
	position: absolute;
	top:calc(50% - 2px);
	left:65px;
	width: 4px;
	height: 4px;
	background : linear-gradient(0deg,#6b6b6b,#000);
	border-radius: 50%;
	
	transition: .5s;
}

input:checked[type="checkbox"]:after{
	background : #63cdff;
	left: 105px;
	box-shadow: 0 0 5px #13b3ff, 0 0 15px #13b3ff;
}

      h3{
       
        color : white;
        
      }
      
      
    </style>
    
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
    <script>
      
      $('#toggle-event').change(function() {
      if($(this).prop('checked')){
      // start active mode 
        
        
      
      }else{
      // stop active mode
         
      }
        
      })
      
      function addZero(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}
      
       $('input[type="checkbox"]').click(function(){

            if($(this).prop("checked") == true){
                document.getElementById('myImage').src='pic_bulbon.gif';
              
              // On the Bulb Code
              
              $.ajax({
    type : "POST",
    url : "https://maker.ifttt.com/trigger/roomoneon/with/key/ix-fKLDUNnHgDbU2wSbsUoLvHV7IVHaKuUnIgQiDt9d",
    success: function(result) {
          console.log(result);
        }
 });
              
              
              
            }
            else if($(this).prop("checked") == false){
                document.getElementById('myImage').src='pic_bulboff.gif';
              
              // Off the Bulb Code
              
              $.ajax({
    type : "POST",
    url : "https://maker.ifttt.com/trigger/roomoneoff/with/key/ix-fKLDUNnHgDbU2wSbsUoLvHV7IVHaKuUnIgQiDt9d",
    success: function(result) {
          console.log(result);
        }
                
            

});
            }
         
       });
      let x = 0 ;
      
    
      var params = [];
      
    /*  setInterval(function(){
        
        
        
      $.ajax({
    type : "GET",
        async:false,
    url : "https://io.adafruit.com/api/v2/SasaSaini/feeds/temperature?X-AIO-Key=949e69563ef8408c93581575e83b66a4",
    success: function(result) {
      	
      
      params[0] = result["last_value"];
    //  alert(params[0]);
          
        }
 });
        
        $.ajax({
    type : "GET",
          async:false,
    url : "https://io.adafruit.com/api/v2/SasaSaini/feeds/ro?X-AIO-Key=949e69563ef8408c93581575e83b66a4",
    success: function(result) {
      		
      params[1] = result["last_value"];
     // alert(params[1]);
        }
 });
        
         $.ajax({
    type : "GET",
           async:false,
    url : "https://io.adafruit.com/api/v2/SasaSaini/feeds/rs?X-AIO-Key=949e69563ef8408c93581575e83b66a4",
    success: function(result) {
      
      		params[2] = result["last_value"];
      // alert(params[2]);
        }
 });
        
         $.ajax({
    type : "GET",
           async:false,
    url : "https://io.adafruit.com/api/v2/SasaSaini/feeds/humidity?X-AIO-Key=949e69563ef8408c93581575e83b66a4",
    success: function(result) {
      
      		params[3] = result["last_value"];
     // alert(params[3]);
        }
 });
        
       
        
        var CO2 = new Decimal(114.354).times(new Decimal(params[2]).dividedBy(new Decimal(params[1])).toPower(new Decimal(-2.935))).toFixed(2) ;
        var CO = new Decimal(662.938).times(new Decimal(params[2]).dividedBy(new Decimal(params[1])).toPower(new Decimal(-4.024))).toFixed(2) ;
        var ethanol = new Decimal(75.310).times(new Decimal(params[2]).dividedBy(new Decimal(params[1])).toPower(new Decimal(-3.145))).toFixed(2) ;
        var NH4 = new Decimal(102.694).times(new Decimal(params[2]).dividedBy(new Decimal(params[1])).toPower(new Decimal(-2.488))).toFixed(2) ;
        var toluene = new Decimal(43.774).times(new Decimal(params[2]).dividedBy(new Decimal(params[1])).toPower(new Decimal(-3.429))).toFixed(2) ;
        var acetone = new Decimal(33.119).times(new Decimal(params[2]).dividedBy(new Decimal(params[1])).toPower(new Decimal(-3.365))).toFixed(2) ;
        
        
       // alert(CO2+" "+CO+" "+ethanol+" "+NH4+" "+toluene+" "+acetone);
      
       
      
      
                 },5000);*/
     
      
      
      
      var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    

    // The data for our dataset
    data: {
        labels: [0],
        datasets: [{
            label: 'Temperature',
           borderColor: '#FF6F8D',
          backgroundColor: '#FF6F8D',
           fill: false,
           
            data: [0]
        },
                   {
            label: 'Humidity',
           borderColor: '#36A2EB',
          backgroundColor: '#36A2EB',
           fill: false,
           
            data: [0]
        },
                   
        

        ]



    },

    // Configuration options go here
    options: {
legend: {
             labels: {
                  fontColor: 'white'
                 }
              },
      
        layout: {
            padding: {
                left: 50,
                right: 0,
                top: 0,
                bottom: 0
            }
        },
      scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    fontColor: 'white'
                },
                      scaleLabel:{
                      display : true,
                      labelString : 'degree Celsius , %age ',
                      fontColor: 'white'
                      }
            }],
          xAxes: [{
                ticks: {
                    fontColor: 'white'
                },
                      scaleLabel:{
                      display : true,
                      labelString : 'time ',
                      fontColor: 'white'
                      }
            }]
        }

    }
});

function adddata(temperature,humidity){
       x= x + 1;
        chart.data.datasets[0].data.push(temperature) ;
  
  var d = new Date();
  var h = addZero(d.getHours());
  var m = addZero(d.getMinutes());
  var s = addZero(d.getSeconds());
  
  		chart.data.datasets[1].data.push(humidity) ;
  
      chart.data.labels.push(h + ":" + m + ":" + s) ;
  
  
      chart.update();
    }
      
    $("#add").click(function(){
    
     $.ajax({
    type : "GET",
        async:false,
    url : "https://io.adafruit.com/api/v2/SasaSaini/feeds/temperature?X-AIO-Key=d234a59c2c754a7f87be9052f8073018",
    success: function(result) {
      	
      
      params[0] = result["last_value"];
    //  alert(params[0]);
          
        }
 });
        
    /*   $.ajax({
    type : "GET",
          async:false,
    url : "https://io.adafruit.com/api/v2/SasaSaini/feeds/ro?X-AIO-Key=949e69563ef8408c93581575e83b66a4",
    success: function(result) {
      		
      params[3] = result["last_value"];
     alert(params[3]);
        }
 });
        
         $.ajax({
    type : "GET",
           async:false,
    url : "https://io.adafruit.com/api/v2/SasaSaini/feeds/rs?X-AIO-Key=949e69563ef8408c93581575e83b66a4",
    success: function(result) {
      
      		params[4] = result["last_value"];
      alert(params[4]);
        }
 });*/
        
         $.ajax({
    type : "GET",
           async:false,
    url : "https://io.adafruit.com/api/v2/SasaSaini/feeds/humidity?X-AIO-Key=d234a59c2c754a7f87be9052f8073018",
    success: function(result) {
      
      		params[1] = result["last_value"];
     // alert(params[3]);
        }
 });
        
       
        
       // var CO2 = new Decimal(114.354).times(new Decimal(params[2]).dividedBy(new Decimal(params[1])).toPower(new Decimal(-2.935))).toFixed(2) ;
       // var CO = new Decimal(662.938).times(new Decimal(params[2]).dividedBy(new Decimal(params[1])).toPower(new Decimal(-4.024))).toFixed(2) ;
       // var ethanol = new Decimal(75.310).times(new Decimal(params[2]).dividedBy(new Decimal(params[1])).toPower(new Decimal(-3.145))).toFixed(2) ;
        //var NH4 = new Decimal(102.694).times(new Decimal(params[2]).dividedBy(new Decimal(params[1])).toPower(new Decimal(-2.488))).toFixed(2) ;
        //var toluene = new Decimal(43.774).times(new Decimal(params[2]).dividedBy(new Decimal(params[1])).toPower(new Decimal(-3.429))).toFixed(2) ;
        //var acetone = new Decimal(33.119).times(new Decimal(params[2]).dividedBy(new Decimal(params[1])).toPower(new Decimal(-3.365))).toFixed(2) ;
      
      
      
      adddata(params[0],params[1]);
    
    })  
      
   var ctx2 = document.getElementById('myChart2').getContext('2d');
var chart2 = new Chart(ctx2, {
    // The type of chart we want to create
    type: 'line',

    

    // The data for our dataset
    data: {
        labels: [0],
        datasets: [{
            label: 'CO2',
           borderColor: '#FFCE56',
          backgroundColor: '#FFCE56',
           fill: false,
           
            data: [0]
        },
                   {
            label: 'NH4',
           borderColor: '#ff56e0',
          backgroundColor: '#ff56e0',
           fill: false,
           
            data: [0]
        },
                   
        

        ]



    },

    // Configuration options go here
    options: {
legend: {
             labels: {
                  fontColor: 'white'
                 }
              },
      
        layout: {
            padding: {
                left: 50,
                right: 0,
                top: 0,
                bottom: 0
            }
        },
      scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true,
                    fontColor: 'white'
                },
                       scaleLabel:{
                      display : true,
                      labelString : ' ppm ',
                      fontColor: 'white'
                      }
            }],
          xAxes: [{
                ticks: {
                    fontColor: 'white'
                },
                       scaleLabel:{
                      display : true,
                      labelString : ' time ',
                      fontColor: 'white'
                      }
            }]
        }

    }
});   
    
      
      
      $("#add2").click(function(){
      var ro = 0 ;
      var rs = 0;  
       
        $.ajax({
    type : "GET",
          async:false,
    url : "https://io.adafruit.com/api/v2/SasaSaini/feeds/ro?X-AIO-Key=d234a59c2c754a7f87be9052f8073018",
    success: function(result) {
      		
      ro = result["last_value"];
         // alert(ro);
     // alert(params[1]);
        }
 });
        
         $.ajax({
    type : "GET",
           async:false,
    url : "https://io.adafruit.com/api/v2/SasaSaini/feeds/rs?X-AIO-Key=d234a59c2c754a7f87be9052f8073018",
    success: function(result) {
      
      		rs = result["last_value"];
          // alert(rs);
      // alert(params[2]);
        }
                
        
      
      })
      
         var CO2 = new Decimal(114.354).times(new Decimal(rs).dividedBy(new Decimal(ro)).toPower(new Decimal(-2.935))).toFixed(2) ;
        var NH4 =  new Decimal(102.694).times(new Decimal(rs).dividedBy(new Decimal(ro)).toPower(new Decimal(-2.488))).toFixed(2);
         adddata2(CO2,NH4);
         
      })
   function adddata2(co2,Nh4){
       
        chart2.data.datasets[0].data.push(co2) ;
  
  var d = new Date();
  var h = addZero(d.getHours());
  var m = addZero(d.getMinutes());
  var s = addZero(d.getSeconds());
  
  		chart2.data.datasets[1].data.push(Nh4) ;
  
      chart2.data.labels.push(h + ":" + m + ":" + s) ;
  
  
      chart2.update();
    }   
      
      
      // Alarm Function
      
      setInterval(function(){
      var temp = 0 ;
      $.ajax({
    type : "GET",
        async:false,
    url : "https://io.adafruit.com/api/v2/SasaSaini/feeds/temperature?X-AIO-Key=d234a59c2c754a7f87be9052f8073018",
    success: function(result) {
      	
      
      temp = result["last_value"];
    
          
        }
 });
        
        temp = 60;
        
        if(temp > 60){
          
           $.ajax({
    type : "POST",
    url : "https://maker.ifttt.com/trigger/tempgreater/with/key/ix-fKLDUNnHgDbU2wSbsUoLvHV7IVHaKuUnIgQiDt9d",
    success: function(result) {
          console.log(result);
        }
 });
          
        }
      
      
      },10000)
      
      
    </script>
    
    
  </body>
</html>