<?php 
include ("inc/connection.inc.php");
session_start();
$post = $_POST["post"];
if($post != ""){
    $date_added = date("Y-m-d");
    $added_by = $_SESSION["user_login"];

    $sqlCommand = "INSERT INTO postss VALUES('','$post','$date_added','$added_by')";
    $query = mysqli_query($conn,$sqlCommand) or die (mysqli_error("Post not added"));
    header("location: profile.php");
}
else{
    echo "You must enter something in the post field before you can send it ...";
}
?>