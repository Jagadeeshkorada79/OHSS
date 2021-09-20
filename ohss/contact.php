<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
  <style>
  	.modal {
  display: block; /* Hidden by default */
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
.modal-content {
  background-color: #fefefe;
  margin: 1% auto 1% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 40%; /* Could be more or less, depending on screen size */
}
  </style>
</head>
<body>
 <div class="modal">
   <div class="modal-content animate" style="border: 2px solid black;height: 450px;">
    <p>if u have any queries please contact:</p>
    <p>chiefwarden@rguktsklm.ac.in</p>
    <center><button onclick="goBack()" style="border: none; background-color: none;">Go Back</button></center>
  </div>
  </div>
 <script>
 	function goBack() {
 		window.history.back();
 	}
 </script>
</body>
</html>