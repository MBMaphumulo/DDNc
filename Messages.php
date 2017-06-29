<?php include ("inc/header.inc.php");?>

<div class="MessageView">
<?php    
    
if(isset($_SESSION["userChrt"])){
$user_login = $_SESSION["user_login"];
$sent_too =$_SESSION["userChrt"] ;
$sent_by = "";
$sent_to = "";
$msgg = "";

?>  
<center><h3>Send Message to : <?php echo @$sent_too;?></h3></center>
<div id="b"></div>
</div>
<script src="js/app.js"></script>
<script src="js/jquery.min.js"></script>
<div style="margin-top:10px;" class="sendMessageForm">
    <div id="status"></div>
    <form method="POST">
        <textarea style="border:2px solid skyblue;" id="msg" name="msg" rows="2" cols="145" placeholder="Type something..." required=""></textarea>
        <input style="height:30px;" type="submit" onclick="javascript:send_msgg()" name="msg" value="Send" class="btnPost" />
    </form>
</div>
<script> 
function send_msgg(){
    var hr = new XMLHttpRequest();
    var url = "send_msg.php";
    var fn = document.getElementById("msg").value;
    var vars = "msg="+fn;
    
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
<?php
 }else{
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
   
