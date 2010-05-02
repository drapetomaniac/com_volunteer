<?php
defined('_JEXEC') or die('Restricted access');
class TablePerson extends JTable
{
	var $id = null;
	var $name = null;
	var $street1 = null;
	var $street2 = null;
	var $city = null;
	var $state = null;
	var $zip = null;
	var $phone = null;
	var $email = null;
	var $bio = null;
	var $portfolio = null;
	var $web = null;
	var $user_id = null;
	var $skills = null;
	function __construct(&$db)
	{
		parent::__construct( '#__volunteer_person', 'id', $db );
	}
}
?>
