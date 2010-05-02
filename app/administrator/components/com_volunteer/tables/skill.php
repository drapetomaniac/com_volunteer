<?php
defined('_JEXEC') or die('Restricted access');
class TableSkill extends JTable
{
	var $id = null;
	var $skill = null;
	var $published = null;
	function __construct(&$db)
	{
		parent::__construct( '#__volunteer_skills', 'id', $db );
	}
}
?>