<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
class ModelVolunteerPerson extends JModel
{
	var $_person = null;
	var $_id = null;
	
	function __construct()
	{
		parent::__construct();
		$id = JRequest::getVar('id', 0);
		$this->_id = $id;
	}
	
	function getPerson()
	{
		if(!$this->_person)
		{
			$query = "SELECT * FROM #__volunteer_person WHERE id = '" . $this->_id . "'";
			$this->_db->setQuery($query);
			$this->_person = $this->_db->loadObject();
			if(!$this->_person->published)
				{
				JError::raiseError( 404, "Invalid ID provided" );
				}
		}
		return $this->_person;
	}
	

	
	function getSkills()
	{
			$db =& JFactory::getDBO();			
			$query = "SELECT distinct skill FROM #__volunteer_skills WHERE published = '1' ORDER BY 1 ASC" ;
			$db->setQuery( $query);
			$rows = $db->loadObjectList();

		return $rows;
	}

	function getFacets()
	{
		if(!$this->_facets)
		{
			$db =& JFactory::getDBO();
			$query = "SELECT * FROM #__volunteer_person WHERE published = '1'";
			$db->setQuery( $query);
		}
			$rows = $db->loadObjectList();
//		die(print_r($rows));
		return $rows;

	}


	function makeHit($id)
	{
			$db =& JFactory::getDBO();			
			$query = "UPDATE #__volunteer_person SET hits = hits + 1 WHERE id = " . $id ;
			$db->setQuery( $query);
			$db->query( $query);			
#			$rows = $db->loadObjectList();

#		return $rows;
	}


	
}	
	
?>