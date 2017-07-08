
<?php
include("inc/header.inc.php");

if(!isset($_POST["postHeader"])){
             echo '
            <div class="container">
<center><div style="font-weight:bold;font-size:50px;color:red;">404</div>
<hr style="border-bottom: 1px solid grey;"/>
<p><h2 style="color:black;">Sorry but were expriencing technical problems. Please try again </h2></p>
</center>
</div>
   
    ';
    exit();
}

?>
<?php include("pageLinks.php");?>
<style>
	

</style>
<?php

	if($_SERVER["REQUEST_METHOD"] === "POST" ){

		if(isset($_POST["postHeader"])){
			@$postHead = @$_POST["postHeader"];

			$sql = "SELECT * FROM posts P,users S  WHERE P.added_by = S.user_id AND post_header = '$postHead'";

			$results = $conn->query($sql);

			while($row = $results->fetch_assoc()){
				$_SESSION['pH'] = $row['post_header'];
				$_SESSION['pB'] = $row['post_body'];
				$_SESSION['ppp'] = $row['post_pic'];
                $pp = $row['post_pic'];
				$_SESSION['fName'] = $row['first_name'];
			}

		}
	}




?>


<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>


  <section id="contentSection">
    <div class="row">
	<div class="col-md-3 col-lg-3 col-xs-3 text-center" >
			<h1 style="margin-left:-50px;">Post</h1>
	 		<div class="imagee">
	 			<img id="avatarr" width="200" height="200" src="<?php echo @$_SESSION['pp'];?>" alt="image" style="margin-left: -50px;"/>
	 		</div>
	 		<div class="UserDetails">
	 			<div><h3><?php echo @$_SESSION['first_name'];?> <?php echo @$_SESSION['last_name'];?></h3></div><button id="btnCallPost" class="btn btn-primary">POST</button>
	 		</div>
	 		
	</div>
      <div class="col-lg-8 col-md-8 col-sm-8 homeContentCenter">
            <center><h1>News Feeds</h1></center>
			
				 <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i><?php echo @$userPost;?></a> <span><i class="fa fa-calendar"></i>6:49 AM</span> <a href="#"><i class="fa fa-tags"></i>DDN</a> </div>
				 		
				 	<?php

				 		if(@$pp != ""){

				 			echo '<div class="single_page_content"> <img class="img-center" src="/GitHub/DDN/'.@$_SESSION['ppp'].'" alt=""> ';
				 		}

				 	?>
					 
                    
					 <h1><?php echo @$_SESSION['pH'];?></h1>
					 <p><p/>
					 <blockquote><?php echo @$_SESSION['pB'];?></blockquote>
					
					<div class="row">
						<div class="col-md-1 rate">
                          <form action="approvePost.php" method="POST">
							<button id="approve" type="submit" style="width:30px;margin-top:10px;background-color:green;border-radius:50%;" name="postApproved"> <span style="color:white;" class="glyphicon glyphicon-ok"></span></button>
                            <button id="onHold"  type="submit" style="width:30px;margin-top:10px;background-color:red;border-radius:50%;" name="postDdeclined"><span style="color:white;" class="glyphicon glyphicon-remove"></span></button>
                         </form>
            
						</div>
						<div class="col-md-10">
							<form class="">
								  <textarea style="" rows="3" type="text" class="form-control commentt" id="exampleInputAmount" placeholder="Comment..."></textarea> 
							</form>
						</div>
						<div class="col-md-1">
						   <input style="width: 100px;margin-left: -10px;height: 70px;margin-top: -0.5px;" type="submit" class="input-group btn btn-primary btnComment" name="btnComment" value="Send"/>
						</div>
					</div>
				</div>
		
				<div class="social_link">
				  <ul class="sociallink_nav">
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
				  </ul>
				</div>
	</div>
    </section>
</div>
</div><!--closing the mainDiv from Header-->
<?php include("../DDN/inc/overall/footer.php");?>