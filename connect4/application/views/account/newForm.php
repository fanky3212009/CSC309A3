
<!DOCTYPE html>

<html>
	<head>
	<?php $this->load->view('header');?>
		<style>
			input {
				display: block;
			}
		</style>
		<script src="http://code.jquery.com/jquery-latest.js"></script>
		<script>
			function checkPassword() {
				var p1 = $("#pass1"); 
				var p2 = $("#pass2");
				
				if (p1.val() == p2.val()) {
					p1.get(0).setCustomValidity("");  // All is well, clear error message
					return true;
				}	
				else	 {
					p1.get(0).setCustomValidity("Passwords do not match");
					return false;
				}
			}
		</script>
	</head> 
<body>  
	<div class="container">
		
		<div class="row">
			 <div class="col-xs-6 col-sm-4"></div>
			 <div class="col-xs-6 col-sm-4">
			 <h1>Create New Account</h1>
				 <?php 
					$attributesForm = array('role'	=> 'form');
					$attributesLabel = array('style'	=> 'margin:10px 0px 0px 0px;');
					
					$attributesUsername = array('class' 		=> 'form-control',
												'required'		=> '',
												'name' 			=> "username",
												'placeholder'	=> 'Username');
					
					$attributesPassword = array('class' 		=> 'form-control',
												'required'		=> '',
												'name' 			=> "password",
												'value'			=> '',
												'id'			=> 'pass1',
												'placeholder'	=> 'Password');		
																					
					$attributesPassConf = array('class' 		=> 'form-control',
												'required'		=> '',
												'name' 			=> "passconf",
												'placeholder'	=> 'Confirm Password',
												'id'			=> 'pass2',
												'oninput'		=> 'checkPassword();');
					
					$attributesFirst = array('class' 		=> 'form-control',
											'required'		=> '',
											'name' 			=> "first",
											'value'			=> 'First',
											'placeholder'	=> 'First');	
											
																					
					$attributesLast = array('class' 		=> 'form-control',
											'required'		=> '',
											'name' 			=> "last",
											'value'			=> 'Last',
											'placeholder'	=> 'Last');							
			
					$attributesEmail = array('class' 		=> 'form-control',
											'required'		=> '',
											'name' 			=> "email",
											'value'			=> 'Email',
											'placeholder'	=> 'Email');
					
					$attributesSubmit = array('class'		=> 'btn btn-default',
        								  	  'name'		=> 'submit',
        								  	  'value'		=> 'Register',
        								  	  'style'		=> 'margin:10px 0px 0px 0px;');								
											
					echo form_open('account/createNew');
					echo form_label('Username', 'username', $attributesLabel); 
					echo form_error('username');
					echo form_input($attributesUsername);
					
					echo form_label('Password', 'password', $attributesLabel); 
					echo form_error('password');
					echo form_password($attributesPassword);
					
					echo form_label('Password Confirmation', 'passconf', $attributesLabel); 
					echo form_error('passconf');
					echo form_password($attributesPassConf);
					
					echo form_label('First', 'first', $attributesLabel);
					echo form_error('first');
					echo form_input($attributesFirst);
					
					echo form_label('Last', 'last', $attributesLabel);
					echo form_error('last');
					echo form_input($attributesLast);
					
					echo form_label('Email', 'email', $attributesLabel);
					echo form_error('email');
					echo form_input($attributesEmail);
					
					echo form_submit($attributesSubmit);
					echo form_close();
				?>	
			 </div>
			 <div class="col-xs-6 col-sm-4"></div>
		</div>
	</div>
</body>

</html>

