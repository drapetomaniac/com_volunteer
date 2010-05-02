<?php

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
require_once( JPATH_COMPONENT.DS.'helper'.DS.'helper.php' );
class VolunteerViewBrowse extends JView
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
	$skills = 	$model->getSkills();


	$user =& JFactory::getUser();


	$task = JRequest::getVar('task');
	$postedskill = JRequest::getVar('skill');
	$creatives = 	$model->getCreatives($postedskill);	
	$ngos = 	$model->getNGOs();		

	$this->assignRef('ngos', $ngos);
	$this->assignRef('creatives', $creatives);	
	$this->assignRef('list', $list);
	$this->assignRef('user_id', $user->id);	
	$this->assignRef('skills', $skills);		
	$this->assignRef('volunteer', $volunteer);			
	$this->assignRef('task', $task);
	$this->assignRef('option', $option);

	parent::display($tpl);

}
}
?>
