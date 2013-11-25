
<!DOCTYPE html>
<html>
	<head>
		<?php $this->load->view('header');?>
		
		<style>
			body {
			  padding-top: 50px;
			}
			.mid {
			  padding: 40px 15px;
			  text-align: center;
			}
		</style>
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
          <a class="navbar-brand" href="#">Connect 4</a>
        </div>
        <div class="navbar-collapse collapse">
        	<?php 
        		$attributes = array('class' => 'form-inline navbar-right',
        							'style'	=>	'margin:7px;');
        		
        		$attributesLabel = array('style' => 'color: #fff;',
        							     'class' =>	'sr-only');
        		
        		
        		$attributesPassword = array('class' 		=> 'form-control',
        									'required'		=> '',
        									'name' 			=> "password",
        									'placeholder' 	=> 'Password', 
        									'style'			=> 'width: 95%');
        									
        		$attributesUsername = array('class' 		=> 'form-control',
        									'required'		=> '',
        									'name' 			=> "username",
        									'placeholder' 	=> 'Username',
        									'style'			=> 'width: 95%');		
        									
        		$attributesSubmit = array('class'		=> 'btn btn-default',
        								  'name'		=> 'submit',
        								  'value'		=> 'Login',);					
        		
        		echo form_open('account/login', $attributes);
        		echo '<div class="form-group">';
        		echo form_label('Username', 'username', $attributesLabel);
        		echo form_error('username');
				echo form_input($attributesUsername);
        	
				echo '</div><div class="form-group">';
            
        		echo form_label('Password', 'password', $attributesLabel); 
				echo form_error('password');
				echo form_password($attributesPassword);

            ?>
           </div>
        	<?php 	
        		echo form_submit($attributesSubmit);
        		echo form_close();
        		
        	?>
        	<ul class="nav navbar-nav">
	     	  <?php echo '<li>' . anchor('account/newForm','Create Account') . '</li>'; ?>
		      <?php echo '<li>' . anchor('account/recoverPasswordForm','Recover Password') . '</li>'; ?>
		    </ul>
	  </div>
      </div>
    </div>
    
   <div class="container">
      <div class="mid">
        <h1>Connect 4 Online</h1>
        <p class="lead">Login or create an account to get playing!</p>
      </div>
    </div>

 	
   
</body>

</html>

