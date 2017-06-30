<?php
include("inc/connection.inc.php");
session_start();
if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_SESSION['pH'])){
    
        $sql = "UPDATE Posts SET post_request = 1,statuss = 'Approved' WHERE post_header = '".$_SESSION['pH']."'";
        
        $result = mysqli_query($conn,$sql);
        
        if($result){
            echo "<script>alert('Post Approved');</script>";
            header("location:post_request.php");
        }
        else{
             echo "<script>alert('Post was not successfully approved');</script>";
        }
    }   
}


?>