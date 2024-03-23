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
    <title>your page </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
       
   <link rel="stylesheet" href="styel.css">
</head>   
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Makemonney</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      
        <li class="nav-item ">
          <a class="nav-link" href="firstpage.php">Home <span class="sr-only">(current)</span></a>
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
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Submit product Details
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="productpage.php">Submit product Details </a>
            
          </div>
        </li>
      

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Payout Status
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">
              <?php
             


             include 'dbconnect.php';
             //creat a connection to database//
             $conn=mysqli_connect($servername,$username,$password,$database);
             if(!$conn){
                 die("sorry db faild to connection".mysqli_connect_error());
             }
             else{ 
               $alpha=$_SESSION["username"] ;
               
               $sql = "SELECT * FROM `ptr` WHERE uname='$alpha' ORDER BY `s.no` DESC   LIMIT 5";
               $result=mysqli_query($conn,$sql);
             
               
           
               if ($result->num_rows > 0) {
               
                // output data of each row
                while($row = $result->fetch_assoc()) {
                 
                  echo "<ul><li >Your request of " . $row["amount"]. " ₹  was " . $row["upd"].  " <br> <hr></li></ul>";
                
              }
              } else {
                echo "0 results";
              }
           
             }
  
     ?></a>
            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="tran.php">More transaction  record</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Product claim by you 
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
             

             include 'dbconnect.php';
             //creat a connection to database//
             $conn=mysqli_connect($servername,$username,$password,$database);
             if(!$conn){
                 die("sorry db faild to connection".mysqli_connect_error());
             }
             else{ 
               $alpha=$_SESSION["username"] ;
               
               $sql = "SELECT * FROM `product` WHERE username='$alpha' ORDER BY `s.no` DESC   LIMIT 5";
               
               $result=mysqli_query($conn,$sql);
             
               
           
               if ($result->num_rows > 0) {
               
                // output data of each row
                while($row = $result->fetch_assoc()) {
                 
                  echo "<ul><li>Your product (" . $row["product"]. ")   was " . $row["status"]." and cashback amount " . $row["cbamount"]."   <br> <hr></li></ul>";
                
              }
              } else {
                echo "0 product found";
              }
           
             }
  
     ?>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="moreproduct.php">More product</a>
            
          </div>
          
        </li> </ul>
        
        <div class="form-inline my-2 my-lg-0">
        <li class="nav-item">
          <a class="btn btn-outline-danger my-2 my-lg-0"  href="logout.php" tabindex="-1" aria-disabled="true">Log out</a>
        </li>
      
        
</div>
      
    </div>
  </nav>



  <!-- Header -->
  
 
  <div class="header1"><p>
  <h1> <b>Makemonney </b></h1>
    
  
 <b>Earn </b> from your purchase</p></div>


<div class="row1">

    




  <div class="main1">
 <div class="ct" > <h2  >  <a href="https://thelittleshop.rf.gd/searchpage.html" >Amazon.In </a></h2></div>
    <h5>Click on image to shop with Amazon.In</h5>
    <div class="fakeimg1" style="height:200px;"> <a href="https://thelittleshop.rf.gd/searchpage.html"><img src="abc.png" alt="click here to shop with Amazon.in"></a></div>
    <p>important</p>
    <p>click on image to get best deals from amazon.in here you can earn upto 8% cashback from us through the link above. Click <a href="aznfee.php"> here </a>to know about the cashback rate of each product.</p>
</div>
<div class="side1">
    <h2>Amazon.Com</h2>
    <h5>click on image to shop with Amazon.Com</h5>
    <div class="fakeimg1" style="height:200px;"><a href="amzproductpage.php"><img src="abc.png" alt="click here to shop with Amazon.com"></a></div>
    <p>important</p>
    <p>click on image to get best deals from amazon.in here you can earn upto 4.5% cashback from us through the link above. Click <a href="amazoncomfee.php"> here </a>to know about the cashback rate of each product.</p>
  </div>
  <div class="side2">
    <h2>Flipkart</h2>
    <h5>we are working ....</h5>
    <div class="fakeimg1" style="height:200px;"><a href="#"><img src="flipkart.jpg" alt="click here to shop with flipkart.com"></a></div>
    <p>Some text..</p>
    <p>You will be able to get cashback from us very soon from Flipkart too.<br>
  Till the time stay tuned.</p>
  </div>
</div>



</body>
</html>
