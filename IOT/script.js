  
	  // utility function used in getting current time
	  
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
      
	  
      
    
      var params = [];
	  
	
     
      
      // Chart 1 code , using Chart.js javascript library
      
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

// function to update data in the chart

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
      
	  // requesting temperature data from Sensor
	  
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
 
 
        
         $.ajax({
    type : "GET",
           async:false,
    url : "https://io.adafruit.com/api/v2/SasaSaini/feeds/humidity?X-AIO-Key=d234a59c2c754a7f87be9052f8073018",
    success: function(result) {
      
      		params[1] = result["last_value"];
     // alert(params[3]);
        }
 });
        
       
        // calculation formula for other gases if needs to be used
		
   
       // var CO = new Decimal(662.938).times(new Decimal(params[2]).dividedBy(new Decimal(params[1])).toPower(new Decimal(-4.024))).toFixed(2) ;
       // var ethanol = new Decimal(75.310).times(new Decimal(params[2]).dividedBy(new Decimal(params[1])).toPower(new Decimal(-3.145))).toFixed(2) ;
       //var toluene = new Decimal(43.774).times(new Decimal(params[2]).dividedBy(new Decimal(params[1])).toPower(new Decimal(-3.429))).toFixed(2) ;
       //var acetone = new Decimal(33.119).times(new Decimal(params[2]).dividedBy(new Decimal(params[1])).toPower(new Decimal(-3.365))).toFixed(2) ;
      
      
      
      adddata(params[0],params[1]);
    
    })  
	
	// Code for chart 2
      
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
    
      // requesting resistance type 1 value 
      
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
    
	
	// requesting resistance type 2 value
	    
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
      
	  // ppm calculation for carbon dioxide and Ammonium , using Decimal.js for accurate floating point arithmetic
	  
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
        // change this value > 60 to get fire alarm value
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