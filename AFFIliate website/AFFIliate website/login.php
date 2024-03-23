











<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<link rel="stylesheet" href="bodycss.css" >
<style>
 .row1 {  
display: flex;
flex-wrap: wrap;
}
/* Column container */


/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
/* Main column */
/* Main column */
.side1 {
   flex:50%;
   padding: 10px;

   
   }
.main1 {
flex: 50%;


padding: 20px;
}



/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
.row1 {   
flex-direction: column;
}
}

</style>
</head>

<body>

<div class="bg">
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
          <a class="btn btn-outline-success my-2 my-sm-0 " href="SIGNUP1.php" tabindex="-1" aria-disabled="true">Sign Up</a>
        </li>
    </div>
  </nav>
  <?php
$login="false";
$showError="false";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
  include 'dbconn.php';
  $username=$_POST["username"];
  $password=$_POST["Password"];


  $sql="SELECT * FROM `signup` WHERE username='$username' AND password='$password' ";
   $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
  if($num==1){
    $login=true;
    session_start();
    $_SESSION['loggedin']=true;
    $_SESSION['username']=$username;
    header("location: firstpage.php");
  }
  else{
    if($showError){
      $showError="Invalid Credentials";
      echo '  <div class="cont1"><div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong> Oh!</strong> '.   $showError.'
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div> </div>';
    }
   
  }
  }



?>
 <div class="row1">
 <div class="side1"> </div>
   <div class="main1">
  
   <div class="jumbotron">

    <form action="login.php" method="POST">
        
          
        <div class="form-group">
          <label for="exampleInputEmail1"><h4>Username</h4></label>
          <input type="text" class="form-control" id="uname" aria-describedby="emailHelp"
         id="emailHelp" name="username" class="form-text text-muted" placeholder="Don't share your Username with anyone else.">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1"><h4>Password</h4></label>
          <input type="password" name="Password" class="form-control" id="exampleInputPassword1" placeholder="Don't share your Password with anyone else."  >
        </div>
        <div >
        
        <button type="submit" class="btn btn-success">Submit</button>
</div >
      </form>
</div>
</div>

</div>
</div>
</body>
</html>