<?php  
include ("inc/connection.inc.php"); 
session_start();
$user_login = $_SESSION["user_login"];
$sent_too =$_SESSION["userChrt"] ;
$sent_by = "";
$sent_to = "";
$msgg =   "";

$sql_sent = "SELECT * 
                FROM Messages
                    WHERE sent_by = '$user_login' AND 
                          sent_to = '$sent_too' OR
                          sent_by = '$sent_too' AND 
                          sent_to = '$user_login'
                          
                    ";
    
    $msg_by = mysqli_query($conn,$sql_sent);
    
    while($row_by = mysqli_fetch_assoc($msg_by)){
    $sent_by = $row_by["sent_by"];
    $sent_to = $row_by["sent_to"];
    $msgg = $row_by["message"];
    $date = $row_by["date"];
    $time = $row_by["time"];
        
        if($sent_by == $user_login){
            echo '<div style="text-align:left;margin:10px;width:50%;float:right;background-color:grey;padding:10px;border-radius:5px;color:Blue;font-weight:800;    background-color: #FFFFFF;
            border: 1px solid #006FC4;" class="message">'.$msgg.'<div style="font-weight:100;font-size:8pt;text-align:right;">'.$date.' ('.$time.')</div></div><div style="clear:right;"></div>';
    
        }
        else{
             echo '<div style="text-align:left;margin:10px;width:50%;float:left;background-color:grey;padding:10px;border-radius:5px;color:skyblue;font-weight:800;    background-color: #FFFFFF;
            border: 1px solid #006FC4;" class="message">'.$msgg.'<div style="font-weight:100;font-size:8pt;text-align:right;">'.$date.' ('.$time.')</div></div><div style="clear:left;"></div>';
        }
    }

?>