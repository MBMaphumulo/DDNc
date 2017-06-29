<?php include("inc/header.inc.php");

if(isset($_SESSION["user_login"])){
    $user = $_SESSION["user_login"];

 mysqli_query($conn,"UPDATE userss set active = '0'  
                            WHERE `username` = '$user' LIMIT 1");
                            
 header("location:logout.php");
}
else{
        echo '
            <div class="container">
<center><div style="font-weight:bold;font-size:50px;color:red;">404</div>
<hr style="border-bottom: 1px solid grey;"/>
<p><h2 style="color:black;">Sorry but were expriencingtechnical problems. Please try again </h2></p>
</center>
</div>

    ';
}
?>
