
<?php
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
    <title>fee</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css" >
    <style>
         body {font-family: Arial, Helvetica, sans-serif;
        
       }
* {box-sizing: border-box;}






  body {
font-family: Arial;
margin: 0;
;
}

/* Style the container for inputs */
.container {
  background-color: #f1f1f1;
  padding: 20px;
  margin:auto
}
.icon-bar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

.icon-bar a {
  float: left;
  width: 18%;
  text-align: center;
  padding: 12px 0;
  transition: all 0.3s ease;
  color: white;
  font-size: 36px;
  text-decoration: none;
}

.icon-bar a:hover {
  background-color: #000;
}

.active {
  background-color: #4CAF50;
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
    
    <div class="container" >
        <p>        <h2>TABLE 1- Fixed cashback for Specific Product Categories </h2>
            Product Category 
             Apparel & Accessories | Luggage & Bags | Watches Shoes----------------------------------------------------------------->4.0%<br>
             Toys & Baby Products | Home | Kitchen Appliances | Kitchen & Housewares------------------------------------------------>4.0%<br>
             Sports, Fitness & Outdoors | DIY & Tools------------------------------------------------------------------------------->4.0%<br>
            Books | Grocery & Gourmet | Pantry | Office & Stationery---------------------------------------------------------------->3.5%<br>
            Health, Beauty & Personal care | Personal Care Appliances -------------------------------------------------------------->3.5%<br>
            Jewellery (Excluding silver & Gold coins) | Car, Motorbike, Industrial & Scientific Products | Musical Instruments------>3.5%<br>
             Large Appliances | Movies | Music | Software | Video Games ------------------------------------------------------------>2.5%<br>
            Televisions | Computers |Consumer Electronics & Accessories (excl. Data Storage Devices) | Mobile Accessories ---------->2.0%<br>
             Mobile Phones*| Bicycles & Heavy Gym Equipment | Tyres & Rims Data Storage Devices------------------------------------->1.0%<br>
            Gold & Silver Coins----------------------------------------------------------------------------------------------------->.01%<br>
             All Other Categories (Furniturel Kindle devices & E-books| Fire TV stick & other Amazon devices | Others)-------------->4.5%<br>
             <h2>NEW: Mobile Phones at 0.5% Cashback </h2><br>
            1) OnePlus: 8, 8Pro, 7T Pro, 7T Pro McLaren, 7T, 7 Pro <br>
            2) Samsung: S10 <br>
            3) OPPO: Find X2, X2 Pro <br>
            Excluded Products: Limitations on cashback for Certain Products <br>
           <h2>You will not receive any cashback from Qualifying Purchases of the following products:</h2> <br>
            1) Flight Bookings, Gift Cards, Bill Payments & Recharges <br>
            2) Video Gaming Consoles & Hardware <br>
            3) Prime Membership <br>
            4) Amazon Pay Balance <br>
            5) Xiaomi: Redmi Note 8, Redmi Note 8 Pro, Redmi Note 9 Pro, Redmi Note 9 Pro Max, Redmi 8A Dual, <br>
               Redmi Note 9, Redmi 9 Prime, Redmi 9, Redmi 9A <br>
            6) OnePlus Nord <br>
            7) Samsung: M31, M21, M31s <br>
            8) Honor 9A <br>
            9) Apple: All iPhones SPECIAL PROGRAM <br>
            </p>
    </div>
    
</body>
</html>