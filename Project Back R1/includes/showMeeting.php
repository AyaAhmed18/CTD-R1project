<?php
try{

  $sql ="SELECT * FROM `meeting` WHERE id = ?" ;
  $stmt=$conn->prepare($sql);
  $stmt ->execute([$id]);
  $result = $stmt->fetch();

//values of data from database
  $date = $result["date"];
  $title = $result["title"];
  $content = $result["content"];
  $location = $result["location"];
  $price = $result["price"];
  $active = $result["active"];
  if($active == 1){
    $state = "checked";
  }else if ($active== 0){
    $state ="";
  }
  $Image = $result["image"];
  $cat_iD = $result["cat_id"];

//  echo "Data deleted successfully";
}catch(PDOException $e){
  echo "failed to update data:" .$e->getMessage();
}
try{
  $sql =" SELECT * FROM `categories`  " ;
  $stmtcat=$conn->prepare($sql);
  $stmtcat ->execute();

//  echo "Data deleted successfully";
}catch(PDOException $e){
  echo "failed to select category:" .$e->getMessage();
}
?>
