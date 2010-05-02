<?php
defined('_JEXEC') or die('Restricted access');
class TableProject extends JTable
{
	var $id = null;
	var $title = null;
	var $ngo_id = null;	
	var $user_id = null;		
	var $mission = null;
	var $comments = null;
	var $date_to_finish = null;
//	var $completed = null;	
	
	
	
	function __construct(&$db)
	{
		parent::__construct( '#__volunteer_project', 'id', $db );
	}
}
?>
