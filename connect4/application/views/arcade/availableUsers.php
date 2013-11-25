
<table class="table table-hover">
<?php 
	if ($users) {
		foreach ($users as $user) {
			if ($user->id != $currentUser->id) {
?>		
			<tr>
			<td> 
			<h4><?= anchor("arcade/invite?login=" . $user->login,$user->fullName()) ?></h4> 
			</td>
			</tr>

<?php 	
			}
		}
	}
?>

</table>