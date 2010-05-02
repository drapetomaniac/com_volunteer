<?php defined( '_JEXEC' ) or die( 'Restricted access' ); 
	global $option;
?>


<?php 

foreach ($this->ngos as $ngo)
{
	echo '<div class="brosengo">';
	echo '<a class="browsecreative" href="index.php?option=com_volunteer&view=show&task=ngo&id=' . $ngo->id . '">' . $ngo->name . "</a>";
	echo '</div>';	
}

?>



<?php 
//var_dump($this->ngos);
?>