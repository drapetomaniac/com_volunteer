<?php defined( '_JEXEC' ) or die( 'Restricted access' ); 
	global $option;
//die (var_dump($this) );

?>

<p>

</p>
<form action="index.php" method="post">
	<table id="registerproject" width="400">
	
	<tr>
		<td>
			<strong>Project Title:</strong>
		</td>
		<td>
			<input class="text_area" type="text" name="title" id="title" value="<?php echo $this->project_title; ?>">
		</td>
	</tr>	
	
	
		<tr>
			<td>
				<strong>Project Mission:</strong>
			</td>
			<td>
		  <textarea  rows=5  cols=40 class="text_area" type="text" name="mission" id="mission" ><?php echo $this->project_mission; ?></textarea>				
			</td>
		</tr>


	<tr>
		<td>
			<strong>Project Comments:</strong>
		</td>
		<td>
		  <textarea  rows=5  cols=40 class="text_area" type="text" name="comments" id="comments" ><?php echo $this->project_comments; ?></textarea>
		</td>
	</tr>



	</table>
<?php //die(var_dump($this))
?>
	<input type="hidden" name="user_id" value="<?php echo $this->user_id; ?>"> 
	<input type="hidden" name="id" value="<?php echo $this->project_id; ?>"> 	
	<input type="hidden" name="ngo_id" value="<?php echo $this->ngo_id; ?>"> 		
	<input type="hidden" name="ngo_name" value="<?php echo $this->ngo_name; ?>"> 	
	<input type="hidden" name="task" value="saveproject"> 
	<input type="hidden" name="option" value="com_volunteer"> 
	<input type="submit" class="button" id="button" value="Submit">
</form>

