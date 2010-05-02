<?php defined( '_JEXEC' ) or die( 'Restricted access' ); 
	global $option;
?>


	<div class="volunteerintro">
		You can currently browse creatives by skill.  Click a skill to find someone who has registered this skill.
	</div>

<?php 
# load tmpl example
# echo $this->loadTemplate('facets');  

//die(var_dump($this->skills));

foreach ($this->skills as $skill)
{
	$url = 'index.php?option=com_volunteer&view=browse&task=creatives&skill=' . $skill->id;
	echo "<a href='". $url . "'>" . $skill->skill . "</a><br />";
}


?>