    <!-- Page Content -->
    <div id="loginForms" class="container">
      <h1>Login Forms</h1>

      <!-- Content Row -->
      <div class="row">
        <div class="col-lg-12">
          <h2>Form Request</h2>

          <form class="" action="/login/receive" method="post">
            <input type="hidden" name="type" value="form">
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
              </div>

              <input type="text" class="form-control" placeholder="Email" name="email">
            </div>

            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
              </div>

              <input type="text" class="form-control" placeholder="Password" name="password">
            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-block" value="Submit">
            </div>
          </form>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <h2>AJAX Request</h2>

          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-user"></i></span>
            </div>

            <input id="email" type="text" class="form-control" placeholder="Email" name="email">
          </div>

          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fa fa-user"></i></span>
            </div>

            <input id="password" type="text" class="form-control" placeholder="Password" name="password">
          </div>

          <div class="form-group">
            <!-- <input type="submit" class="btn btn-primary btn-block" value="Submit"> -->
            <button id="ajaxBTN" type="submit" class="btn btn-primary btn-block" name="button">LOGIN</button>
          </div>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
