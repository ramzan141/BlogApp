
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
    <title>Transection record</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css" >
   
    <link rel="stylesheet" href="styel.css">
    <style>
body{
  font-family: Arial;
margin: 0;

}

.cont2{
  padding: 20px;
  margin-top: 5%;
  margin:5px;


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
            <a class="dropdown-item" href="#">Flipkart.com</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Amazon.com</a>
          </div>
        </li>
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           About
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Help</a>
            <a class="dropdown-item" href="#">About Us</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Contact to Us</a>
          </div>
        </li> </ul>
        <div class="form-inline my-2 my-lg-0">
        <li class="nav-item">
          <a class="btn btn-outline-danger my-2 my-lg-0"  href="logout.php" tabindex="-1" aria-disabled="true">Log out</a>
        </li>
      </ul>
     
    </div>
  </nav>
  <div class="cont2">
    <h2>Total product buy or claim to buy by  <?php print_r($_SESSION['username']); ?></h2><h6>upto 20 record only<h6>
   
   
    <?php
             


             include 'dbconnect.php';
             //creat a connection to database//
             $conn=mysqli_connect($servername,$username,$password,$database);
             if(!$conn){
                 die("sorry db faild to connection".mysqli_connect_error());
             }
             else{ 
               $alpha=$_SESSION["username"] ;
               
               $sql = "SELECT * FROM `product` WHERE username='$alpha' ORDER BY `s.no` DESC   LIMIT 20";
               
               $result=mysqli_query($conn,$sql);
             
               
           
               if ($result->num_rows > 0) {
               
                // output data of each row
                while($row = $result->fetch_assoc()) {
                 
                  echo "<ul><li>Your product (" . $row["product"]. ")   was " . $row["status"]." and cashback amount " . $row["cbamount"]."  will be added in your wallet  <br> <hr></li></ul>";
                
              }
              } else {
                echo "&nbsp&nbsp 0 product found";
              
              }
           
             }
  
     ?>
    
 


            </div>
  
    
</body>
</html>
