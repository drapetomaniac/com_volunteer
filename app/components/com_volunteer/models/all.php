<?php

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );


class ModelVolunteerAll extends JModel
{
	var $_person = null;
	var $_ngo= null;	

	function getPerson()
	{
//		$db =& JFactory::getDBO();	
		
		$user =& JFactory::getUser();
		if(!$this->_person)
		{
			$query = "SELECT * FROM #__volunteer_person WHERE published = 1 AND user_id = " . $user->id ;
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
	
	

				
}
?>