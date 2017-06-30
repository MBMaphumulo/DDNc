<?php
include ("inc/header.inc.php");
if(!isset($_SESSION["user_login"])){
          echo '
            <div class="container">
<center><div style="font-weight:bold;font-size:50px;color:red;">404</div>
<hr style="border-bottom: 1px solid grey;"/>
<p><h2 style="color:black;">Sorry but were expriencingtechnical problems. Please try again </h2></p>
</center>
</div>

    ';exit();
}
echo "<h2>Hello, ".$_SESSION["user_login"]."</h2>";
include("pageLinks.php");
?>
<div style="clear:both;width:100%;margin:0;padding:20px 10px 0 10px;height:100%;" class="profilePosts">
<?php
     $getposts = mysqli_query($conn,"SELECT * 
                                FROM postss
                                        ORDER BY id DESC LIMIT 10");
    
    while($row = mysqli_fetch_assoc($getposts)){
        $id = $row['id'];
        $body = $row['body'];
        $date_added = $row['date_added'];
        $added_by = $row['added_by'];

        echo '
                  <div class="posted_by">
                    '.$added_by.' --
                      </div> <div class=""> '.$body.'<br/> time - '.$date_added.' </div></p><hr style="border-bottom:1px solid skyblue;"/>
               
            ';
    }
?>



</div>
</div><!--closing the mainDiv from Header-->
<?php include("../DDN/inc/overall/footer.php");?>