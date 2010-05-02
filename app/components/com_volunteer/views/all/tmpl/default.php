<?php defined( '_JEXEC' ) or die( 'Restricted access' ); 
	global $option;
//var_dump($this->user_id)	;

?>

	<div class="componentheading">
		Volunteer Match
		<!--a id="backtodash" href="index.php?option=com_user&task=login">Logout</a-->		
	</div>

<?php 

if ($this->user_id > 0 ){
	echo $this->loadTemplate('dashboard');
}
else{
	echo $this->loadTemplate('public');  
 
}

?>



