<?php defined( '_JEXEC' ) or die( 'Restricted access' ); 
	global $option;
//die (var_dump($this) );
//$task = JRequest::getVar('task', '');
	$editor =& JFactory::getEditor();
?>

<p>

</p>
<form action="index.php" method="post">
	<table id="registercreative" width="400">
		<tr>
			<td>
				<strong>Name:</strong>
			</td>
			<td>
				<input class="text_area" type="text" name="name" id="name" value="<?php echo $this->person_name; ?>">
			</td>
		</tr>

		<tr>
			<td>
				<strong>Street1:</strong>
			</td>
			<td>
				<input class="text_area" type="text" name="street1" id="street1" value="<?php echo $this->person_street1; ?>">
			</td>
		</tr>


		<tr>
			<td>
				<strong>Street2</strong>
			</td>
			<td>
				<input class="text_area" type="text" name="street2" id="street2" value="<?php echo $this->person_street2; ?>">
			</td>
		</tr>
		
		<tr>
			<td>
				<strong>City:</strong>
			</td>
			<td>
				<input class="text_area" type="text" name="city" id="city" value="<?php echo $this->person_city; ?>">
			</td>
		</tr>		

		<tr>
			<td>
				<strong>State:</strong>
			</td>
			<td>
				<input class="text_area" type="text" name="state" id="state" value="<?php echo $this->person_state; ?>">
			</td>
		</tr>


		<tr>
			<td>
				<strong>Zip:</strong>
			</td>
			<td>
				<input class="text_area" type="text" name="zip" id="zip" value="<?php echo $this->person_zip; ?>">
			</td>
		</tr>


		<tr>
			<td>
				<strong>Phone:</strong>
			</td>
			<td>
				<input class="text_area" type="text" name="phone" id="phone" value="<?php echo $this->person_phone; ?>">
			</td>
		</tr>

		<tr>
			<td>
				<strong>E-mail:</strong>
			</td>
			<td>
				<input class="text_area" type="text" name="email" id="email" value="<?php echo $this->person_email; ?>">
			</td>
		</tr>


		<tr>
			<td colspan="2">
				<strong>Skills:</strong>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php
				echo $this->peopleskilllist;
				?>
			</td>
		</tr>
		
		<tr>
			<td colspan="2">
				<strong>Bio:</strong>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php
				echo $editor->display( 'bio', $this->person_bio ,'100%', '150', '40', '5' ) ;
				?>
			</td>
		</tr>


		<tr>
			<td colspan="2">
				<strong>Portfolio:</strong>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<?php
				echo $editor->display( 'portfolio', $this->person_portfolio ,'100%', '150', '40', '5' ) ;
				?>
			</td>
		</tr>


		<tr>
			<td>
				<strong>Web:</strong>
			</td>
			<td>
				<input class="text_area" type="text" name="web" id="web" value="<?php echo $this->person_web; ?>">
			</td>
		</tr>


	</table>
	<input type="hidden" name="user_id" value="<?php echo $this->user_id; ?>"> 
	<input type="hidden" name="id" value="<?php echo $this->person_id; ?>"> 	
	<input type="hidden" name="task" value="savecreative"> 
	<input type="hidden" name="option" value="com_volunteer"> 
	<input type="submit" class="button" id="button" value="Submit">
</form>

