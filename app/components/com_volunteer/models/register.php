<?php

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );

jimport( 'joomla.user.user' );
class ModelVolunteerRegister extends JModel
{
//die('bork');
	var $_person = null;
	var $_ngo = null;	
	var $_project = null;		
	var $_skills = null;	
	var $_myskills = null;		
		
	function getPerson()
	{
		
		$user = JFactory::getUser();
		if(!$this->_person)
		{
			$query = "SELECT * FROM #__volunteer_person WHERE published = 1 AND user_id = " . $user->id ;
			$this->_db->setQuery($query);
			$this->_person = $this->_db->loadObject();
			if(!$this->_person->published)
				{
				//JError::raiseError( 404, "Invalid ID provided" );

				return null;
				}
			}
		return $this->_person;		
	}


	function getNGO()
	{
		
		$user =& JFactory::getUser();
		
		if(!$this->_ngo)
		{
			$query = "SELECT * FROM #__volunteer_ngo WHERE published = 1 AND user_id = " . $user->id ;
			$this->_db->setQuery( $query);

			$this->_ngo = $this->_db->loadObject();

			if(!$this->_ngo->published)
				{
				//JError::raiseError( 404, "Invalid ID provided" );
				return null;
				}
		}
			return $this->_ngo;
	}
	
	function getSkills()
	{
		
		if(!$this->_skills)
		{
			$query = "SELECT * FROM #__volunteer_skills WHERE published = 1 ";
			$this->_db->setQuery( $query);


			$this->_skills = $this->_db->loadAssocList();
		}
			return $this->_skills;
	}

		function getPeopleSkills($personid)
		{

				$query = "SELECT skill_id FROM #__volunteer_skills_creatives WHERE person_id = " . $personid ;
				$this->_db->setQuery( $query);
				$this->_myskills = $this->_db->loadResultArray();
				return $this->_myskills;
		}

		function getProject()
		{

			$user =& JFactory::getUser();
//die(var_dump($user));
			if(!$this->_project)
			{
				$query = "SELECT * FROM #__volunteer_project WHERE completed = 0 AND user_id = " . $user->id ;
				$this->_db->setQuery( $query);
//die(var_dump($query));
				$this->_project = $this->_db->loadObject();
//die(var_dump($this->_project));
			}
				return $this->_project;
		}


				
}
?>