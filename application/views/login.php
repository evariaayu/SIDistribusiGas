<div class="login">
	
        <div class="login-screen">
          <div class="login-icon">

            <img src="<?php echo base_url('assets/img/almas.png') ?>" alt="Welcome to Almas Gasindo" />

            <h4><center>Welcome to <small> Almas Gasindo Jaya Abadi</small></center></h4>
          </div>
          
          
          <div class="login-form">
          
          
          
          <form role="form" action="<?php echo base_url() ?>index.php/c_verifylogin/" method="post" id="login-form">
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
      </div>

      <link href="dist/css/flat-ui.css" rel="stylesheet">
    <link href="docs/assets/css/demo.css" rel="stylesheet">
    
    <style>
    
    .login-form
    {
    	min-width:200px;
    }
    
   
    .login-icon
    {
    	min-width:100px;
    }
    .login-icon>img{width:100%;margin-bottom:6px}
    
    .login-form
    {
    	margin-left:20px;
    }
    
    </style>
