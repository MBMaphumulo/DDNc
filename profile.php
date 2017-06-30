<?php include("inc/header.inc.php");?>
<?php
if(!isset($_SESSION["user_login"])){
     header("location: index.php");
     exit();
}

if(isset($_SESSION['user_login'])){
    $username = mysqli_real_escape_string($conn,$_SESSION['user_login']);
    if(ctype_alnum($username)){
        $check = mysqli_query($conn,"SELECT boi,profile_pic 
                                    FROM userss
                                        WHERE username = '$username'");
        if(mysqli_num_rows($check) === 1){
            $get = mysqli_fetch_assoc($check);
            
            $boi = $get['boi'];
            $pp = $get['profile_pic'];
        }
        else{
            echo "<h2>User doesn't exists! </h2>";
            exit();
        }
    }
}

if(isset($_POST["userChrt"])){
     $_SESSION["userChrt"] = $_POST["userChrt"];
    header("Location:Messages.php");
}

?>
<div class="postForm">
    <form>
         <textarea id="post" name="post" style="margin: 0px;width: 676px;height: 69px;" placeholder="What's is happening?..." required=""></textarea>
        <input type="submit" onclick="javascript:send_post()" name="send" value="POST" class="btnPost" />
    </form> 
</div>
 
<div class="profilePosts">
    <div id="status"></div>
<?php
     $getposts = mysqli_query($conn,"SELECT * 
                                FROM postss
                                     WHERE added_by = '$username' 
                                        ORDER BY id DESC LIMIT 10");
    
    while($row = mysqli_fetch_assoc($getposts)){
        $id = $row['id'];
        $body = $row['body'];
        $date_added = $row['date_added'];
        $added_by = $row['added_by'];
        
        echo '<p><div class="posted_by">
                     '.$date_added.' > 
             </div> <div class=""> '.$body.'</div></p><hr/>
            ';
    }
?>
</div>
<img style="padding-bottom:5px;" src="<?php echo $pp;?>" height="250" width="200" alt="<?php echo $username; ?>" title="<?php $username;?>'s Profile" /> 
<br/>
<div class="textHeader"><b><?php echo $username;?>'s Profile</b></div>
<div class="profileLeftSideContect"><?php echo $boi;?></div>
<div class="textHeader"><b>Members</b></div>     
<div style="height:10px;" class="profileLeftSideContect">

<?php 

if(isset($_SESSION["user_login"])){
        $sql = mysqli_query($conn,"SELECT * 
                            FROM userss 
                               ORDER BY ACTIVE DESC
                             ");
    
    $userCount = mysqli_num_rows($sql);
    
        while($row = mysqli_fetch_assoc($sql)){
            
            $fname = $row["first_name"];
            $lname = $row["last_name"];
            $userna = $row["username"];
            $profilePic = $row["profile_pic"];
            $active = $row["active"];
            if($active == 1){$results = "online";}else{ $results = "offline";}
            if($userna == $_SESSION["user_login"]){}
            else{
                
                if($active == 1){
                    $results = "online";
                      echo'<hr style="background-color: black;height: 1px;border: 0;margin:5px;"/>
            <label><div class="chrt">
            <form action="profile.php" method="POST">
            <div style="text-align:right;color:lime;font-weight:900;margin-bottom:-17px;margin-right:20px;">'.$results.'</div>
                <table>
                    <tr><td rowspan="2"><img style="border-radius:50%;" src="'.$profilePic.'" height="50" width="40"/>      </td><td><input type="submit" id="username"  name="userChrt" value="'.$userna.'" style="font-size:15px;
                    text-align: left;width: 100%;color:blue;cursor: pointer;font-weight: 800;border:0;background-color:transparent;margin-top:-10px;"/></td</tr>
                    <tr></td><td><p style="margin-left:5px;margin-top:-33px;">'.$fname.' '.$lname.'</p></td></tr>
                </table>  
                
            </form>
            </div>
                   </label>
                ';
                    
                    
                }else{
                    
                    $results = "offline";
                      echo'<hr style="background-color: black;height: 1px;border: 0;margin:5px;"/>
            <label><div class="chrt" style="opacity:0.5;">
            <form action="profile.php" method="POST">
            <div style="text-align:right;color:black;font-weight:900;margin-bottom:-17px;margin-right:20px;">'.$results.'</div>
                <table>
                    <tr><td rowspan="2"><img style="border-radius:50%;" src="'.$profilePic.'" height="50" width="40"/>      </td><td><input type="submit" id="username"  name="userChrt" value="'.$userna.'" style="font-size:15px;
                    text-align: left;width: 100%;color:blue;cursor: pointer;font-weight: 800;border:0;background-color:transparent;margin-top:-10px;"/></td</tr>
                    <tr></td><td><p style="margin-left:5px;margin-top:-33px;">'.$fname.' '.$lname.'</p></td></tr>
                </table>  
                
            </form>
            </div>
                   </label>
                ';
                    
                    
                }
            
            }
    }  

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
    <br/>
</div>
<script type="text/javascript">
function send_post(){
    
    var hr = new XMLHttpRequest();
    var url = "send_post.php";
    var fn = document.getElementById("post").value;
    var vars = "post="+fn;
    
    hr.open("POST",url,true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function(){
        if(hr.readyState == 4 && hr.status == 200){
            var return_data = hr.responseText;
            document.getElementById("status").innerHTML = return_data;
        }
    }
    
hr.send(vars);
document.getElementById("status").innerHTML = "processing ... ";

}

</script>
