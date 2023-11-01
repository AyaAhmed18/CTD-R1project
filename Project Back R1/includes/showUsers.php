<?php
try{

  $sql ="SELECT * FROM `users` WHERE id = ?" ;
  $stmt=$conn->prepare($sql);
  $stmt ->execute([$id]);
  $result = $stmt->fetch();

//values from database
  $name = $result["name"];
  $userName = $result["username"];
  $email = $result["email"];
  $active = $result["active"];
  $password = $result["password"];
  if($active == 1){
    $state = "checked";
  }else if ($active== 0){
    $state ="";
  }


//  echo "Data deleted successfully";
}catch(PDOException $e){
  echo "failed to update data:" .$e->getMessage();
}
?>
