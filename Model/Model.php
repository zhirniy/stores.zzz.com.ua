<?php
require "DB.php";

/**
 * Extend Data Base connect class
 */
class Model extends DB
{
	/*method prepare data for view */
	public function template($temlate, $data, $category, $sort){
		include "./template/".$temlate. ".php";
		return $view;
	}
	/*method get data by parameters */
	public function data($table, $name_category, $sort){
		/*if only table data*/
		if($name_category == "all" && $sort == "default"){
			return $this->query("SELECT * from ". $table);
		}else{
			/*if category and sort*/
			if($sort == "a_z"){
				return  $this->query( "SELECT * from ". $table ." WHERE name_category ='". $name_category."' ORDER BY name ASC");
			}else if($sort == "min_price"){
				return  $this->query("SELECT * from ". $table ." WHERE name_category ='". $name_category."' ORDER BY price ASC");
			}else if($sort == "max_price"){
				return  $this->query("SELECT * from ". $table ." WHERE name_category ='". $name_category."' ORDER BY price DESC");
			}else{
				return  $this->query( "SELECT * from ". $table ." WHERE name_category ='". $name_category."' ORDER BY price ASC");
			}
			
		}

		
	}
	/*method prepare data for js */
	public function render($data){
		$counter = 0;

		 foreach ($data as $row) {
		 	$result[$counter]['id'] = $row['id'];
		 	$result[$counter]['name'] = $row['name'];
		 	$result[$counter]['price'] = $row['price'];
		 	$result[$counter]['images'] = $row['images'];
		 	$counter++;
		 }

		return $result;

	}

}

 ?>