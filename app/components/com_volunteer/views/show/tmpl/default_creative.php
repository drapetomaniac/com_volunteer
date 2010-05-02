<?php defined( '_JEXEC' ) or die( 'Restricted access' ); 
	global $option;
?>



<div id="creative">

<?php 

//print_r(var_dump($this->creative));
# load tmpl example
# echo $this->loadTemplate('facets');  

if ($this->creative->name){
echo '<div class="creativename">';
echo $this->creative->name;	
echo "</div>";
}


if ($this->creative->email){
echo '<div class="creativeemail">';
echo '<a href="mailto:' . $this->creative->email . '">' . $this->creative->email . '</a>';	
echo "</div>";
}

if ($this->creative->web){
echo '<div class="creativeweb">';
echo '<a target="_blank" href="' . $this->creative->web . '">' . $this->creative->web . '</a>';	
echo "</div>";
}

echo '<div class="creativeskills">';
echo "<strong>Skills:</strong> ";
foreach ($this->creativeskills as $skill){
	echo $skill->skill . ' ';
}
echo "</div>";



if ($this->creative->bio){
echo '<div class="creativebio">';
echo '<h4>About</h4>';
echo $this->creative->bio;	
echo "</div>";
}

if ($this->creative->portfolio){
echo '<div class="creativeportfolio">';
echo '<h4>Portolio</h4>';
echo $this->creative->portfolio;	
echo "</div>";
}


?>





</div>