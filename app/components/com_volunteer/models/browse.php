<?php

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );


class ModelVolunteerBrowse extends JModel
{
	var $_creatives = null;
	var $_ngo = null;	
	var $_skills = null;		
	var $_ngos = null;	

	function getCreatives($postedskill)
	{
		if(!$this->_creatives)
		{
			$query = "SELECT * FROM #__volunteer_person p, #__volunteer_skills_creatives c WHERE p.published = 1  " .
			 				" and p.id = c.person_id and c.skill_id = " . $postedskill;
			$this->_db->setQuery($query);
//			die($query);
			$this->_creatives = $this->_db->loadObjectList();

		}

		return $this->_creatives;
	}


	function getNGOs()
	{
		if(!$this->_creatives)
		{
			$query = "SELECT * FROM #__volunteer_ngo n order by name ASC ";
			$this->_db->setQuery($query);

			$this->_ngos = $this->_db->loadObjectList();
//die(var_dump($this->_ngos));
		}

		return $this->_ngos;
	}



	function getNGO()
	{
		$user =& JFactory::getUser();
//		$db =& JFactory::getDBO();	

		if(!$this->_ngo)
		{
			$query = "SELECT * FROM #__volunteer_ngo WHERE published = 1 AND user_id = " . $user->id  ;
//							die(var_dump($query));
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
			$db =& JFactory::getDBO();			
			$query = "SELECT distinct id,skill FROM #__volunteer_skills WHERE published = '1' ORDER BY 1 ASC" ;
			$db->setQuery( $query);
			$rows = $db->loadObjectList();

		return $rows;
	}
	

				
}
?>