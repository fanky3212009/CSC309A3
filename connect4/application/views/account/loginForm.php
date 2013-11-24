
<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('header');?>
	</head> 
<body>  
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="navbar-collapse collapse">
          <!--<form class="navbar-form navbar-right">-->
          <!--  <div class="form-group"> -->
            	<?php 
            		$attributes = array('class' => 'navbar-form navbar-right'
            							);
            		$attributes2 = array('class' => 'form-control',
            							'required' => "TRUE",
            							'name' => "username"
            							);
            		
            		echo form_open('account/login', $attributes);
            		echo '<div class="form-group">';
            		echo form_label('Username');
            		echo form_error('username');
					//echo form_input('username',set_value('username'),"required", $attributes2);
					echo form_input( $attributes2);
            	
              echo '<!--<input type="text" placeholder="Email" class="form-control">-->
            </div>
            <div class="form-group">';
	            
	        		echo form_label('Password'); 
					echo form_error('password');
					echo form_password('password','',"required");	
	            ?>
              <!--<input type="password" placeholder="Password" class="form-control">-->
            </div>
            	<?php 	
            		echo form_submit('submit', 'Login');
            		echo form_close();
            	?>

            <!--<button type="submit" class="btn btn-success">Sign in</button>-->
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
    <div class="container">
	<h1>Login</h1>
	</div>

 	
   
</body>

</html>

