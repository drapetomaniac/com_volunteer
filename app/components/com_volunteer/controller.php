<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.controller' );



class VolunteerController extends JController
{

	
function display()
{

	
	$document =& JFactory::getDocument();	
	// Add javascript and styles
//			$db =& JFactory::getDBO();	

	$viewName = JRequest::getVar('view', 'all');

	$viewType = $document->getType();
	$view = &$this->getView($viewName, $viewType);
	$model =& $this->getModel( $viewName, 'ModelVolunteer' );

	if (!JError::isError($model)) {
			$view->setModel( $model, true );
		}
		
	$view->setLayout('default');
	$view->display();

}


function savecreative()
{
		global $mainframe;
		global $option;
		$user =& JFactory::getUser();		
//die(print_r($_POST));	
			$row =& JTable::getInstance('person', 'Table');
			if (!$row->bind(JRequest::get('post')))
			{
				echo "<script> alert('".$row->getError()."');
				window.history.go(-1); </script>\n";
				exit();
			}

			$postedskills = JRequest::getVar( 'skills', array(0), '', 'array' );
//			$row->skills = implode( ',',$postedskills);

			$row->bio = JRequest::getVar( 'bio', '', 'post','string', JREQUEST_ALLOWRAW );
			$row->portfolio = JRequest::getVar( 'portfolio', '', 'post','string', JREQUEST_ALLOWRAW );


						$db =& JFactory::getDBO();	      
						$query = "delete from #__volunteer_skills_creatives where person_id = " . $row->id;
						$db->setQuery( $query ); 
						$db->Execute($query) ;
						
						foreach ($postedskills as $skill)
						{
							$query = "insert into #__volunteer_skills_creatives (skill_id, person_id) VALUES (" . $skill . "," . $row->id .   ")";
							$db->setQuery( $query ); 
							$db->Execute($query) ;
						}



			if (!$row->store())	{
//die(var_dump($row->getError() ));
					echo "<script> alert('".$row->getError()."');
					window.history.go(-1); </script>\n";
					exit();
			}

			//$link = JRoute::_('index.php?option=com_volunteer', false);
			
				$sender =  array();
				$sender[0] = "contact@lightscamerahelp.org" ;
				$sender[1] = "Lights. Camera. Help." ;

				jimport('joomla.mail.mail');


				$mail = new JMail(); 
				$mail->setSender($sender);
				$mail->addBCC("rich.vazquez@gmail.com");
				$mail->addRecipient("contact@lightscamerahelp.org");				
				$mail->addRecipient($user->email);	
	//			die(var_dump($mail))			;
				$mail->setSubject("[Creative] " . $row->name );

				$body = "";
				$body .= "Name of Person: ";
				$body .= $row->name . "\n";
				$body .=  "\n";
				$body .= "From: ";
				$body .= $row->city . ', ' . $row->state . "\n";
				$body .=  "\n";
				$body .= "E-mail: ";
				$body .= $user->email . "\n";
				$body .=  "\n";
				$body .= "Web: ";
				$body .= $row->web . "\n";

				$mail->setbody($body);
				$mail->useSendmail();
				$mailerr = $mail->Send();			
			
			
			$link = 'index.php?option=com_volunteer';
			$msg = JText::_( 'Your profile has been saved.');
			$mainframe->redirect($link, $msg);

}


function savengo()
{
		global $mainframe;
		global $option;
		$user =& JFactory::getUser();		
//die(print_r($_POST));	
			$row =& JTable::getInstance('ngo', 'Table');
			if (!$row->bind(JRequest::get('post')))
			{
//				die(var_dump($row->getError() ));
				echo "<script> alert('".$row->getError()."');
				window.history.go(-1); </script>\n";
				exit();
			}

#			$drinsurance = JRequest::getVar( 'insurance', array(0), '', 'array' );
#			$row->insurance = implode( ',',$drinsurance);

			$row->mission = JRequest::getVar( 'mission', '', 'post','string', JREQUEST_ALLOWRAW );


			if (!$row->store())	{
//die(var_dump($row->getError() ));
					echo "<script> alert('".$row->getError()."');
					window.history.go(-1); </script>\n";
					exit();
			}


						$sender =  array();
						$sender[0] = "contact@lightscamerahelp.org" ;
						$sender[1] = "Lights. Camera. Help." ;

						jimport('joomla.mail.mail');


						$mail = new JMail(); 
						$mail->setSender($sender);
						$mail->addBCC("rich.vazquez@gmail.com");
						$mail->addRecipient("contact@lightscamerahelp.org");				
						$mail->addRecipient($user->email);	
			//			die(var_dump($mail))			;
						$mail->setSubject("[NPO] " . $row->name );

						$body = "";
						$body .= "Name of Organization: ";
						$body .= $row->name . "\n";
						$body .= "Contact: ";
						$body .= $row->contact_name . ' ' . $row->email . "\n";						
						$body .=  "\n";
						$body .= "From: ";
						$body .= $row->city . ', ' . $row->state . "\n";
						$body .=  "\n";
						$body .= "Web: ";
						$body .= $row->web . "\n";

						$mail->setbody($body);
						$mail->useSendmail();
						$mailerr = $mail->Send();			


			//$link = JRoute::_('index.php?option=com_volunteer', false);
			$link = 'index.php?option=com_volunteer';
			$msg = JText::_( 'Your NGO has been saved.');
			$mainframe->redirect($link, $msg);

}


function saveproject()
{
		global $mainframe;
		global $option;
		$post = JRequest::get('post');
		$user =& JFactory::getUser();
//die(print_r($_POST));	
//die(print_r($post));
			$row =& JTable::getInstance('project', 'Table');

			
			
			if (!$row->bind(JRequest::get('post')))
			{
				echo "<script> alert('".$row->getError()."');
				window.history.go(-1); </script>\n";
				exit();
			}


						$date =& JFactory::getDate($post['date_to_finish']);
						$row->date_to_finish = $date->toMySQL();

						// Append time if not added to publish date
						if (strlen(trim($row->date_to_finish)) <= 10) {
							$row->date_to_finish .= ' 00:00:00';
						}
			//die(print_r( $date->toMySQL() ));


			if (!$row->store())	{
					echo "<script> alert('".$row->getError()."');
					window.history.go(-1); </script>\n";
					exit();
			}

			//$link = JRoute::_('index.php?option=com_volunteer', false);
			
				$sender =  array();
#				$sender[0] = "contact@lightscamerahelp.org" ;
				$sender[0] = "rich.vazquez@gmail.com" ;
				$sender[1] = "Lights. Camera. Help." ;

				jimport('joomla.mail.mail');


				$mail = new JMail(); 
				$mail->setSender($sender);
				$mail->addBCC("rich.vazquez@gmail.com");
				$mail->addRecipient("contact@lightscamerahelp.org");				
				$mail->addRecipient($user->email);	
	//			die(var_dump($mail))			;
				$mail->setSubject("[Project] " . $row->title );

				$body = "";
				$body .= "Nonprofit: ";
				$body .= $post['ngo_name'] . "\n";
				$body .=  "\n";
				$body .= "Project Title: ";
				$body .= $row->title . "\n";
				$body .=  "\n";
				$body .= "Mission: ";
				$body .= $row->mission . "\n";
				$body .=  "\n";
				$body .= "Comments: ";
				$body .= $row->comments . "\n";
				$body .= "E-mail: ";
				$body .= $user->email . "\n";
				$body .=  "\n";

				$mail->setbody($body);
				$mail->useSendmail();
				$mailerr = $mail->Send();			
			
			
			$link = 'index.php?option=com_volunteer';
			$msg = JText::_( 'Your project has been saved.');
			$mainframe->redirect($link, $msg);

}


}
?>