<?php

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
require_once( JPATH_COMPONENT.DS.'helper'.DS.'helper.php' );
class VolunteerViewShow extends JView
{


function display($tpl = null)
{
	checklogin();
	global $option;

	$document =& JFactory::getDocument();		
	$base = JURI::base();    
	$document->addCustomTag( '<script type="text/javascript" 	src="'.dirname($_SERVER['PHP_SELF']).'components'.DS.'com_volunteer'.DS.'includes'.DS.'volunteer.js"></script>' );
	$document->addHeadLink($base."/components/com_volunteer/includes/volunteer.css", "stylesheet", "rel");


	$task  = null;
	$model = &$this->getModel();

	$id = JRequest::getVar('id', 0);

	$creative = 	$model->getPerson($id);
	$ngo = 	$model->getNGO($id);	

	$this->_id = $id;
	$creativeskills = $model->getCreativeSkills($id);
	
//die(var_dump($creative));
	$user =& JFactory::getUser();


	$task = JRequest::getVar('task');
	$postedskill = JRequest::getVar('skill');
#	$creatives = 	$model->getCreatives($postedskill);	

	$this->assignRef('creative', $creative);
	$this->assignRef('ngo', $ngo);	
	$this->assignRef('user_id', $user->id);	
	$this->assignRef('creativeskills', $creativeskills);		
	$this->assignRef('volunteer', $volunteer);			
	$this->assignRef('task', $task);
	$this->assignRef('option', $option);

	parent::display($tpl);

}
}
?>
