
<div id="overlay"></div>
<div id="myPost">
    <form action="send_users.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-12 col-sm-12">
              <center>
                <h1>POST</h1>
                <div id="status"></div>
                <div class="form-group text-center">
                    <input class="form-control" style="margin-left:50px;width:400px;" id="post_header" type="text" name="post_header" placeholder="Story Header" required="" />
                    <br/>
                    <textarea class="form-control" style="margin-left:50px;max-width:400px" id="post_body" type="text" name="post_body" placeholder="Write your story" required=""></textarea>
                    <br/>   
                    <input style="border:0;margin-left:50px;" type="file" name="profile"/>
                    <hr/>     
                    <input id="btnCancel" type="reset" class="btn btn-danger" value="Cancel" />
                    <input id="btnPost" type="submit" class="btn btn-primary" name="btnPost" value="POST"/>
                  </div>
              </center>
            </div>
        </div> 
    </form>
</div>
