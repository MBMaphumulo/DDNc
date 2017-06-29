<?php 
include ("inc/connection.inc.php");
session_start();
$msgg = $_POST["msg"];
 
if($msgg != ""){
    
    $msg_sent_by = $_SESSION["user_login"];
    $user_msg_to =$_SESSION["userChrt"] ;
    $date = date("Y-m-d");
    $time = date("h:i:s:a");

    $sqlCommand = "INSERT INTO messages VALUES('','$msg_sent_by','$user_msg_to','$msgg','$date','$time')";
    $query = mysqli_query($conn,$sqlCommand) or die (mysqli_error("msg not sent"));
    header("location: Messages.php");
}
else{
    echo "You must enter something before you can send it ...";
}
?>
