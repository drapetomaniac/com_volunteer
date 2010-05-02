<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
//die(var_dump($this));
function checklogin()
{	
	$user =& JFactory::getUser();
//	die(var_dump($user));
	if (!$user->id){
		jimport( 'joomla.application.component.controller' );
		$link = JRoute::_('index.php?option=com_volunteer' , false);
		$controller = new VolunteerController();
		$controller->setRedirect($link);
		$controller->redirect();	
	}

}
?>