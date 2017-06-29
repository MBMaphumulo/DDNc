
<?php
include("inc/header.inc.php");
?>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
        <link rel="stylesheet" type="text/css" href="assets/css/font.css">
        <link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
        <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
        <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
        <link rel="stylesheet" type="text/css" href="assets/css/theme.css">
       <link rel="stylesheet" type="text/css" href="assets/css/style.css">
<style>
	

</style>
<?php

	if($_SERVER["REQUEST_METHOD"] === "POST" ){

		if(isset($_POST["postHeader"])){
			@$postHead = @$_POST["postHeader"];

			$sql = "SELECT * FROM posts P,users S  WHERE P.added_by = S.user_id AND post_header = '$postHead'";

			$results = $conn->query($sql);

			while($row = $results->fetch_assoc()){
				$pH = $row['post_header'];
				$pB = $row['post_body'];
				$pp = $row['post_pic'];
				$userPost = $row['first_name'];
			}

		}
	}




?>


<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">

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

				 			echo '<div class="single_page_content"> <img class="img-center" src="'.$pp.'" alt=""> ';
				 		}

				 	?>
					 
					 <h1><?php echo @$pH;?></h1>
					 <p><p/>
					 <blockquote><?php echo @$pB;?></blockquote>
					
					<div class="row">
						<div class="col-md-1 rate">
							<div class="btn btn-success img-circle"></div><div class="btn btn-danger"></div>
						</div>
						<div class="col-md-10">
							<form class="">
								  <textarea type="text" class="form-control commentt" id="exampleInputAmount" placeholder="Comment..."></textarea> 
							</form>
						</div>
						<div class="col-md-1">
						   <input style="width: 100px;margin-left: -30px;height: 50px;margin-top: -0.5px;" type="submit" class="input-group btn btn-primary btnComment" name="btnComment" value="Send"/>
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
     
    </div>
  </section>
</div>
<?php include("inc/footer.inc.php");?>