<?php
defined('_JEXEC') or die('Restricted access');
require_once( JPATH_COMPONENT.DS.'controller.php' );


JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_volunteer'.DS.'tables');

//echo '<div class="componentheading">Volunteer Directory</div>';

$controller = new VolunteerController();

$controller->execute( JRequest::getVar( 'task' ) );

$controller->redirect();

?>



