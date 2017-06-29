<?php include("inc/header.inc.php");
    
$userFound = 0;

$search_name = $_POST["search_name"];

$sql = "SELECT * FROM userss WHERE username = '$search_name' OR
                                  first_name = '$search_name' OR
                                  last_name = '$search_name'";
$searchh = mysqli_query($conn,$sql);        

?>
<h2>Results Found</h2>
<?php
while($row = mysqli_fetch_assoc($searchh))
{
    $userFound++;
    $fname = $row["first_name"];
    $lname = $row["last_name"];
    $username = $row["username"];
    $pp = $row["profile_pic"];
    
    echo '<div class="seacrResults">
    <div class="leftResults"><img style="border-radius:50%;" width="150" height="100" src="'.$pp.'" alt="" /></div>
    <div class="rightResults">
        <h2 style="margin-bottom:-20px;">'.$username.'</h2>
        <p>'.$fname.' '.$lname.'</p>
        <input style="width:100px;" type="submit" name="addFriend" value="View Profile" />
    </div>
    </div><div style="clear:both;padding-bottom:20px;"></div>';   
}


?>
<h2 style="position:absolute;top:0;margin:68px 0 0 135px;;"><?php echo $userFound; ?></h2>