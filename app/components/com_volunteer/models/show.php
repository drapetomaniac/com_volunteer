<?php

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );


class ModelVolunteerShow extends JModel
{
	var $_person = null;
	var $_ngo= null;	


	function getPerson($id)
	{
//		$db =& JFactory::getDBO();	
		
		$user =& JFactory::getUser();
		if(!$this->_person)
		{
			$query = "SELECT * FROM #__volunteer_person WHERE published = 1 AND id = ".  $id ;
			$this->_db->setQuery($query);
//			die($query);
			$this->_person = $this->_db->loadObject();
			if(!$this->_person->published)
				{
				//JError::raiseError( 404, "Invalid ID provided" );
				return null;
				}

		}

		return $this->_person;
	}


	function getNGO($id)
	{
		$user =& JFactory::getUser();
//		$db =& JFactory::getDBO();	

		if(!$this->_ngo)
		{
			$query = "SELECT * FROM #__volunteer_ngo WHERE published = 1 AND id = " . $id  ;
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
	
#__volunteer_person WHERE published = 1 AND id = ".  $id ;
	
	function getCreativeSkills($id)
	{
			$db =& JFactory::getDBO();			
			$query = "SELECT distinct skill FROM #__volunteer_skills_creatives sc, #__volunteer_person  p, #__volunteer_skills s " .
			" WHERE sc.person_id = p.id " .
			" AND s.id = sc.skill_id " .
			" AND  p.id  = " . 	$id . 	
			" ORDER BY 1 ASC" ;
			$db->setQuery( $query);
			$rows = $db->loadObjectList();
//die(var_dump($rows));
		return $rows;
	}	

				
}
?>