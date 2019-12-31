<?php
$view = '<div class="container">
<div class="row">
	<div class="col-12 col-sm-3">';
	foreach($data as $row) {
	        $view .=  '<span id="='.$row['name'].'" class="category">'.$row['name'].'</span><br>';
	   }
	$view .= '</div>';

?>