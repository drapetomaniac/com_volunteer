<?php defined( '_JEXEC' ) or die( 'Restricted access' ); 
	global $option;
	$editor =& JFactory::getEditor();
//var_dump($this) ;
//$task = JRequest::getVar('task', '');

?>

<p>

</p>
<form action="index.php" method="post">
	<table id="registerngo">
		<tr>
			<td>
				<strong>Organization Name:</strong>
			</td>
			<td>
				<input class="text_area" type="text" name="name" id="name" value="<?php echo $this->ngo_name; ?>">
			</td>
		</tr>

		<tr>
			<td>
				<strong>Contact Name:</strong>
			</td>
			<td>
				<input class="text_area" type="text" name="contact_name" id="contact_name" value="<?php echo $this->contact_name; ?>">
			</td>
		</tr>

		<tr>
			<td>
				<strong>Web site:</strong>
			</td>
			<td>
				<input class="text_area" type="text" name="web" id="web" value="<?php echo $this->ngo_web; ?>">
			</td>
		</tr>



		<tr>
			<td>
				<strong>Street1:</strong>
			</td>
			<td>
				<input class="text_area" type="text" name="street1" id="street1" value="<?php echo $this->ngo_street1; ?>">
			</td>
		</tr>


		<tr>
			<td>
				<strong>Street2</strong>
			</td>
			<td>
				<input class="text_area" type="text" name="street2" id="street2" value="<?php echo $this->ngo_street2; ?>">
			</td>
		</tr>
		
		<tr>
			<td>
				<strong>City:</strong>
			</td>
			<td>
				<input class="text_area" type="text" name="city" id="city" value="<?php echo $this->ngo_city; ?>">
			</td>
		</tr>		

		<tr>
			<td>
				<strong>State:</strong>
			</td>
			<td>
				<input class="text_area" type="text" name="state" id="state" value="<?php echo $this->ngo_state; ?>">
			</td>
		</tr>


		<tr>
			<td>
				<strong>Zip:</strong>
			</td>
			<td>
				<input class="text_area" type="text" name="zip" id="zip" value="<?php echo $this->ngo_zip; ?>">
			</td>
		</tr>


		<tr>
			<td>
				<strong>Phone:</strong>
			</td>
			<td>
				<input class="text_area" type="text" name="phone" id="phone" value="<?php echo $this->ngo_phone; ?>">
			</td>
		</tr>

		<tr>
			<td>
				<strong>E-mail:</strong>
			</td>
			<td>
				<input class="text_area" type="text" name="email" id="email" value="<?php echo $this->ngo_email; ?>">
			</td>
		</tr>
		<tr>
			<td>
				<strong>Are you a 501?</strong>
			</td>
			<td>
				<input class="text_area" type="text" name="taxstatus" id="taxstatus" value="<?php echo $this->ngo_taxstatus; ?>">
			</td>
		</tr>

		<tr>
			<td>
				<strong>EIN:</strong>
			</td>
			<td>
				<input class="text_area" type="text" name="ein" id="ein" value="<?php echo $this->ngo_ein; ?>">
			</td>
		</tr>


		<tr>
			<td colspan="2">
				<strong>Mission:</strong>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php
				echo $editor->display( 'mission', $this->ngo_mission ,'100%', '150', '40', '5' ) ;
				?>
			</td>
		</tr>



	</table>
	<input type="hidden" name="user_id" value="<?php echo $this->user_id; ?>"> 
	<input type="hidden" name="id" value="<?php echo $this->ngo_id; ?>"> 	
	<input type="hidden" name="task" value="savengo"> 
	<input type="hidden" name="option" value="com_volunteer"> 
	<input type="submit" class="button" id="button" value="Submit">
</form>

