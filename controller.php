<?php
require "./Model/Model.php";

$model = new Model();

//Data goods by first loading

if(!isset($_GET['category']) && !isset($_GET['category_'])){
	$goods = $model->template('goods', $model->data('goods', "all", "default"), null, null);
//Data goods by loading witch get parameters
}else if(!isset($_GET['category']) && isset($_GET['category_'])){
	$category_name = $_GET['category_'] ? $_GET['category_'] : "all";
	if(isset( $_GET['sort_'])){
		$sort = $_GET['sort_'];
	}else{
		$sort = null;
	}
	$goods = $model->template('goods_get', $model->data('goods', $category_name, $sort), $category_name, $sort);
//Data goods by load witch ajax
}else{
	$category_name = $_GET['category'] ? $_GET['category'] : "all";
	if(isset( $_GET['sort'])){
		$sort = $_GET['sort'];
	}else{
		$sort = null;
	}

	$goods = $model->render($model->data('goods', $category_name, $sort));

	exit(json_encode($goods));

}






 ?>