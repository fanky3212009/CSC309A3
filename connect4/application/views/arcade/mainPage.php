
<!DOCTYPE html>

<html>
	
	<head>
		<?php $this->load->view('header');?>

	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
	<script src="<?= base_url() ?>/js/jquery.timers.js"></script>
	<script>
		$(function(){
			$('#availableUsers').everyTime(500,function(){
					$('#availableUsers').load('<?= base_url() ?>arcade/getAvailableUsers');

					$.getJSON('<?= base_url() ?>arcade/getInvitation',function(data, text, jqZHR){
							if (data && data.invited) {
								var user=data.login;
								var time=data.time;
								if(confirm('Play ' + user)) 
									$.getJSON('<?= base_url() ?>arcade/acceptInvitation',function(data, text, jqZHR){
										if (data && data.status == 'success')
											window.location.href = '<?= base_url() ?>board/index'
									});
								else  
									$.post("<?= base_url() ?>arcade/declineInvitation");
							}
						});
				});
			});
	
			
	</script>
	
		<style>
			body {
			  padding-top: 50px;
			}
			.mid {
			  padding: 40px 15px 0px 0px;
			  text-align: center;
			}
		</style>
	</head> 
	
		
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
	<body>  
		
		<div class="container">
	      <div class="mid">
	        <h1>Dashboard</h1>
	        <p class="lead">Wait for an invitation or challenge another player</p>
	      </div>
	    </div>
		
		<div class="container">
			<h2>Available Users</h2>
			<div id="availableUsers">
			</div>
		</div>
	</body>

</html>

