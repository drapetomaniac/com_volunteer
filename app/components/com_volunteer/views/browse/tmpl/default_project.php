<?php defined( '_JEXEC' ) or die( 'Restricted access' ); 
	global $option;
?>


<?php 

foreach ($this->creatives as $creative)
{
	echo '<a class="browsecreative" href="index.php?option=com_volunteer&view=show&task=creative&id=' . $creative->id . '">' . $creative->name . "</a>";
}

?>



