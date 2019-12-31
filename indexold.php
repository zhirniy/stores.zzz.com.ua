<?php require "./Model/Model.php"; ?>

<?php

$model = new Model();

$goods;

//var_dump($_GET);
if(!isset($_POST['category']) && !isset($_GET['category']) && !isset($_POST['sort'])){
	$head = $model->display("head", null);

	$category = $model->display("category", $model->data('category', "all", null)); 

	echo $goods = $model->render($model->data('goods', "all", "default"));


	$footer = $model->display("footer", null);
}else if(!isset($_POST['category']) && isset($_GET['category']) && !isset($_POST['sort'])){
	$category_name = $_GET['category'];

	$head = $model->display("head", null);

	$category = $model->display("category", $model->data('category', "all", null)); 

	echo $goods = $model->render($model->data('goods', $category_name, $sort));

	$footer = $model->display("footer", null);
}else{
	if (isset($_POST['sort']) ){
		switch ($_POST['sort']) {
			case 'price_vozr':
				$sort = "price";
				break;
			case 'price_ub':
				$sort = "price";
				break;
			case 'name':
				$sort = "name";
				break;
			
			default:
				$sort = "name";
				break;
		}

		$category_name = $_POST['category'] ? $_POST['category'] : "all";

		$goods = $model->data('goods', $category_name, $sort);
		//echo json_encode($goods);


		echo json_encode($model->render($goods));

	}else{
		$category_name = $_POST['category'] ? $_POST['category'] : "all";

		$goods = $model->data('goods', $category_name, "default");

		//echo json_encode($goods);

		echo json_encode($model->render($goods));

	}


}


// if(isset($_POST['sort'])){

// 	echo "111";

// }


 ?>

