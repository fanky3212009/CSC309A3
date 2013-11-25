
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
			 	<h1>Change Password</h1>
				<?php 
					if (isset($errorMsg)) {
						echo "<p>" . $errorMsg . "</p>";
					}
				
				
					$attributes = array('class' => 'form-inline navbar-right',
        								'style'	=>	'margin:7px;');
        								
        			$attributesLabel = array('style' => 'color: #000;');
        			
        			$attributesOldPassword = array(	'class' 		=> 'form-control',
		        									'required'		=> '',
		        									'name' 			=> "oldPassword",
		        									'placeholder' 	=> 'Old Password',
		        									'style'			=> 'width: 95%');	
		        									
		        	$attributesNewPassword = array(	'class' 		=> 'form-control',
		        									'required'		=> '',
		        									'name' 			=> "newPassword",
		        									'id'			=> 'pass1',
		        									'placeholder' 	=> 'New Password',
		        									'style'			=> 'width: 95%');									

		        	$attributesNewPasswordConf = array(	'class' 		=> 'form-control',
		        									'required'		=> '',
		        									'name' 			=> "passconf",
		        									'id'			=> 'pass2',
		        									'placeholder' 	=> 'Confirm Password',
		        									'oninput'		=> 'checkPassword();',
		        									'style'			=> 'width: 95%');	
        			
        			$attributesSubmit = array('class'		=> 'btn btn-default',
        								  	 	'name'		=> 'submit',
        								  	 	'value'		=> 'Change Password',
        								  	 	'style'		=> 'margin:10px 0px 0px 0px;');			
					
					
					echo form_open('account/updatePassword');
					echo form_label('Current Password', 'oldPassword', $attributesLabel); 
					echo form_error('oldPassword');
					echo form_password($attributesOldPassword);
					
					echo form_label('New Password'); 
					echo form_error('newPassword');
					echo form_password($attributesNewPassword);
					
					echo form_label('Password Confirmation'); 
					echo form_error('passconf');
					echo form_password($attributesNewPasswordConf);
					
					echo form_submit($attributesSubmit);
					echo form_close();
				?>	
			 </div>
			 <div class="col-xs-6 col-sm-4"></div>
		</div>
	</body>
</html>

