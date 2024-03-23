


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact to us </title>
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
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 3px;
  margin-bottom: 8px;
  resize: vertical;
}

input[type=submit] {
  background-color: #1abc9c;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
     
  

  
    
      </style>
</head>
<body>
<?PHP
 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $fname=$_POST['fname'];
    $lname=$_POST['lastname'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
  



    include 'dbconnect.php';
//creat a connection to database//
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("sorry db faild to connection".mysqli_connect_error());
}
else{

$sql="INSERT INTO `contact` ( `fname`, `lastname`, `email`, `subject`, `date and time`) VALUES ( '$fname', '$lname', '$email', '$subject', current_timestamp())";

$result=mysqli_query($conn,$sql);
if($result){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong> well!</strong> Your request have been sumitted.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>'; }
else {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong> Oh ho !</strong> We are facing some issue Please try after some time.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
}
}
  



?>
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
      
    

<div class="container"><h3>Contact Form</h3>
  <form action="contact1.php"  method="POST">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="fname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="email">Email id</label>
    <input type="text" id="email" name="email" placeholder="Email id">

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>
    
</body>
</html>
