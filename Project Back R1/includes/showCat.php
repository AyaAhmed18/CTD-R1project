<?php
try{

  $sql ="SELECT * FROM `categories` WHERE id = ?" ;
  $stmt=$conn->prepare($sql);
  $stmt ->execute([$id]);
  $result = $stmt->fetch();

//values from database
  $name = $result["name"];

//  echo "Data deleted successfully";
}catch(PDOException $e){
  echo "failed to update data:" .$e->getMessage();
}
?>
