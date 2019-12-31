<?php
$selected_min = "selected";
$selected_max = "";
$selected_name = "";
switch ($sort) {
	case 'min_price':
		$selected_min = "selected";
		$selected_max = "";
		$selected_name = "";
		break;
	case 'max_price':
		$selected_min = "";
		$selected_max = "selected";
		$selected_name = "";
		break;
	case 'a_z':
		$selected_min = "";
		$selected_max = "";
		$selected_name = "selected";
		break;
	
	default:
		# code...
		break;
}

$view = '
<div id="content" class="col-12 col-sm-9">';
$view .= '<form><input type="hidden" id="category_goods" value="'.$category.'">
		<select name="sort" id="sort" onchange="sort_goods(event);">
		    <option value="min_price" '.$selected_min.' selected>Дешевле сверху</option>
		    <option value="a_z" '.$selected_name.'>А-Я</option>
		    <option value="max_price" '.$selected_max.'>Дороже сверху</option>
		</select>
		</form><div class="row">';
foreach($data as $row) {
	   $view .= '<div  class="col-12 col-sm-6 col-lg-4 item">';
       $view .= '<li><center><img src="./images/'.$row['images'].'"/></center><br>';
       $view .= '<p class="title">'.$row['name'].'</p>';
       $view .= '<p class="price">'.$row['price'].'грн.</p></li>';
       $view .= '<center><button data-toggle="modal" data-target="#exampleModal" data-id='.$row['id'].' data-price='.$row['price'].' data-name="'.$row['name'].'" data-img="'.$row['images'].'" class="buy" >Купить</button></cebter>';
       $view .= '</div>';
    }

$view .= '</div>
</div>
</div>';


?>