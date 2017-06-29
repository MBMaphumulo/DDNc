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
    ';
    exit();
}
echo "<h2>Hello, ".$_SESSION["user_login"]."</h2>";

?>

	 	<div class="col-md-10 homeContent">
	 		<div class="row">
	 			<div class="col-md-8 homeContentCenter">
				
	 			<?php 
			
				$pH = "";
				$pB = "";
				$req = 1;
				$sql = "SELECT * FROM posts P,users S  WHERE post_request = '$req' AND P.added_by = S.user_id ORDER BY post_id DESC ";
				
				
				$results = $conn->query($sql);
				
				if($results){
						
						while($row = $results->fetch_assoc()){
							$pH = $row['post_header'];
							$pB = $row['post_body'];
							$pp = $row['post_pic'];
							$userPost = $row['first_name'];
							$time = $row['timme'];
						
						
						
							if($pp != ""){
									echo '
							 <form action="postView.php" method="POST">
							 <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>'.$userPost.'</a> <span><i class="fa fa-calendar"></i>'.$time.'</span> <a href="#"><i class="fa fa-tags"></i>DDN</a> </div>
							 <div class="row">
								<div class="row">
									<div class="col-md-offset-1 col-md-11 col-sm-11 col-xs-11">
										<center><h3><div class="viewPost"><input style="color:white;background-color:black;border:0px solid black;" type="submit" name="postHeader" value="'.$pH.'" /></div></h3></center>
									</div> 
								</div>
								<div class="row">
									<div class="col-md-offset-1 col-md-5 col-sm-5 col-xs-5">
										<p>'.$pB.'</p>
									</div>
									<div class="col-md-offset-1  col-md-3 col-sm-3 col-xs-3">
										<img width="170" height="85" src="'.$pp.'" alt="postImage" />
									</div>
								</div>
							 </div>	
							 </form>
							';
							}else{
							echo ' 
							 <form action="postView.php" method="POST">
							 <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>'.$userPost.'</a> <span><i class="fa fa-calendar"></i>'.$time.'</span> <a href="#"><i class="fa fa-tags"></i>DDN</a> </div>
							 <div class="row">
								<div class="row">
									<div class="col-md-offset-1 col-md-11 col-sm-11 col-xs-11">
										<center><h3><div class="viewPost"><input style="color:white;background-color:black;border:0px solid black;" type="submit" name="postHeader" value="'.$pH.'" /></div</h3></center>
									</div> 
								</div>
								<div class="row">
									<div class="col-md-offset-1 col-md-11 col-sm-11 col-xs-11">
										<p>'.$pB.'</p><input type="button" name="read" value="Read More" class="btn btn-primary" style="visibility:hidden">
									</div>
								</div>
							 </div>
							 <form action="postView.php" method="POST">
							';
							
							}
						
						}
				}else{
						echo '
								<div class="single_page_content"> 
									<h1>0 posts</h1>
							   </div>
						';
				}
			
			?>
	 		<!--	
	 			<div class="row">
					<div class="row">
					<div class="col-md-offset-1 col-md-11 col-sm-11 col-xs-11">
					<center><h3>Agriculture</h3></center>
					</div> 
					</div>
					<div class="row">
					<div class="col-md-offset-1 col-md-7 col-sm-7 col-xs-7">
					<p>Agriculture (management and extension) ,farmingmnsbm mahbsjgab majuin hggsa hjgany bah</p><input type="button" name="read" value="Read More" class="btn btn-primary">
					</div>
					<div class="col-md-offset-1  col-md-3 col-sm-3 col-xs-3">
					<img width="170" height="85" src="assets/postImage1.jpg" alt="postImage" />
					</div>
					</div>
                 </div>		
				-->	
	 			</div>
