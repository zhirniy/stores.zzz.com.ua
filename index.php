<?php require "./controller.php"; 

// Show head by first loading
echo $head = $model->template("head", null, null, null);
// Show categories by first loading
echo $categories = $model->template("category", $model->data('category', "all", "default"), null, null); 
// Show goods by first loading
echo $goods;
// Show footer by first loading
echo $footer = $model->template("footer", null, null, null);


 ?>

