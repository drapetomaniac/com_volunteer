<?php

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
require_once( JPATH_COMPONENT.DS.'helper'.DS.'helper.php' );
//die(JPATH_COMPONENT);
class VolunteerViewAll extends JView
{


	function display($tpl = null)
	{
		global $option;

		//add mootools effects
		$document =& JFactory::getDocument();		
		$base = JURI::base();    
		$document->addCustomTag( '<script type="text/javascript" 
			src="'.dirname($_SERVER['PHP_SELF']).'components'.DS.'com_volunteer'.DS.'includes'.DS.'volunteer.js"></script>' );
		$document->addHeadLink($base."/components/com_volunteer/includes/volunteer.css", "stylesheet", "rel");


		$task  = null;
		$model = &$this->model;


		$user =& JFactory::getUser();

		$task = JRequest::getVar('task');


		$this->assignRef('list', $list);
		$this->assignRef('user_id', $user->id);	
		$this->assignRef('ngo', $ngo);		
		$this->assignRef('volunteer', $volunteer);			
		$this->assignRef('task', $task);
		$this->assignRef('option', $option);

		parent::display($tpl);

	}
}
?>
