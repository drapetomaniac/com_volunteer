<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
class ModelVolunteerNgo extends JModel
{
	var $_doctor = null;
	var $_id = null;
	var $_facets = null;
	function __construct()
	{
		parent::__construct();
		$id = JRequest::getVar('id', 0);
		$this->_id = $id;
	}
	
	function getPerson()
	{
		if(!$this->_doctor)
		{
			$query = "SELECT * FROM #__volunteer_doctors WHERE id = '" . $this->_id . "'";
			$this->_db->setQuery($query);
			$this->_doctor = $this->_db->loadObject();
			if(!$this->_doctor->published)
				{
				JError::raiseError( 404, "Invalid ID provided" );
				}
		}
		return $this->_doctor;
	}
	

	
	function getHospitals()
	{
			$db =& JFactory::getDBO();			
			$query = "SELECT distinct business_name FROM #__volunteer_skills WHERE published = '1' ORDER BY 1 ASC" ;
			$db->setQuery( $query);
			$rows = $db->loadObjectList();

		return $rows;
	}

	function getFacets()
	{
		if(!$this->_facets)
		{
			$db =& JFactory::getDBO();
			$query = "SELECT * FROM #__volunteer_doctors WHERE published = '1'";
			$db->setQuery( $query);
		}
			$rows = $db->loadObjectList();
//		die(print_r($rows));
		return $rows;

	}


	function makeHit($id)
	{
			$db =& JFactory::getDBO();			
			$query = "UPDATE #__volunteer_doctors SET hits = hits + 1 WHERE id = " . $id ;
			$db->setQuery( $query);
			$db->query( $query);			
#			$rows = $db->loadObjectList();

#		return $rows;
	}


	
}	
	
?>