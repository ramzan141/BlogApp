
<?PHP
session_start();
if(isset($_SESSION['logggedin']) || $_SESSION['loggedin']!=true){
  header("location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>request to pay out</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="css.css">
    <style>
         {box-sizing: border-box;}

  body {
font-family: Arial;
margin: 0;

}

input[type=reset]:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
input {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

input[type=submit] {
  background-color: #1abc9c;
  color: white;
} 
 

    /* Style the submit button 
input[type=submit] {
  background-color: #007bff;
  color: white;
  
  
}*/

/* Style the container for inputs */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin-top:8%;

}
   

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;
}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}


    </style>
</head>
<body>
  
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="firstpage.php">Makemonney</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
          <a class="nav-link" href="#"><?php print_r($_SESSION['username']); ?> <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="firstpage.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=""></a>
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Wallet
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Payable Money=<?php


include 'dbconnect.php';
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$username=$_SESSION["username"];
$sql = "SELECT * FROM `wallet` WHERE username='$username' ";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num==1){
  // output data of each row
  if($row = $result->fetch_assoc()) {
    echo "  ".$row["payable"]." <br>";
  }
} else {
  echo "0 ";
}
$conn->close();
?>₹</a>
            <a class="dropdown-item" href="#">Pending Money=<?php

include 'dbconnect.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$username=$_SESSION["username"];
$sql = "SELECT * FROM `wallet` WHERE username='$username' ";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num==1){
  // output data of each row
  if($row = $result->fetch_assoc()) {
    echo "  ".$row["pending"]." <br>";
  }
} else {
  echo "0 ";
}
$conn->close();
?> ₹ </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="rtp.php">Withdraw your money</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Fee
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="aznfee.php">Amazon.in</a>
            <a class="dropdown-item" href="flipkartfee.php">Flipkart.com</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="flipkartfee.php">Amazon.com</a>
          </div>
        </li>
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           About
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="help.php">Help</a>
            <a class="dropdown-item" href="aboutus.php">About Us</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="contact2.php">Contact to Us</a>
          </div>
        </li> </ul>
        <div class="form-inline my-2 my-lg-0">
        <li class="nav-item">
          <a class="btn btn-outline-danger my-2 my-lg-0"  href="logout.php" tabindex="-1" aria-disabled="true">Log out</a>
        </li>
      </ul>
     
    </div>
  </nav>
<?PHP
 
 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $uname=$_POST['uname'];
    $keyid=$_POST['keyid'];
    $gpay=$_POST['gpay'];
    $amount=$_POST['amount'];
    $password=$_POST['password'];
  


    $alpha=$_SESSION['username'];

    include 'dbconnect.php';
//creat a connection to database//
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("   
     Sorry we face some issue .");
}
else{ 
  
  
 
  $sql="INSERT INTO `ptr` ( `uname`, `keyid`, `gpay`, `amount`, `password`,  `Dt`) VALUES ('$uname', '$keyid', '$gpay', '$amount', '$password',  current_timestamp())";
  $result=mysqli_query($conn,$sql);
  if($result){
    $showAlert=true;

}
else{
echo 'hello';
$showAlert=false;
}

  
}

if($showAlert){


echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong> well!</strong> Your request is submitted.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   <span aria-hidden="true">&times;</span>
  </button>
  </div>';
   }
 
  else{

    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong> Oh!</strong> please try after some time.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
  }
}
?>

      <form action="rtp.php" method="POST">
        <div class="container">
        
    
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="text" class="form-control" id="uname" aria-describedby="emailHelp"
         id="emailHelp" name="uname" class="form-text text-muted" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="Please Enter a valide User id. For example Alpha123"> 
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Key Id</label>
          <input type="text" name="keyid" class="form-control" id="exampleInputPassword1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="Please enter a valide keyid For example pX34ghdw"> 
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Google Pay number</label>
          <input type="text" name="gpay" class="form-control" id="exampleInputPassword1" pattern="(?=.*\d).{10,}" title="Must contain 10 Digit " required  placeholder="Enter Your  Gpay  no.."> 
        <div class="form-group">
          <label for="exampleInputPassword1">Amount</label>
          <input type="text" name="amount" class="form-control" id="exampleInputPassword1" pattern="(?=.*\d).{3,}" title="Must contain 3 Digit " required  placeholder="min 500 ₹."  >
        </div>
        <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="Please enter a valide  password For example Ap157569"> 
        
          </div>
       
       
        <div >
        <input type="submit" value="Submit">
</div>
           </div>
       </div>
      </form>
      <script>
   var myInput = document.getElementById("uname");
  var myInput = document.getElementById("keyid");
  var myInput = document.getElementById("gpay");
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>


    
</body>
</html>