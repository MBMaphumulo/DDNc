<?php include ("inc/header.inc.php"); 
if(!isset($_SESSION["user_login"])){
    
}
else{
   header("location: home.php");
         exit();
}
?>
<?php
$reg = @$_POST['reg'];

//declareing variables to prevent errors
$fn = "";//First name
$ln = "";//Last name
$un = "";//Username
$em = "";//Email
$em2 = "";//Email2
$pswd = "";//Password
$pswd2 = "";//password2
$d = "";//Sign Up Date
$u_check = ""; //cjeck if username exists
 $error_msg = "";
 
//registration form
$fn = strip_tags(@$_POST["fName"]);
$ln = strip_tags(@$_POST["LName"]);
$un = strip_tags(@$_POST["username"]);
$em = strip_tags(@$_POST["email"]);
$em2 = strip_tags(@$_POST["email2"]);
$pswd = strip_tags(@$_POST["password"]);
$pswd2 = strip_tags(@$_POST["password2"]);
$d = date("Y-m-d"); // Year - Month - Day

if($reg){
    if($em == $em2){
        $u_check = mysqli_query($conn,"SELECT username FROM userss WHERE username = '$un'");
        
        $check = mysqli_num_rows($u_check);
        if($check == 0){
            if($fn && $ln && $un && $em && $em2 && $pswd && $pswd2){
                if($pswd == $pswd2){
                    if(strlen($un) > 25 || strlen($fn) >25 || strlen($ln) > 25){
                         $error_msg =  "The maximum limit for username/first name/last name is 25 characters!";
                    }
                    else{
                        if(strlen($pswd) >30 ||strlen($pswd) < 5)
                        {
                             $error_msg =  "Your password must be between 5 and 30 characters long!";
                        }
                        else{
                            $pswd = md5($pswd);
                            $pswd2 = md5($pswd2);
                            $query = mysqli_query($conn,"INSERT INTO userss VALUES('','$un','$fn','$ln','$em','$pswd','$d','0','Empty..','img/default_pic.jpg')");
                            die("<h2>Welcome to DDN</h2> Login to get started ...");
                        }
                    }
                }
                else{
                     $error_msg =  "Your password don't match!";
                }
            }
            else{
                 $error_msg =  "Please Fill in all the fields";
            }
        }
        else{
             $error_msg =  "Username alredy exists";
        }
    }
    else{
         $error_msg =  "Your E-mails don't match";
    }
}

//user login code
@$user_login;
@$password_login;

if(isset($_POST["user_login"]) && isset($_POST["password_login"])){

    
    $user_login = preg_replace('#[^A-Za-z0-9]#i', '' , $_POST["user_login"]);
    $password_login = preg_replace('#[^A-Za-z0-9]#i', '' , $_POST["password_login"]);
    $password_login_md5 = md5($password_login);
    
    $pass = "";
    
    $sql = mysqli_query($conn,"SELECT * 
                            FROM userss 
                            WHERE `username` = '$user_login' LIMIT 1");
    mysqli_query($conn," UPDATE userss set active = '1'  
                            WHERE `username` = '$user_login' LIMIT 1");
    
    
    $userCount = mysqli_num_rows($sql);
    if($userCount == 1){
        while($row = mysqli_fetch_assoc($sql)){
            $pass = $row["password"]; 
            $_SESSION['pp'] = $row['profile_pic'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];

        }
            
        if($pass == $password_login_md5){
            $_SESSION["user_login"] = $user_login;
            mysqli_query($conn,"UPDATE userss set active = '1'  
                            WHERE `username` = '$user_login' LIMIT 1");
            header("location: index.php");
 
        }    
        else{
              $error_msg =  "incorrect password";

        }
    }
    else{
        $error_msg =  "User doesn't exists";
    }
  
    
}
 echo "<b style='color:red;'>".$error_msg."</b>";
?>
        <div style="width:800px; margin: 0px auto 0px auto;" >
        <table>
            <tr>
                <td width="60%" valign="top">
                    <h2>Alread a member? Sign in below !!</h2>    
                    <form action="index.php" method="POST">
                        <input type="text" name="user_login" size="25" placeholder="Username" required="" value="<?php echo @$user_login;?>" /><br/><br/>
                        <input type="password" name="password_login" size="25" placeholder="*********" required="" /><br/><br/>
                        <input type="submit" name="login" value="Login!" />
                    </form>
                </td>
                <td width="40%" valign="top">
                    <h2>Sign Up Below!!!</h2>
                    <form action="#" method="POST">
                        <input type="text" name="fName" size="25" placeholder="First Name" required="" value="<?php echo $fn;?>" /><br/><br/>
                        <input type="text" name="LName" size="25" placeholder="Last Name" required="" value="<?php echo $ln;?>" /><br/><br/>
                        <input type="text" name="username" size="25" placeholder="Username" required="" value="<?php echo $un;?>" /><br/><br/>
                        <input type="email" name="email" size="25" placeholder="e-mail" required="" value="<?php echo $em;?>" /><br/><br/>
                        <input type="email" name="email2" size="25" placeholder="Verify e-mail" required="" value="<?php echo $em2;?>" /><br/><br/>
                        <input type="password" name="password" size="25" placeholder="Password" required="" value="<?php echo $pswd;?>" /><br/><br/>
                        <input type="password" name="password2" size="25" placeholder="Verify Password" required="" value="<?php echo $pswd2?>" /><br/><br/>
                        <input type="submit" name="reg" value="Sign Up!" />
                    </form>
                </td>
            </tr>
        </table>
<?php ("inc/footer.inc.php"); ?>