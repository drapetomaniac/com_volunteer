<?php defined( '_JEXEC' ) or die( 'Restricted access' );
		$base = JURI::base();    
?>
<p>
<img class="volnonprofitimg" src="<?php echo $base;?>/templates/lch/images/volunteer-nonprofits.png">
</p>
<p>
	<a href="<?php 	echo 'index.php?option=com_volunteer&view=register&task=project'; ?>">
			Create a Project
	</a>
</p>

<p>
	<a href="<?php 	echo 'index.php?option=com_volunteer&view=register&task=ngo'; ?>">
			Edit Your Nonprofit Profile
	</a>
</p>
<p>
	<a href="index.php?option=com_volunteer&view=browse">
	Browse creatives 
	</a>
</p>

