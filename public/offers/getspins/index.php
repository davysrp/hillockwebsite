<!DOCTYPE html>
<html lang="en">
<head>
  <title>Short Survey</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  

  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
      height: 90px;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 100%}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
		
  left: 0;
  bottom: 0;
  width: 100%;
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
        width:100%;
      }
      .row.content {height:auto;} 
    }
  </style>
  <style>
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
</style>
<style>
.button {
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
.bgimg-1 {
  background-image: url("coin.jpg");
  height: 100%;
  width: 100%;
}
</style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
            <a class="navbar-brand" href="#"><img src="coinmasterlogo.png" style="width:50px;height:50px;"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
       
        <li><a href="/contact.html">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  
  <div class="row content">
    <div class="col-sm-2 sidenav">
<script type="text/javascript">
	atOptions = {
		'key' : '9121782fa8e0c7b8af9ea3155331f01f',
		'format' : 'iframe',
		'height' : 250,
		'width' : 300,
		'params' : {}
	};
	document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.bestdisplayformats.com/9121782fa8e0c7b8af9ea3155331f01f/invoke.js"></scr' + 'ipt>');
</script>
	</div>
    <div class="col-sm-8 text-left"> 
     <center><img src="coinbanner.png" style="width:100%;height:auto;"></center>


<?php
session_start();
$Getsubid=$_GET['subid'];
$Gettype=$_GET['type'];
$q=$_GET['q'];
if ($q==""){
    $q=1;
}
//echo '<script>alert('.$q.');</script>';
$GetLevel=$_GET['level'];
if ($_SESSION['sessionlevel']==""){$_SESSION['sessionlevel']=$GetLevel;}
$level=$_SESSION['sessionlevel'];
  //  echo '<script>alert('.$q.');</script>';
  
  if ($q==1){
     echo' <center><h1>'.$q.'- How long have you been playing Coin Master?</h1></center>
<form name="radioForm">
<label class="container">Below on year
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">One - two years
  <input type="radio" name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">Two - three years
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">Over three years
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br/><br/><br/>
</form>
<center><button onclick="evalGroup(2,'.$Getsubid.','.$Gettype.')" class="button">Next</button></center>
<br/><br/><br/>
';    }
if ($q==2){
echo'<center><h1>'.$q.'- How old are you?</h1></center>
<form name="radioForm">
<label class="container">5 - 10 years
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">10 - 15 years
  <input type="radio" name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">15 - 20 years
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">Over 20 years
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br/><br/><br/>

</center><br>
</form>
<center><button onclick="evalGroup(3,'.$Getsubid.','.$Gettype.')" class="button">Next</button></center>
<br/><br/><br/>
';    }
if ($q==3){
     echo' <center><h1>'.$q.'. What device do you always play games on?</h1></center>
<form name="radioForm">
<label class="container">Personal Computer (Window/Mac)
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">iOS
  <input type="radio" name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">Android
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">Other
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br/><br/><br/>

</center><br>
</form>
<center><button onclick="evalGroup(4,'.$Getsubid.','.$Gettype.')" class="button">Next</button></center>
<br/><br/><br/>
';    }
if ($q==4){
     echo' <center><h1>'.$q.'. How many hours do you spend on games per day?</h1></center>
<form name="radioForm">
<label class="container">Below 1 hour
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">1 - 2 hours
  <input type="radio" name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">2 - 5 hours
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">Over 5 hours
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br/><br/><br/>

</center><br>
</form>';

echo '<center><button onclick="evalGroup(5,'.$Getsubid.','.$Gettype.')" class="button">Next</button></center>';

echo '<br/><br/><br/>
';    }
if ($q==5){
     echo' <center><h1>'.$q.'. Please confirm your gender:</h1></center>
<form name="radioForm">
<label class="container">Male
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">Female
  <input type="radio" name="myRadio">
  <span class="checkmark"></span>
</label>
<br/><br/><br/>

</center><br>
</form>
<center><button onclick="evalGroup(6,'.$Getsubid.','.$Gettype.')" class="button">Next</button></center>
<br/><br/><br/>
';    }
if ($q==6){
     echo' <center><h1>'.$q.'. Where are you from?</h1></center>
<form name="radioForm">
<label class="container">Europe
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">America
  <input type="radio" name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">Africa
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">Others
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br/><br/><br/>

</center><br>
</form>
<center><button onclick="evalGroup(7,'.$Getsubid.','.$Gettype.')" class="button">Next</button></center>
<br/><br/><br/>
';    }
if ($q==7){
     echo' <center><h1>'.$q.'. What language do you use?</h1></center>
<form name="radioForm">
<label class="container">English (US)
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">English (UK)
  <input type="radio" name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">Chinese
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">Others
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br/><br/><br/>

</center><br>
</form>
<center><button onclick="evalGroup(8,'.$Getsubid.','.$Gettype.')" class="button">Next</button></center>
<br/><br/><br/>
';    }
if ($q==8){
     echo' <center><h1>'.$q.'. How did you find us?</h1></center>
<form name="radioForm">
<label class="container">Facebook
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">Instagram
  <input type="radio" name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">Twitter
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">Others
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br/><br/><br/>

</center><br>
</form>
<center><button onclick="evalGroup(9,'.$Getsubid.','.$Gettype.')" class="button">Next</button></center>
<br/><br/><br/>
';    }

if ($q==9){
     echo' <center><h1>'.$q.'. Do you want to play other similar games?</h1></center>
<form name="radioForm">
<label class="container">Yes
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">No
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br/><br/><br/>

</center><br>
</form>
<center><button onclick="evalGroup(10,'.$Getsubid.','.$Gettype.')" class="button">Next</button></center>
<br/><br/><br/>
';    }
if ($q==10){
    
     echo'<center><h1>'.$q.'. Why do you like playing games</h1></center>
<form name="radioForm">
<label class="container">For relaxing
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">For fun
  <input type="radio" name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">For competition
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br />
<label class="container">Other
  <input type="radio"  name="myRadio">
  <span class="checkmark"></span>
</label>
<br/><br/><br/>

</center><br>
</form>
<center><button onclick="evalGroup(11,'.$Getsubid.','.$Gettype.')" class="button">Finish</button></center>
';
echo '<br/><br/><br/>
';    }
 
?>
    </div>
    <div class="col-sm-2 sidenav">
<script type="text/javascript">
	atOptions = {
		'key' : '9121782fa8e0c7b8af9ea3155331f01f',
		'format' : 'iframe',
		'height' : 250,
		'width' : 300,
		'params' : {}
	};
	document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.bestdisplayformats.com/9121782fa8e0c7b8af9ea3155331f01f/invoke.js"></scr' + 'ipt>');
</script>
      </div>
      
    </div>
  </div>
</div>
<center><script type="text/javascript">
	atOptions = {
		'key' : '5893677dbfb8f0325013dc76be797e8e',
		'format' : 'iframe',
		'height' : 90,
		'width' : 728,
		'params' : {}
	};
	document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.bestdisplayformats.com/5893677dbfb8f0325013dc76be797e8e/invoke.js"></scr' + 'ipt>');
</script></center>
<footer class="container-fluid text-center">
Short Survey 
</footer>
   <script>
function evalGroup(pages,subid,type)
{
var group = document.radioForm.myRadio;
     
for (var i=0; i<group.length; i++) {  
if (group[i].checked){
    //start from 1
if(pages==11){
     window.location.href = "https://cpbldi.com/23b348b";
break;
    }
    //start from 10
    else if(pages==20){
break;
//start from 21
    }else if(pages==28){
break;
    }
    //start from 29
    else if(pages==35){
break;
    }
    //start from 36
    else if(pages==45){
break;
//start from 46
    }else if(pages==55){
        
break;
    }
    //start from 56
    else if(pages==65){
         
break;
    }
        //start day 2 - 1  from 66
    else if(pages==75){
        
break;
    }
           //start day 2   from 76
    else if(pages==85){
      
break;
    }
     //start day 2   from 86
    else if(pages==95){
          
break;
    }
     //start day 2   from 96
    else if(pages==105){
      
break;
    }
        //start day 3 - 1  from 106
    else if(pages==115){
          
break;
    }
            //start day 3  from 116
    else if(pages==125){
           
break;
    }      
    //start day 3   from 126
    else if(pages==135){
           
break;
    }
    //start day 3   from 136
    else if(pages==145){
           
break;
    }
        //start day 4   from 146
    else if(pages==155){
           
break;
    }
            //start day 4   from 156
    else if(pages==165){
       
break;
    }
            //start day 4   from 166
    else if(pages==175){
         
break;
    }
            //start day 4   from 176
    else if(pages==185){
   
break;
    }
        //start day 5   from 186
    else if(pages==195){
          
break;
    }
            //start day 5   from 196
    else if(pages==205){
        
break;
    }
     //start day 6   from 206
    else if(pages==215){
        
break;
    }
     //start day 7   from 216
    else if(pages==225){
         
break;
    }
    //start day 8   from 226
    else if(pages==235){
         
break;
    }
    //start day 9   from 236
    else if(pages==245){
            
break;
    }
    
    
    
    
    
    
    
    else{
         location.replace("index.php?q="+pages+"&subid="+subid+"&type="+type)
break;
}

}

}
if (i==group.length){
return alert("This question was not answered entirely. Please review and complete your answer.");
}
}
</script>


</body>
</html>
