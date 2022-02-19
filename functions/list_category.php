<?php
if(!function_exists("showCategories")){
    $sql_categories = "SELECT * FROM categories";
    $query_categories = mysqli_query($conn,$sql_categories);

    $categories = array();

    while($row_categories = mysqli_fetch_array($query_categories)){
	    $categories[] = $row_categories;
    }
    function showCategories($categories,$parent,$char,$parent_id_child){
        foreach($categories as $category){
            if($category["cat_parent"] == $parent){
                if($category['id'] == $parent_id_child){
                echo "<option selected value=".$category["id"].">".$char.$category['cat_name']."</br>"."</option>";
                }
                else{
                    echo "<option value=".$category["id"].">".$char.$category['cat_name']."</br>"."</option>";
                }
                $newParent = $category["id"];
                echo showCategories($categories,$newParent,$char."|-- ",$parent_id_child);
            }
        }
    }
}
// $categories : db của bảng categories , $parent: 0 , $char : Nối kí tự vào danh mục con , $parent_id_child: thẻ được selected
?>