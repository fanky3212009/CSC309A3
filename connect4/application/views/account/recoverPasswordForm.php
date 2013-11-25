
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
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
	</head> 
<body>  
	<div class="container">
		<div class="row">
			 <div class="col-xs-6 col-sm-4"></div>
			 <div class="col-xs-6 col-sm-4">
			 	<h1>Recover Password</h1>
				<?php 
					if (isset($errorMsg)) {
						echo "<p>" . $errorMsg . "</p>";
					}
					
					$attributes = array('class' => 'form-inline navbar-right',
        								'style'	=>	'margin:7px;');
        								
        			$attributesLabel = array('style' => 'color: #000;');

					$attributesEmail = array('class' 		=> 'form-control',
        									'required'		=> '',
        									'name' 			=> "email",
        									'placeholder' 	=> 'Email',
        									'style'			=> 'width: 95%');	
        			
        			$attributesSubmit = array('class'		=> 'btn btn-default',
        								  	 	'name'		=> 'submit',
        								  	 	'value'		=> 'Recover Email',
        								  	 	'style'		=> 'margin:10px 0px 0px 0px;');								
        									
					echo form_open('account/recoverPassword', $attributes);
					echo form_label('Email', 'email', $attributesLabel); 
					echo form_error('email');
					echo form_input($attributesEmail);
					echo form_submit($attributesSubmit);
					echo form_close();
				?>	

			 </div>
			 <div class="col-xs-6 col-sm-4"></div>
		</div>
			
	</body>

</html>

