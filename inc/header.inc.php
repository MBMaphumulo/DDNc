<?php include ("connection.inc.php"); 
session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>DDN Concellor</title>

        <link type="text/css" rel="stylesheet" href="css/style.css" />

    </head>
    <body>
        <script src="js/main.js"></script>
        <script src="js/jquery.min.js"></script>
     <div class="headerMenu">
        <div id="wrapper">
            <div class="logo">
              <div class="MegaChart" style="color:White;font-size:20pt;font-family:impact;"> 
                  <?php
                    if(isset($_SESSION["user_login"]))
                    {  
                        echo '<div class="Usernamee"><img src="'.$_SESSION['pp'].'" alt="image" />'.$_SESSION["user_login"].'</div>';
                    } 
                   
                  ?><div class="siteName">DDN</div></div>  
            </div> 
            <div class="search_box" style="margin-right:10px;">
                <form action="search.php" method="POST" id="search">
                    <input  type="text" name="search_name" size="60" placeholder="Search ..." />
                </form>
            </div>
            <div id="menu" style="margin-left:10px;">
                <?php 
                if(isset($_SESSION["user_login"])){
                     echo'
                            <a href="log.php">LogOut</a>
                            <a href="account_settings.php">Account</a>
                            <a href="profile.php">Profile</a>
                            <a href="post_request.php">Post Requests</a>
                            <a href="Chats.php">Chats</a>
                        ';
                }
                else{
                    echo'
                            <a href="index.php">Sign In</a>
                            <a href="index.php">Sign Up</a>
                            <a href="about.php">About</a>
                        ';
                }
                ?>
                
                <a href="home.php" id="home">Home</a>
            </div>
        </div>
     </div>
    <div id="wrapper">
        <br/>
        <br/>