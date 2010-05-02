<?php defined( '_JEXEC' ) or die( 'Restricted access' ); 
	global $option;
?>



<div id="ngo">

<?php 

//print_r(var_dump($this->ngo));
# load tmpl example
# echo $this->loadTemplate('facets');  

if ($this->ngo->name){
echo '<div class="ngoname">';
echo $this->ngo->name;	
echo "</div>";
}


if ($this->ngo->email){
echo '<div class="ngoemail">';
echo '<a href="mailto:' . $this->ngo->email . '">' . $this->ngo->email . '</a>';	
echo "</div>";
}

if ($this->ngo->web){
echo '<div class="ngoweb">';
echo '<a target="_blank" href="' . $this->ngo->web . '">' . $this->ngo->web . '</a>';	
echo "</div>";
}



if ($this->ngo->mission){
echo '<div class="ngomission">';
echo '<h4>About</h4>';
echo $this->ngo->mission;	
echo "</div>";
}

?>





</div>