<?php



$servername="sql308.byetcluster.com";
$username="epiz_29140075";
$password="za0pS31jhjru";
$database="epiz_29140075_contact";

//creat a connection to database//
$conn=mysqli_connect($servername,$username,$password,$database);
if(!$conn){
    die("sorry db faild to connection".mysqli_connect_error());
}

?>