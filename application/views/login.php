<div class="login">
        <div class="login-screen">
          <div class="login-icon">
            <img src="../assets/img/icon.png" alt="Welcome to Mail App" />
            <h4>Welcome to <small>Mail App</small></h4>
          </div>
          <form role="form" action="<?php echo base_url() ?>index.php/c_verifylogin/" method="post" id="login-form">
          <div class="login-form">
            <div class="form-group">
              <input type="text" class="form-control login-field" placeholder="Enter your username" name="username" id="login-name" />
              <label class="login-field-icon fui-user" for="login-name"></label>
            </div>

            <div class="form-group">
              <input type="password" class="form-control login-field" placeholder="Password" name="password" id="login-pass" />
              <label class="login-field-icon fui-lock" for="login-pass"></label>
            </div>

            <input type="submit" class="btn btn-primary btn-lg btn-block" value="log in">

          </div>
        </form>
        </div>
      </div>

      <link href="dist/css/flat-ui.css" rel="stylesheet">
    <link href="docs/assets/css/demo.css" rel="stylesheet">