<?php defined( '_JEXEC' ) or die( 'Restricted access' ); 
	global $option;
?>

	<div class="componentheading">
		Volunteer Match
		<a id="backtodash" href="index.php?option=com_volunteer">Back to the Volunteer Match Dashboard</a>
	</div>



<div id="volbody">
<?php 
//die(var_dump($this->task));
# load tmpl example
# echo $this->loadTemplate('facets');  

if ($this->task == 'creatives'){
	echo $this->loadTemplate('creative');  
}
elseif ($this->task == 'ngo'){
	echo $this->loadTemplate('ngo');  
}
else{
	echo $this->loadTemplate('skills');  
}

?>



</div>