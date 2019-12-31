<?php
$view = '
<div id="content" class="col-12 col-sm-9">';
$view .="<div class='row'>";
foreach($data as $row) {
	   $view .= '<div  class="col-12 col-sm-6 col-lg-4 item">';
       $view .= '<li><center><img src="./images/'.$row['images'].'"/></center><br>';
       $view .= '<p class="title">'.$row['name'].'</p>';
       $view .= '<p class="price">'.$row['price'].'грн.</p></li>';
       $view .= '<center><button data-toggle="modal" data-target="#exampleModal" data-id='.$row['id'].' data-price='.$row['price'].' data-name="'.$row['name'].'" data-img="'.$row['images'].'" class="buy" >Купить</button></center>';
       $view .= '</div>';
    }
$view .= '</div>';
$view .= '</div>
</div>
</div>';


?>