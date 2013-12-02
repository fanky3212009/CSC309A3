
<!DOCTYPE html>

<html>
	<head>
	<?php $this->load->view('header');?>

	
	<style>
		.mid {
		  padding: 40px 15px;
		  text-align: center;
		}
	</style>
		
	
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
	<script src="<?= base_url() ?>/js/jquery.timers.js"></script>
	<script>

		var otherUser = "<?= $otherUser->login ?>";
		var user = "<?= $user->login ?>";
		var status = "<?= $status ?>";
		
		$(function(){
			$('body').everyTime(2000,function(){
					if (status == 'waiting') {
						$.getJSON('<?= base_url() ?>arcade/checkInvitation',function(data, text, jqZHR){
								if (data && data.status=='rejected') {
									alert("Sorry, your invitation to play was declined!");
									window.location.href = '<?= base_url() ?>arcade/index';
								}
								if (data && data.status=='accepted') {
									status = 'playing';
									$('#status').html('Playing ' + otherUser);
								}
								
						});
					}
					var url = "<?= base_url() ?>board/getMsg";
					$.getJSON(url, function (data,text,jqXHR){
						if (data && data.status=='success') {
							var conversation = $('[name=conversation]').val();
							var msg = data.message;
							if (msg.length > 0)
								$('[name=conversation]').val(conversation + "\n" + otherUser + ": " + msg);
						}
					});
			});

			$('form').submit(function(){
				var arguments = $(this).serialize();
				var url = "<?= base_url() ?>board/postMsg";
				$.post(url,arguments, function (data,textStatus,jqXHR){
						var conversation = $('[name=conversation]').val();
						var msg = $('[name=msg]').val();
						$('[name=conversation]').val(conversation + "\n" + user + ": " + msg);
						});
				return false;
				});	
		});
	
	</script>
	
	
	<script type="text/javascript" src='<?php echo base_url();?>js/arcade/gameboard.js'></script>
	
	
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
			<ul class="nav navbar-nav navbar-right">      	
				<li class="disabled">
					<a href="#" style="color:#fff;">Welcome <?= $user->fullName() ?>!</a>
				</li>  
				<li><?= anchor('account/logout','Logout') ?></li>
				<li><?= anchor('account/updatePasswordForm','Change Password') ?></li>
				<li><?php 
				if (isset($errmsg)) 
					echo "<a href='#'><p>$errmsg</p></a>";
			?>
			</ul>
		</div>
		</div>
      </div>
    </div>

    <h1 class="mid">Game Area</h1>
	<div class="row">
		<div class="container">
		<div class="col-xs-6 col-md-4">
			<div>
			Hello <?= $user->fullName() ?>  <?= anchor('account/logout','(Logout)') ?>  
			</div>
			
			<div id='status'> 
			<?php 
				if ($status == "playing")
					echo "Playing " . $otherUser->login;
				else
					echo "Wating on " . $otherUser->login;
			?>
			</div>
			
			<?php 
				$attributesForm	 = array('role'	=>	'form',
										 'class'=>	'form-inline');
				
				$attributesConvo = array('class'	=>	'form-control',
										 'rows'		=>	'10',
										 'cols'		=>	'40',
										 'name'		=>	'conversation');
										 
				$attributesInput = array('class'		=>	'form-control',
										 'type'			=>	'text',
										 'placeholder'	=>	'Text Input',
										 'name'			=>	'msg',
										 'value'		=>	'',
										 'style'		=>	'margin:10px 0px 0px 0px;');
										 
				$attributesSubmit = array('class'		=> 'btn btn-default',
        								  'name'		=> 'Send',
        								  'value'		=> 'Send',
        								  'style'		=> 'margin:10px 0px 0px 0px;');				
										 
				echo form_textarea($attributesConvo);
				
				echo form_open();
				echo form_input($attributesInput);
				echo form_submit($attributesSubmit);
				echo form_close();
			?>
		</div>
		
		<div class="col-xs-12 col-md-8">
			<canvas id="gameBoard" width="200" height="100"></canvas>
		</div>
		</div>
	</div>

		

	
	
	
</body>

</html>

