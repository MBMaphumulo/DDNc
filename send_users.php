<?php 
include ("inc/header.inc.php");

$pH = $_POST["post_header"];
$pB = $_POST["post_body"];
$pname = $_FILES['profile']["tmp_name"];
$pR =1;
$dir ="";
$time = date("h:i:sa");

if(isset($_FILES['profile'])){
    if((@$_FILES['profile']["type"]=="image/jpeg") || ($_FILES['profile']["type"]=="image/gif") || ($_FILES['profile']["type"]=="image/png") && $_FILES['profile']["size"] <= 10048576 ) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $g_rand_dir = substr(str_shuffle($chars), 0, 15);
        mkdir("../DDN/userdata/profile_pics/$g_rand_dir");
			
			$dir = '../DDN/userdata/profile_pics/'.$g_rand_dir.'/'.$_FILES["profile"]["name"];
             move_uploaded_file($_FILES['profile']["tmp_name"], $dir);
    }
    else{
        
    }
}

if(($pH != "")){
    $date_added = date("Y-m-d");
    $added_by = $_SESSION["user_id"];
    $statuss = "egent post";
    $approved_byy = "";

    $sqlCommand = "INSERT INTO posts  VALUES('','$pH','$pB',$pR,'$date_added','$added_by','$dir','$time','$statuss','$approved_byy')";

    if($conn->query($sqlCommand)){

        header("location: home.php");
    }

    
}
else{
    echo "You must enter something in the post field before you can send it ...";
}


?>
