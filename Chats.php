<?php include ("inc/header.inc.php");?>
    


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

            if($userna == $_SESSION["user_login"]){
                
            }
            else{
                
                if($active == 1){
                    $results = "online";
                      echo'<hr style="background-color: black;height: 1px;border: 0;margin:5px;"/>
            <label><div class="chrt">
            <form action="profile.php" method="POST">
                <table>
                    <tr><td rowspan="2"><img style="border-radius:50%;" src="'.$profilePic.'" height="50" width="40"/>      </td><td><input type="submit" id="username"  name="userChrt" value="'.$userna.'" style="font-size:15px;
                    text-align: left;width: 100%;color:blue;cursor: pointer;font-weight: 800;border:0;background-color:transparent;margin-top:-10px;"/></td</tr>
                    <tr></td><td><p style="margin-left:5px;margin-top:-33px;">'.$fname.' '.$lname.'</p></td></tr>
                </table>  
                <div style="text-align:right;color:lime;font-weight:900;margin-top:-20px;margin-right:20px;">'.$results.'</div>
            </form>
            </div>
                   </label>
                ';
                    
                    
                }else{
                    
                    $results = "offline";
                      echo'<hr style="background-color: black;height: 1px;border: 0;margin:5px;"/>
            <label><div class="chrt" style="opacity:0.5;">
            <form action="profile.php" method="POST">
                <table>
                    <tr><td rowspan="2"><img style="border-radius:50%;" src="'.$profilePic.'" height="50" width="40"/>      </td><td><input type="submit" id="username"  name="userChrt" value="'.$userna.'" style="font-size:15px;
                    text-align: left;width: 100%;color:blue;cursor: pointer;font-weight: 800;border:0;background-color:transparent;margin-top:-10px;"/></td</tr>
                    <tr></td><td><p style="margin-left:5px;margin-top:-33px;">'.$fname.' '.$lname.'</p></td></tr>
                </table>  
                <div style="text-align:right;color:black;font-weight:900;margin-top:-20px;margin-right:20px;">'.$results.'</div>
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