<?php

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
require_once( JPATH_COMPONENT.DS.'helper'.DS.'helper.php' );


class VolunteerViewRegister extends JView
{


function display($tpl = null)
{
	checklogin();
	global $option;

	$document =& JFactory::getDocument();		
	$base = JURI::base();    
	$document->addCustomTag( '<script type="text/javascript" 	src="'.dirname($_SERVER['PHP_SELF']).'components'.DS.'com_volunteer'.DS.'includes'.DS.'volunteer.js"></script>' );
	$document->addHeadLink($base."/components/com_volunteer/includes/volunteer.css", "stylesheet", "rel");
	$document->addCustomTag( '<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>' );
	
	$document->addHeadLink("http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/eggplant/jquery-ui.css", "stylesheet", "rel");


	$task  = null;
	$model = &$this->getModel();
//die(var_dump($this));

	$task = JRequest::getVar('task');
	$user =& JFactory::getUser();
	$user_id = $user->get('id');
//	die( $usr_id);
//die(var_dump($user));
//die(var_dump($model));
	$this->assignRef('list', $list);
	$this->assignRef('user_id', $user->id);	
	$this->assignRef('task', $task);
	$this->assignRef('option', $option);

//die(var_dump($this));
	$person = $model->getPerson();
	$ngo = $model->getNGO();
	$project = $model->getProject();	
//	die(var_dump($project));
	$skills = 	$model->getSkills();
	$myskills = $model->getPeopleSkills($person->id);	
//	die(var_dump($myskills));

	$lists = array();
	$skilllist = array();
	foreach ($skills as $skill)
	{
		if ($skill['skill'] == 'Editor') {
			$selected = 'selected' ;
		}
		else{
			 $selected = null;
		}
		$skilllist[] = array('value' => $skill['id'],'text' => $skill['skill'],'select' => 'true' );
	}

	$lists['peopleskilllist'] = JHTML::_('select.genericList',
										$skilllist, 
										'skills[]', 
										'class="inputbox" multiple="multiple" '. '', 
										'value',
										'text',
										 $myskills );

	$this->assignRef('peopleskilllist', $lists['peopleskilllist']);	
	
	

//	die(var_dump($ngo->name));
//	die(var_dump($skilllist));
	$this->assignRef('person_id', $person->id);	
	$this->assignRef('person_user_id', $person->user_id);		
	$this->assignRef('person_name', $person->name);
	$this->assignRef('person_street1', $person->street1);	
	$this->assignRef('person_street2', $person->street2);	
	$this->assignRef('person_city', $person->city);	
	$this->assignRef('person_state', $person->state);		
	$this->assignRef('person_zip', $person->zip);
	$this->assignRef('person_phone', $person->phone);	
	$this->assignRef('person_email', $person->email);	
	$this->assignRef('person_bio', $person->bio);	
	$this->assignRef('person_portfolio', $person->portfolio);			
	$this->assignRef('person_web', $person->web);	
	$this->assignRef('person_skills', $person->skills);	

	$this->assignRef('ngo_id', $ngo->id);		
	$this->assignRef('ngo_user_id', $ngo->user_id);		
	$this->assignRef('ngo_name', $ngo->name);
	$this->assignRef('ngo_street1', $ngo->street1);	
	$this->assignRef('ngo_street2', $ngo->street2);	
	$this->assignRef('ngo_city', $ngo->city);	
	$this->assignRef('ngo_state', $ngo->state);		
	$this->assignRef('ngo_zip', $ngo->zip);
	$this->assignRef('ngo_phone', $ngo->phone);	
	$this->assignRef('ngo_email', $ngo->email);	
	$this->assignRef('ngo_web', $ngo->web);
	$this->assignRef('ngo_ein', $ngo->ein);
	$this->assignRef('ngo_mission', $ngo->mission);
	$this->assignRef('ngo_taxstatus', $ngo->taxstatus);			

	$this->assignRef('project_id', $project->id);		
	$this->assignRef('project_user_id', $project->user_id);		
	$this->assignRef('project_title', $project->title);
	$this->assignRef('project_mission', $project->mission);
	$this->assignRef('project_comments', $project->comments);	
	$this->assignRef('project_date_to_finish', $project->date_to_finish);		
	$this->assignRef('project_ngo_id', $project->ngo_id);		
	$this->assignRef('project_date_to_finish', $project->date_to_finish);		

//die(var_dump(	$this))	;
	

	parent::display($tpl);
//die('bork');
}
}
?>
