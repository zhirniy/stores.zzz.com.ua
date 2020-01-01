<?php
require "../config.php";

//Connect database
$dbh = new PDO('mysql:host='.HOST.';dbname='.DBNAME.';charset=utf8', USER, PASSWORD);

//Array categories
$categories = array();

$sth = $dbh->prepare("SELECT * FROM  categories");
$sth->execute();

//add database rows  in array  with sort by parent
while($cat =  $sth->fetch(PDO::FETCH_ASSOC)){
     $categories[$cat['parent_id']][$cat['id']] =  $cat;
}


//function builds a category tree
function build_tree($categories,$parent_id){
    if(is_array($categories) && isset($categories[$parent_id])){
        $tree = '<ul>';
            foreach($categories[$parent_id] as $category){
                $tree .= '<li>'.$category['name'];
                $tree .=  build_tree($categories,$category['id']);
                $tree .= '</li>';
            }
        $tree .= '</ul>';
    }
    else return null;
    return $tree;
}

echo build_tree($categories,0);


?>