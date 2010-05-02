<?php defined( '_JEXEC' ) or die( 'Restricted access' );
//die(var_dump($model));

$model = &$this->getModel();
$ngo = $model->getNGO();
$volunteer = $model->getPerson();
// var_dump($this);
?>

<div id="dash-wrap">

<div id="creative-dash">
<?php
		if ($volunteer){
			echo $this->loadTemplate('creative-options');  
		}
		else
		{
			echo $this->loadTemplate('creative-signup');  			
		}
?>	
	</div>
	
	
<div id="ngo-dash">
<?php
		if ($ngo){
			echo $this->loadTemplate('ngo-options');  			
		}
		else
		{
			echo $this->loadTemplate('ngo-signup');  			
		}
?>	
	</div>	
	
	
</div>