<?php
$showAlert=false;
$showError=false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
  include 'dbconn.php';
  $username=$_POST["username"];
  $email=$_POST["email"];
  $address=$_POST["address"];
  $phone=$_POST["phone"];
  $password=$_POST["password"];
  $cpassword=$_POST["cpassword"];

  

 $existSql="SELECT * FROM `signup` WHERE username='$username'";
 $result = mysqli_query($conn,$existSql);
 $numExistRows= mysqli_num_rows($result);
 if($numExistRows > 0){
   $showError ="Username Already Exists Please select another";
 }
  else{

     
      
     
         if($password==$cpassword){

         $sql="INSERT INTO `signup` ( `username`, `email`, `address`, `phone`, `password`, `cpassword`, `d&t`) VALUES ( '$username', '$email', '$address', '$phone', '$password', '$cpassword', current_timestamp())";
         $result=mysqli_query($conn,$sql);

            if($result){
          $showAlert=true;
      }
 }
 else{
           $showError="Password do not match";
     }
  }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up </title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   
<link rel="stylesheet" href="frontcss.css">

    <style>
  
         
      
        body {font-family: Arial, Helvetica, sans-serif;
         
      }
* {box-sizing: border-box;}

input[type=text], select, textarea {
   
  width: 100%;
  padding: 9px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 4px;
  margin-bottom: 10px;
  resize: vertical;
}
input[type=number] {
    width: 100%;
  padding: 9px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 4px;
  margin-bottom: 10px;
  
}



.color12 {
    
 
    background-color: #94b1ab;
    color:#1abc9c ;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    
  }



input[type=submit]:hover {
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
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

/* Style the submit button */
input[type=submit] {
  background-color:#343a40 ;
  color: white;
}
input[type=reset] {
  background-color:#343a40 ;
  color: white;
}
/* Style the container for inputs */
.container {
  background-color: #f1f1f1;
  padding: 20px;
  margin:auto
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

.cont1 {
    position: absolute;
    top: 2%;
    margin-left:30%;
    margin-right:30%;
   
}
     #heading{
         text-decoration: solid black;
         margin:auto
         
         


     }
  

  
    
      </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.html">Makemonney.com</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact1.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus1.html">About Us</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="help1.html">Help</a>
        </li>
        </ul>
        <li class="nav-item">
          <a class="btn btn-outline-success my-2 my-sm-0 " href="login.php" tabindex="-1" aria-disabled="true">Log In</a>
        </li>
       
      
    </div>
  </nav>
   
  <?php
    if($showAlert){
     echo ' <div class="cont1"><div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong> well!</strong> Your account is now created and you can login.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> </div>';
    }
     if($showError){
       echo '  <div class="cont1"><div class="alert alert-danger alert-dismissible fade show" role="alert">
       <strong> Oh!</strong> '.   $showError.'
       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div> </div>';
     }
     ?>
    <div  class="container">
      <form action="SIGNUP1.php" method="POST">
        <label for="username">User Name  </label>
        <input type="text" id="fname" name="username"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="Please choose a valide User id. For example Alpha123">
    
        
    
        <label for="email">Email id</label>
        <input type="text" id="email" name="email" placeholder="Email id">
        <label for="address">Address</label>
        <input type="text" id="address" name="address" placeholder="Enter your Address"
        <label for="emailid">Mobile No</label>
        <input type="text" id="number" name="phone"  pattern="(?=.*\d).{10,}" title="Must contain 10 Digit " required  placeholder="Enter Your Phone no..">

        
       <label for="pass"> Password</label>
          <input type="password" id="Pass" name="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="Please choose a strong password.  " >
          <label for="pass"> Conform Password</label>
          <input type="password" id="Pass" name="cpassword"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="Please choose a strong password.  " ><br>
        
        <div>Please read all term and condition <a href="#">t&c</a></div>
       
       
    <div class="color12">
        <input type="submit"  value="Submit">
        
        <input type="reset"  value="Clean">
    </div>
      </form>
    </div>
    <div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
<script>
   var myInput = document.getElementById("password");
  var myInput = document.getElementById("username");
  var myInput = document.getElementById("cpassword");

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

  
    
</body>
</html>