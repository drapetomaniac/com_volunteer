<?php defined( '_JEXEC' ) or die( 'Restricted access' ); 
	global $option;
?>

	<div class="componentheading">
		Volunteer Match
		<a id="backtodash" href="index.php?option=com_volunteer">Back to the Volunteer Match Dashboard</a>
	</div>



<div id="volbody">


<?php 
//print_r($this->task);
# load tmpl example
# echo $this->loadTemplate('facets');  



if ($this->task == 'creative'){
	echo $this->loadTemplate('creative');  
}
elseif ($this->task == 'ngo'){
	echo $this->loadTemplate('ngo');  
}


?>



</div>
	
