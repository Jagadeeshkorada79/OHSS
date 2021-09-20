<!DOCTYPE html>
<html>
<head>
	<title>Sai</title>
	 <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no">
  <meta name="author" content="Eugenio Segala">
  <meta name="description" content="An extremely easy and clear SlideShow Background dev in Vanilla JS.">
  <meta name="skeywords" content="javascript,background-image,slides,slider,slideshow,gallery,js">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<style>
		   body {

      border: 2.1vh solid black;
      color: black;
      height: 100%;
      width: 100%;
    }
    p{
      color : black;
      background-color: white;
      border-radius:50%;
      margin:auto;
      margin-left:15px;
     }
     .title{
       font-size:50px;
       margin-top: 30px;
       color: white;
     }
    .ct {
      height: 80.8vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;

    }
    .avatar{
        vertical-align:middle;
        width:225px;
        height:225px;
        border-radius:50%;
        margin:auto;
        padding:20px;
    } 

   input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}
.container {
  padding: 16px;
}

span.password {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 1% auto 1% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 40%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.password {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
.error {
			background: #F2DEDE;
			color: #A94442;
			padding: 10px;
			width: 95%;
			border-radius: 5px;
		}
	</style>
</head>
<body>
	<center class="title">OHSS</center>
  <div id="id01" class="modal">
		<form action="login.php"  class="modal-content animate" method="post">
		 <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="ia.jpg" alt="Avatar" class="avatar">
    </div>
	<?php if (isset($_GET['error'])) { ?>
		<p class="error"><?php echo $_GET['error']; ?></p> 
		<?php } ?>
		<div class="container">
	<label for="uname" ><b>UserId</b></label>
      <input type="text" placeholder="Enter your Id" name="uname" ><br>
      <label for="password" ><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password"><br>
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
  </div>
  <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="password">Forgot <a href="forgot.php">password?</a></span>
    </div>
  </form></div>

<div id="id02" class="modal">
    <form action="logincf.php"  class="modal-content animate" method="post">
     <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="ia.jpg" alt="Avatar" class="avatar">
    </div>
  <?php if (isset($_GET['error'])) { ?>
    <p class="error"><?php echo $_GET['error']; ?></p> 
    <?php } ?>
    <div class="container">
  <label for="uname" ><b>UserId</b></label>
      <input type="text" placeholder="Enter Your Email" name="uname" ><br>
      <label for="password" ><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password"><br>
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
  </div>
  <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="password">Forgot <a href="forgotcf.php">password?</a></span>
    </div>
  </form></div>

<div id="id03" class="modal">
    <form action="loginw.php"  class="modal-content animate" method="post">
     <div class="imgcontainer">
      <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="ia.jpg" alt="Avatar" class="avatar">
    </div>
  <?php if (isset($_GET['error'])) { ?>
    <p class="error"><?php echo $_GET['error']; ?></p> 
    <?php } ?>
    <div class="container">
  <label for="uname" ><b>UserId</b></label>
      <input type="text" placeholder="Enter your Email" name="uname" ><br>
      <label for="password" ><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password"><br>
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
  </div>
  <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="password">Forgot <a href="forgotw.php">password?</a></span>
    </div>
  </form></div>

<div id="id04" class="modal">
    <form action="loginct.php"  class="modal-content animate" method="post">
     <div class="imgcontainer">
      <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="ia.jpg" alt="Avatar" class="avatar">
    </div>
  <?php if (isset($_GET['error'])) { ?>
    <p class="error"><?php echo $_GET['error']; ?></p> 
    <?php } ?>
    <div class="container">
  <label for="uname" ><b>UserId</b></label>
      <input type="text" placeholder="Enter Your Email" name="uname" ><br>
      <label for="password" ><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password"><br>
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
  </div>
  <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="password">Forgot <a href="forgotct.php">password?</a></span>
    </div>
  </form></div>

<div id="id05" class="modal">
    <form action="loginse.php"  class="modal-content animate" method="post">
     <div class="imgcontainer">
      <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="ia.jpg" alt="Avatar" class="avatar">
    </div>
  <?php if (isset($_GET['error'])) { ?>
    <p class="error"><?php echo $_GET['error']; ?></p> 
    <?php } ?>
    <div class="container">
  <label for="uname" ><b>UserId</b></label>
      <input type="text" placeholder="Enter Your Email" name="uname" ><br>
      <label for="password" ><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password"><br>
      <button type="submit">Login</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
  </div>
  <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id05').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="password">Forgot <a href="forgotse.php">password?</a></span>
    </div>
  </form></div>

  <div class="container ct">
    <div class="row">
        <figure><img src ="ia.jpg" alt="Avatar" class="avatar" onclick="document.getElementById('id01').style.display='block'"><figcaption><p>student</p></figcaption></figure>
        <figure><img src ="ia.jpg" alt="Avatar" class="avatar" onclick="document.getElementById('id02').style.display='block'"><figcaption><p>cheif warden</p></figcaption></figure>
        <figure><img src ="ia.jpg" alt="Avatar" class="avatar" onclick="document.getElementById('id03').style.display='block'"><figcaption><p>warden</p></figcaption></figure>
        <figure><img src ="ia.jpg" alt="Avatar" class="avatar" onclick="document.getElementById('id04').style.display='block'"><figcaption><p>care taker</p></figcaption></figure>
        <figure><img src ="ia.jpg" alt="Avatar" class="avatar" onclick="document.getElementById('id05').style.display='block'"><figcaption><p>security</p></figcaption></figure>

    </div>
  </div>
  <script>
    /*!-----------------------------------------------------------------------------
 * easy_background
 * v2.0 - built 2017-10-30
 * Licensed under the MIT License.
 * http://www.testersite.it/github/easy_background/v3/
 * ----------------------------------------------------------------------------
 * Copyright (C) 2017 Eugenio Segala
 * --------------------------------------------------------------------------*/

function easy_background(selector, sld_args) {

  function empty_img(x) {
    if (x) {
      return "<img src='" + x + "'>";
    } else {
      return "";
    }
  }

  //use object same as arrays in php {nameofindex:variable} inside object you can use arrays [value1,val2] (variable in object can be as array
  //var sld_args={i:["img/555.jpg","img/44.jpg","img/33.jpg","img/22.jpg","img/11.jpg","img/1.jpg","img/2.jpg","img/3.jpg","img/4.jpg","img/5.jpg"],d:[3000,3000,3000,3000,3000] };

  //if delay is empty or forgotten then use this default value
  var def_del = 3000;

  var p = document.createElement("div");
  p.innerPHP = " ";
  p.classList.add("easy_slider");

  document.body.insertBefore(p, document.body.firstChild);
  //switch all values in object -- objectname.index in you case sld_args is object and i is index of array which keep images (i). We use this function for fill div with img tags
  //and for insert delays into empty or forgotten places in object
  sld_args.slide.forEach(function(v, i) {
    if (v) {
      document.querySelector(".easy_slider").innerPHP += empty_img(v);
      if (typeof sld_args.delay[i] == 'undefined' || typeof sld_args.delay[i] == '' || sld_args.delay[i] == 0) {
        sld_args.delay[i] = def_del;
      }
    }

  });

  //add various style on selector
  document.querySelector(".easy_slider").style.display = "none";


  //add various style on selector
  document.querySelector(selector).style.backgroundSize = "cover";
  document.querySelector(selector).style.backgroundRepeat = "no-repeat";
  document.querySelector(selector).style.backgroundPosition = "center center";


  setTimeout(function() {
    //add various style on selector
    if (typeof sld_args.transition_timing === 'undefined') {
      sld_args.transition_timing = "ease-in";
    }
    if (typeof sld_args.transition_duration === 'undefined') {
      sld_args.transition_duration = 500;
    }
    var transition = "all " + sld_args.transition_duration + 'ms ' + sld_args.transition_timing;
    document.querySelector(selector).style.WebkitTransition = transition;
    document.querySelector(selector).style.MozTransition = transition;
    document.querySelector(selector).style.MsTransition = transition;
    document.querySelector(selector).style.OTransition = transition;
    document.querySelector(selector).style.transition = transition;
  }, 100);


  //this n is number of row  in object - if first row one function if more than 1 then other
  var n = 1;
  //li collection previous delays from previous slides
  var li = 0;

  function slider() {
    //switching all images one by one
    sld_args.slide.forEach(function(vvv, iii) {
      //here go all slides except first
      if (n > 1) {
        //set delay from collected number from previous slides
        var delay = li;
        setTimeout(function() {

          document.querySelector(selector).style.backgroundImage = "url('" + vvv + "')";

        }, delay); // >1
        //collecting delays from curent
        li = li + sld_args.delay[iii];

      } else { //this function for only  first slide

        //next row
        n++;
        //collect delay first time
        li = sld_args.delay[iii];

        document.querySelector(selector).style.backgroundImage = "url('" + vvv + "')";

      }

    });

  };

  slider();

  setInterval(function() { // REPEAT

    slider();
    //here used length of array of delays in object instead you tot_time variable
  }, sld_args.delay.length);

}

  </script>
  <script>
    easy_background("body",

      {
        slide: ["img/1.jpg", "img/2.jpg", "img/3.jpg", "img/4.jpg", "img/5.jpg"],

        delay: [4000, 4000, 4000, 4000, 4000]
      }
    );
  </script>
  <script>
      var modal = document.getElementById('id01');

     window.onclick = function(event) {
       if (event.target == modal) {
        modal.style.display = "none";
    } 
}
</script>
</body>
</html>