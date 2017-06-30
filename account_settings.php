<?php
    include ("inc/header.inc.php");
if(!isset($_SESSION["user_login"])){
     header("location: index.php");
         exit();
}
else{
    $user = $_SESSION["user_login"];
}
$fname = "";
$lname = ""; 
$email = "";
$boi = ""; 
$pp = "";
$error_msg = "";
$error_msg2 = "";
$errorPic = "";

    $sql = mysqli_query($conn,"SELECT * 
                            FROM userss 
                            WHERE `username` = '$user' LIMIT 1");
    
    $userCount = mysqli_num_rows($sql);
    if($userCount == 1){
        while($row = mysqli_fetch_assoc($sql)){
            $fname = $row["first_name"];
            $lname = $row["last_name"];
            $email = $row["email"];
            $boi = $row['boi'];
            $pp = $row['profile_pic'];
        }
           
    }
?>

<?php
if(isset($_POST['oldpassword']) && isset($_POST['newpassword']) && isset($_POST['newpassword2'])){
    $oldpass = md5($_POST['oldpassword']);
    $pass_Checksql = "SELECT * 
                        FROM userss
                            WHERE username = '$user' AND
                            password = '$oldpass' LIMIT 1";
    
    $found = mysqli_num_rows(mysqli_query($conn,$pass_Checksql));
    
    if($found == 1){
        $newPass = $_POST['newpassword'];
        $newPass2 = $_POST['newpassword2'];
            
        if($newPass == $newPass2){
             $newPass =  md5($newPass);
            
               $updatePass = "UPDATE userss
                        set password = '$newPass' WHERE username = '$user'";
            
            mysqli_query($conn,$updatePass) or die();
            $error_msg = "<b style='color:lime;'>password changed </b>";
            
        }
        else{
            $error_msg = "<b style='color:red;'> new password doesn't match </b>";
        }
    }
    else{
        $error_msg = "<b style='color:red;'> old password incorrect </b>";
    }
}


if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])){
    
            $newFname = $_POST['fname'];
            $newLname = $_POST['lname'];
            $newEmail = $_POST['email'];
            $newBio = $_POST['boi'];
    
            $updatePass = "UPDATE userss
                        set first_name = '$newFname',last_name = '$newLname',email = '$newEmail',boi = '$newBio'  WHERE username = '$user'";
            
            mysqli_query($conn,$updatePass) or die();
            $error_msg2 = "<b style='color:lime;'>Information updated</b>";
        $sql = mysqli_query($conn,"SELECT * 
                            FROM userss 
                            WHERE `username` = '$user' LIMIT 1");
    
    $userCount = mysqli_num_rows($sql);
    if($userCount == 1){
        while($row = mysqli_fetch_assoc($sql)){
            $fname = $row["first_name"];
            $lname = $row["last_name"];
            $email = $row["email"];
            $boi = $row['boi'];
            $pp = $row['profile_pic'];
        }   
    }
}


if(isset($_FILES['pp'])){
    if((@$_FILES['pp']["type"]=="image/jpeg") || (@$_FILES['pp']["type"]=="image/gif") || ($_FILES['pp']["type"]=="image/png") && $_FILES['pp']["size"] <= 10048576 ) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $g_rand_dir = substr(str_shuffle($chars), 0, 15);
        mkdir("userdata/profile_pics/$g_rand_dir");
        
        if(file_exists("userdata/profile_pics/$g_rand_dir/".@$_FILES['pp']["name"])){
            $errorPic = "<b style='color:red;'> picture already exists </b>";
        }
        else{
             move_uploaded_file(@$_FILES['pp']["tmp_name"], "userdata/profile_pics/$g_rand_dir/".@$_FILES['pp']["name"]);
             $dir = 'userdata/profile_pics/'.$g_rand_dir.'/'.@$_FILES["pp"]["name"];
            
             $updatePp = "UPDATE userss
                                set profile_pic = '$dir'
                                    WHERE username = '$user'";
             mysqli_query($conn,$updatePp);
             $errorPic = "<b style='color:lime;'> picture uploaded </b>";

               $sql = mysqli_query($conn,"SELECT * 
                            FROM userss 
                            WHERE `username` = '$user_login' LIMIT 1");
    
    
            $userCount = mysqli_num_rows($sql);
            if($userCount == 1){
                while($row = mysqli_fetch_assoc($sql)){
           
                $_SESSION['pp'] = $row['profile_pic'];
            }}

             header("location:account_settings.php");
        }
    }
    else{
        
    }
}
?>

<h2>EDIT YOUR ACCOUNT BELOW!</h2>

<center><p><h3>UPDATE PROFILE PICTURE</h3></p></center>
<?php  echo $errorPic;?>
<form action="" method="POST" enctype="multipart/form-data">
   <center>
    <img style="border-radius:50%;" width="300px;" height="300px" src="<?php echo $pp;?>" alt="" /><br/>
    <input style="padding-left:150px;border:0;" type="file" name="pp" required="" id="pp"/><br/>
    <input style="background-color: #00B9ED;font-weight:bolder;" type="submit" name="uploadPp" value="UPDATE" />
   </center> 
</form>

<center><p><h3>CHANGE PASSWORD</h3></p></center>
<?php  echo $error_msg;?>
<form action="account_settings.php" method="post">
<table style="margin-left:180px;">
    <tr>    <td width="50%" class="tdd" > Old password   </td>       <td width="50%" ><input type="password" name="oldpassword" id="oldpassword" required=""/>       </td> </tr>
    <tr>    <td width="50%" class="tdd" > New password   </td>       <td width="50%" ><input type="password" name="newpassword" id="newpassword" required=""/>       </td> </tr>
    <tr>    <td width="50%" class="tdd"> Confirm password   </td>       <td width="50%" ><input type="password" name="newpassword2" id="newpassword2" required=""/>      </td> </tr>
</table>
<center><p><input style="background-color: #00B9ED;font-weight:bolder;" type="submit" name="updatePass" id="updatePass" value="CHANGE PASSWORD"/></p></center>
</form>
<center><p><h3>UPDATE YOUR INFO </h3></p></center>
<?php  echo $error_msg2;?>
<form action="account_settings.php" method="post">
    <table style="margin-left:180px;">
    <tr>    
        <td width="50%" class="tdd"> First Name   </td>      
        <td width="50%" ><input type="text" name="fname" id="fname" value="<?php echo $fname;?>" required=""/>       </td>
    </tr>
    <tr>   
        <td width="50%" class="tdd"> Last Name  </td>    
        <td width="50%" ><input type="text" name="lname" id="lname" value="<?php echo $lname;?>" required=""/>       </td> 
    </tr>
    <tr>   
        <td width="50%" class="tdd"> e-mail    </td>    
        <td width="50%" > <input type="email" name="email" id="email" value="<?php echo $email;?>" required=""/>     </td> 
    </tr>
    <tr>   
        <td width="50%" valign="top" class="tdd"> Boigraphy   </td>    
        <td width="50%" > <textarea rows="6" cols="36" type="text" name="boi" id="boi" required=""><?php echo $boi;?> </textarea>    </td> 
    </tr>
</table>
<center><p><input style="background-color: #00B9ED;font-weight:bolder;" type="submit" name="updatePass" id="updatePass" value="UPDATE"/></p></center>
</form>
<br/>
<br/>
<br/>
<br/>
<br/>