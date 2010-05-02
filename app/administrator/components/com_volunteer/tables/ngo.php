<?php
defined('_JEXEC') or die('Restricted access');
class TableNgo extends JTable
{
	var $id = null;
	var $name = null;
	var $street1 = null;
	var $street2 = null;
	var $city = null;
	var $state = null;
	var $zip = null;
	var $web = null;
	var $phone = null;
	var $email = null;
	var $mission = null;	
	var $taxstatus = null;		
	var $created_date = null;		
	var $user_id = null;
	var $ein = null;	
	var $published = 1;
	function __construct(&$db)
	{
		parent::__construct( '#__volunteer_ngo', 'id', $db );
	}
}
?>
