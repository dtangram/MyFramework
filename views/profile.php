    <!-- Page Content -->
    <div id="loginForms" class="container">
      <h1>Profile Picture Form</h1>

      <!-- Content Row -->
      <div class="row">
        <div class="col-lg-12">
          <h2>Upload File</h2>

          <!-- DISPLAY UPLOADED IMAGE -->
          <img src="/assets/myImage.jpg" alt="Profile Picture">

          <!-- LOAD AND UPDATE PHOTO OR FILE ON PAGE -->
          <form action="/profile/updatePicture" method="post" enctype="multipart/form-data">
            <input type="hidden" name="type" value="form">
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
              </div>

              <input class="form-control" type="file" name="myFile">
            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-block" value="Submit">
            </div>
          </form>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
